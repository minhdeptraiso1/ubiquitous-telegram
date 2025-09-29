<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders =Slider::latest()->get();
        $categorys =Category::where('parent_id',0)->get();
        $products =Product::latest()->take(6)->get();
        $productsRecomend = Product::orderBy('views_count', 'desc')->take(12)->get(); // Khôi phục orderBy views_count
        $categorysLimit =Category::where('parent_id',0)->take(3)->get();
        return view('home.home', compact('sliders', 'categorys', 'products', 'productsRecomend', 'categorysLimit'));
    }

    public function test(){
        return view('test');

    }

}
