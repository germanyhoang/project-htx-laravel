<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function getNews(Request $request)
    {
        $news = News::all();
        return view('admin.news.adminNews', compact('news'));
    }
    public function addNews(Request $request)
    {
        return view('admin.news.addNews');
    }

    public function searchNews(Request $request)
    {
        $search = $request->input('bannerSearch');
        $news = News::where('title', 'like', "%$search%")
            ->orWhere('id', $search)
            ->get();
        return view('admin.news.adminNews', compact('news'));
    }
    public function show(Request $request)
    {
        $news = News::all();
        return view('admin.news.adminNews', compact('news'));
    }
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('source/images/news'), $imageName); // Thay đổi đường dẫn lưu ảnh

        // Create new News instance
        $news = new News();
        $news->title = $request->name;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->image = $imageName; // Lưu tên ảnh vào cơ sở dữ liệu

        // Save news to database
        $news->save();

        // Redirect back or wherever you want
        return redirect()->route('getNews')->with('success', 'News added successfully!');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id); // Tìm tin tức cần xóa
        $news->delete(); // Xóa tin tức

        return redirect()->route('getNews')->with('success', 'News deleted successfully!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.updateNews', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the news
        $news = News::findOrFail($id);

        // Update news data
        $news->title = $request->name;
        $news->description = $request->description;
        $news->status = $request->status;

        // Upload and update image if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('source/images/news'), $imageName);
            $news->image = $imageName;
        }

        // Save news to database
        $news->save();

        // Redirect back or wherever you want
        return redirect()->route('getNews')->with('success', 'News updated successfully!');
    }
}