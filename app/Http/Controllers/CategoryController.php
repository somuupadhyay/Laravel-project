<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('subcategories')->paginate(7);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Category added successfully!',
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return response()->json(['message' => 'Category updated successfully!']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    public function addSubcategory(Request $request, Category $category)
    {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $subcategory = $category->subcategories()->create($request->all());

    return redirect()->route('categories.index')->with('success', 'Subcategory added successfully!');
}

}
