<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;


class  CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function create()
{
    $htmlOption = $this ->getCategory($parentId = '');
    return view('admin.category.add', compact('htmlOption'));
}

    

    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
 
     }
    // public function store(Request $request){
    // $this->category->create([
    //     'name'=>$request->name,
    //     'parent_id' =>$request->parent_id,
    //     'slug' => Str::slug($request->name)

    // ]);
    // return redirect()->route('categories.index');
    // }

    public function store(Request $request){
        $category = $this->category->updateOrCreate(
            ['id' => $request->id], // Sử dụng id để tìm bản ghi cũ
            [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => Str::slug($request->name)
            ]
        );
    
        return redirect()->route('categories.index');
    }
    
     public function getCategory($parentId)
     {
        $data = $this->category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;

     }

     public function edit($id)
{
    try {
        $category = $this->category->findOrFail($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    } catch (\Exception $e) {
        // Xử lý khi không tìm thấy category hoặc có lỗi khác
        return redirect()->back()->with('error', 'Không tìm thấy danh mục.');
    }
}


public function update($id, Request $request)
{
   $this ->category->find($id)->update([
    $category = $this->category->updateOrCreate(
        ['id' => $request->id], // Sử dụng id để tìm bản ghi cũ
        [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ])
   ]);
   return redirect()->route('categories.index');
}





     
     public function delete($id)
     {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
     }
   
}
