<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductTypeController extends Controller
{
    public function getProductType(Request $request)
    {
        $categories = Category::all();
        return view('admin.productType.adminProductType', compact('categories'));
    }
    public function addProductType(Request $request)
    {
        return view('admin.productType.addProductType');
    }
    //tim kiem
    public function searchProductType(Request $request)
    {
        $searchKeyword = $request->input('productTypeSearch');
        $categories = Category::where('name', 'like', '%' . $searchKeyword . '%')->get();
        return view('admin.productType.adminProductType', compact('categories'));
    }
    //xoa
    public function deleteProductType(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect()->route('productType')->with('success', 'Category deleted successfully!');
    }
    //them
    public function storeCategory(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        // Create new News instance
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;

        // Save news to database
        $category->save();

        // Redirect back or wherever you want
        return redirect()->route('productType')->with('success', 'Category added successfully!');
    }
    //truyen id edit
    // //sua
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.productType.editProductType', compact('categories'));
    }
    //update luuw
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Find the banner
        $categories = Category::findOrFail($id);

        // Update banner data
        $categories->name = $request->name;
        $categories->status = $request->status;

        // Save banner to database
        $categories->save();

        // Redirect back or wherever you want
        return redirect()->route('productType')->with('success', 'Category updated successfully!');
    }
}
