<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('home.userpage', compact('products', 'categories'));
    }

    public function product_detail($id)
    { 
        $product = Product::findOrFail($id);

        return view('home.productdetail', compact('product'));
    }

    public function categoryProducts($id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();

        return view('home.categoryproduct', compact('products', 'categories'));
    }
}
