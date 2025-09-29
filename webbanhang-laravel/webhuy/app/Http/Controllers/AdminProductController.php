<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageimageTraits;


class AdminProductController extends Controller
{
    use StorageimageTraits;
    private $productImage;
    private $category;
    private $product;

    public function __construct(Category $category, Product $product, ProductImage $productImage){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index(){
        $products = $this->product->where('quanty', '>', 0)->latest()->paginate(4);
        return view('admin.product.index', compact('products'));
    }
    
    public function thongke(Request $request){
        $date = $request->date;
        $categoryId = $request->category_id;
    
        $productsQuery = $this->product->where('quanty', '>', 0);
        
        if ($date) {
            $productsQuery->whereDate('created_at', $date);
        }
    
        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }
        
        $products = $productsQuery->latest()->paginate(10);
    
        $categoriesQuery = $this->category->with(['products' => function ($query) use ($date, $categoryId) {
            $query->where('quanty', '>', 0);
            if ($date) {
                $query->whereDate('created_at', $date);
            }
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
        }, 'children.products' => function ($query) use ($date, $categoryId) {
            $query->where('quanty', '>', 0);
            if ($date) {
                $query->whereDate('created_at', $date);
            }
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }
        }]);
    
        if ($categoryId) {
            $categoriesQuery->where('id', $categoryId)->orWhereHas('children', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            });
        }
    
        $categories = $categoriesQuery->get();
        $allCategories = $this->category->all(); // Để hiển thị trong dropdown
    
        return view('admin.product.thongke', compact('products', 'categories', 'allCategories'));
    }
    
    
    
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId){
        $data = $this->category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request){
        try{
            DB::beginTransaction();
            
            // Kiểm tra user đã đăng nhập
            if (!auth()->check()) {
                return redirect()->back()->with('error', 'Bạn cần đăng nhập để thực hiện chức năng này');
            }
            
            $dataProductCreate = [
                'name' =>$request->name,
                'price' =>$request->price,
                'quanty' =>$request->quanty,
                'content' =>$request->contents,
                'user_id' =>auth()->id(),
                'category_id' => $request->category_id,
            ];
    
           $dataUploadFeatureImage=$this->storageTraitUpload($request, 'feature_image_path', 'product');
           if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
           }
           
           $product = $this->product->create( $dataProductCreate );
           
           // Upload multiple images
           if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this-> storageTraitUploadMutiple( $fileItem, 'product' );
                    $product->images()->create([
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name'],
                    ]);
                }
           }
           
        DB::commit();
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
        
       } catch(Exception $exception){
           DB::rollBack();
           Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
           return redirect()->back()
                          ->withInput()
                          ->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $exception->getMessage());
        }
   }

    public function edit($id){
        try {
            $product = $this->product->find($id);
            
            if (!$product) {
                return redirect()->route('product.index')->with('error', 'Sản phẩm không tồn tại');
            }
            
            $htmlOption = $this->getCategory($product->category_id);
            return view('admin.product.edit', compact('htmlOption', 'product'));
            
        } catch (Exception $exception) {
            Log::error('Error in edit product: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return redirect()->route('product.index')->with('error', 'Có lỗi xảy ra khi tải trang sửa sản phẩm');
        }
    }

    public function update(ProductUpdateRequest $request, $id){
        try{
            DB::beginTransaction();
            
            // Kiểm tra user đã đăng nhập
            if (!auth()->check()) {
                return redirect()->back()->with('error', 'Bạn cần đăng nhập để thực hiện chức năng này');
            }
            
            // Kiểm tra sản phẩm có tồn tại
            $product = $this->product->find($id);
            if (!$product) {
                return redirect()->route('product.index')->with('error', 'Sản phẩm không tồn tại');
            }
            
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'quanty' => $request->quanty,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
    
            // Upload ảnh đại diện mới (nếu có)
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            
            // Cập nhật thông tin sản phẩm
            $product->update($dataProductUpdate);
    
            // Xử lý ảnh chi tiết: Chỉ xóa và thêm mới khi có upload ảnh mới
            if($request->hasFile('image_path')){
                // Xóa hình ảnh sản phẩm cũ
                $this->productImage->where('product_id', $id)->delete();
        
                // Thêm hình ảnh mới
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    ProductImage::create([
                        'product_id' => $id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }
    
            DB::commit();
            return redirect()->route('product.edit', $id)->with('success', 'Cập nhật sản phẩm thành công!');
            
        } catch(Exception $exception){
            DB::rollBack();
            Log::error('Error updating product: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Có lỗi xảy ra khi cập nhật sản phẩm: ' . $exception->getMessage());
        }
    }
    public function delete($id){
        try{
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch(Exception $exception){
            Log::error('Message: ' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
