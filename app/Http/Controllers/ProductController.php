<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('images')) {
            $imageName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('images'), $imageName);
        }

        $product = Product::create(array_merge($request->except('images'), ['images' => $imageName]));

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('images')) {
            if ($product->images) {
                \File::delete(public_path('images/' . $product->images));
            }

            $imageName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $product->images = $imageName;
        }

        $product->update($request->except('images'));

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        if ($product->images) {
            \File::delete(public_path('images/' . $product->images));
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
