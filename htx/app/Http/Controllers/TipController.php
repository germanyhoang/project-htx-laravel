<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipController extends Controller
{
    public function listTip()
    {
        return view('admin.tip.adminTip');
    }
     public function addTip()
    {
        return view('admin.tip.addTip');
    }
}