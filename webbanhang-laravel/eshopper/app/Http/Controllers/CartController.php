<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Customer;
use App\Models\Order_Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $newCart = null;

        if(session()->has('Cart')) {
            $oldCart = session('Cart');
            $newCart = new Cart($oldCart);
        }

        $products = Product::latest()->take(6)->get();
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $customer = Auth::check() ? Customer::where('user_id', Auth::id())->first() : null; // Kiểm tra đăng nhập

        return view("shopingcart.cart", compact('sliders', 'categorys', 'categorysLimit', 'products', 'newCart', 'customer'));
    }

    public function Addcart(Request $req, $id)
    {
        $product = Product::find($id); // Sử dụng Model thay vì DB::table để có đầy đủ thuộc tính
        if ($product != null) {
            $oldCart = session('Cart') ? session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $req->session()->put('Cart', $newCart);

            return response()->json([
                'message' => 'Thêm sản phẩm thành công',
                'cart' => $newCart
            ]);
        }

        return response()->json([
            'message' => 'Product not found'
        ], 404);
    }

    public function DeleteListCart(Request $req, $id){
        $oldCart = session('Cart') ? session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->Deletecart($id);
    
        if (count($newCart->products) > 0) {
            $req->session()->put('Cart', $newCart);
        } else {
            $req->session()->forget('Cart');
        }
        
        // Cập nhật lại dữ liệu sản phẩm và giỏ hàng mới
        $products = Product::latest()->take(6)->get();
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $customer = Auth::check() ? Customer::where('user_id', Auth::id())->first() : null; // Kiểm tra đăng nhập
        
        // Trả về view với dữ liệu mới
        return view('shopingcart.cart', compact('sliders', 'categorys', 'categorysLimit', 'products', 'newCart', 'customer'));
    }
    

    public function SaveListCart(Request $req, $id, $quanty){
        $oldCart = session('Cart') ? session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);

        $req->session()->put('Cart', $newCart);

        return view('shopingcart.cart', compact('newCart'));
    }

    public function order()
    {
        $newCart = null;

        if (session()->has('Cart')) {
            $oldCart = session('Cart');
            $newCart = new Cart($oldCart);
        }

        $products = Product::latest()->take(6)->get();
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();

        return view("shopingcart.order", compact('sliders', 'categorys', 'categorysLimit', 'products', 'newCart'));
    }

    public function postTTusers(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'payment_method' => 'required|string'
    ]);

    // Lấy dữ liệu từ request
    $name = $request->input('name');
    $phone = $request->input('phone');
    $address = $request->input('address');
    $paymentMethod = $request->input('payment_method');
    
    // Kiểm tra đăng nhập
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt hàng');
    }
    
    // Cập nhật thông tin khách hàng trong cơ sở dữ liệu
    $customer = Customer::updateOrCreate(
        ['user_id' => auth()->id()], // Điều kiện để tìm kiếm hoặc tạo mới khách hàng
        ['name' => $name, 'phone' => $phone, 'address' => $address] // Dữ liệu mới cần cập nhật
    );
    
    // Lấy giỏ hàng từ session
    $oldCart = session('Cart') ? session('Cart') : null;
    $newCart = new Cart($oldCart);
    
    // Xác định trạng thái thanh toán
    $paymentStatus = ($paymentMethod === 'card') ? 'đã thanh toán' : 'chưa thanh toán';

    // Tạo đơn hàng
    $order = Order::create([
        'user_id' => auth()->id(),
        'customer_id' => $customer->id,
        'status' => 'Chờ xử lý',
        'total_price' => $newCart->totalprice, // Lưu tổng giá trị đơn hàng
        'payment_status' => $paymentStatus // Lưu trạng thái thanh toán
    ]);
    
    // Lưu các sản phẩm trong giỏ hàng vào bảng order_items
    foreach ($newCart->products as $item) {
        Order_Item::create([
            'order_id' => $order->id,
            'product_id' => $item['productInfo']->id,
            'quanty' => $item['quanty'],
            'price' => $item['productInfo']->price, // Lưu giá sản phẩm
            'total_price' => $item['price'], // Lưu tổng giá cho số lượng sản phẩm này
        ]);
    }
    
    // Xóa giỏ hàng trong session sau khi lưu đơn hàng
    session()->forget('Cart');
    
    return response()->json([
        'success' => true,
        'customer' => $customer,
    ]);
}

    public function Punchorder()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem đơn hàng');
        }
        
        $userId = Auth::id(); // Lấy ID người dùng hiện tại
        $orders = Order::with(['orderItems.product'])->latest()
            ->where('user_id', $userId) // Chỉ lấy đơn hàng của người dùng hiện tại
            ->get();

        return view('shopingcart.punchorder', compact('orders'));
    }
    public function updateOrderStatus(Request $request, $id)
{
    $order = Order::find($id);

    if ($order && $order->status == 'Đã giao hàng') {
        $order->status = $request->input('status');
        $order->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 400);
}

}
