<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug, $categoryId)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(9);
        return view("product.category.list", compact('categorysLimit', 'products', 'categorys'));
    }

    public function Detail($id)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $product = Product::with('images')->findOrFail($id); // Load product with its images
        $productsRecomend = Product::orderBy('views_count', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view("product.category.productdetail", compact('categorys', 'product', 'productsRecomend', 'categorysLimit'));
    }
}
