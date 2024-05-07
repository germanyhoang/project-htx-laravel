<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenController extends Controller
{
    function layout()
    {
        return view('layout');
    }
    function index()
    {
        return view('frontend.index');
    }
    function intro()
    {
        return view('frontend.intro');
    }
    function news()
    {
        return view('frontend.news');
    }
     function product()
    {
        return view('frontend.product');
    }
    function detailProduct()
    {
        return view('frontend.detailProduct');
    }
    function contact()
    {
        return view('frontend.contact');
    }
    function admin()
    {
        return view('admin.admin');
    }
}