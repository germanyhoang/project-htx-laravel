<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    //xem
    public function listBanner()
    {
        $banners = Banner::all();
        return view('admin.banner.adminBanner', compact('banners'));
    }
    //xoa
    public function delete($id)
    {
        $banners = Banner::findOrFail($id); // Tìm tin tức cần xóa
        $banners->delete(); // Xóa tin tức

        return redirect()->route('listBanner')->with('success', 'Banner deleted successfully!');
    }
    //hien thi trang them
    public function addBanner()
    {
        return view('admin.banner.addBanner');
    }
    // luu khi them
    public function storeBanner(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'site' => 'required|string',
            'status' => 'required|in:0,1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('source/images/banner'), $imageName); // Thay đổi đường dẫn lưu ảnh

        // Create new News instance
        $banners = new Banner();
        $banners->name = $request->name;
        $banners->site = $request->site;
        $banners->status = $request->status;
        $banners->image = $imageName; // Lưu tên ảnh vào cơ sở dữ liệu

        // Save news to database
        $banners->save();

        // Redirect back or wherever you want
        return redirect()->route('listBanner')->with('success', 'Banner added successfully!');
    }
    // tim kiem
    public function searchBanner(Request $request)
    {
        $search = $request->input('bannerSearch');
        $banners = Banner::where('name', 'like', "%$search%")
            ->orWhere('id', $search)
            ->get();
        return view('admin.banner.adminBanner', compact('banners'));
    }
    // //sua
    public function edit($id)
    {
        $banners = Banner::findOrFail($id);
        return view('admin.banner.editBanner', compact('banners'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'site' => 'required|string',
            'status' => 'required|in:0,1',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Loại bỏ 'required' ở đây
        ]);

        // Find the banner
        $banner = Banner::findOrFail($id);

        // Update banner data
        $banner->name = $request->name;
        $banner->site = $request->site;
        $banner->status = $request->status;

        // Upload and update image if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('source/images/banner'), $imageName);
            $banner->image = $imageName;
        }

        // Save banner to database
        $banner->save();

        // Redirect back or wherever you want
        return redirect()->route('listBanner')->with('success', 'Banner updated successfully!');
    }
}
