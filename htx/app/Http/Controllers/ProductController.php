<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Origin;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        $products = Product::all();
        return view('admin.product.adminProduct', compact('products'));
    }

    public function addProduct()
    {
        $products = Product::all();
        $categories = Category::all();
        $origins = Origin::all();
        return view('admin.product.addProduct', compact('products', 'categories', 'origins'));
    }

    public function storeProductDemo(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:0,1',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'origin_id' => 'required|exists:origin,id',
            'category_id' => 'required|exists:category,id',
        ]);
        // $imagePath = $request->file('image')->store('source/images/product');
        // // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('source/images/product'), $imageName);
        $product = Product::create([
            'name' => $request->name,
            'image' => $imageName,
            'status' => $request->status,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'description' => $request->description,
            'origin_id' => $request->origin_id,
            'category_id' => $request->category_id,
        ]);
        $product->save();
        return redirect()->route('getProduct')->with('success', 'Sản phẩm được thêm với những thư viện khác nhau!');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $origins = Origin::all();
        return view('admin.product.editProduct', compact('product', 'categories', 'origins'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'origin_id' => 'required|exists:origin,id',
            'category_id' => 'required|exists:category,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('source/images/product');
        //     $product->update(['image' => $imagePath]);
        // }

        $product->update([
            'name' => $request->name,
            'status' => $request->status,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'description' => $request->description,
            'origin_id' => $request->origin_id,
            'category_id' => $request->category_id,
        ]);
        // Upload and update image if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('source/images/product'), $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('getProduct')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('getProduct')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
    public function searchProduct(Request $request)
    {
        $searchTerm = $request->input('productTypeSearch');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
        return view('admin.product.adminProduct', compact('products'));
    }
}
