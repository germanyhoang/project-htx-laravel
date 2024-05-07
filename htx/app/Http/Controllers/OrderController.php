<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
class OrderController extends Controller
{
    public function getOrder(Request $request)
    {
        $order = Order::all();
        $orderDetail = OrderDetail::all();
        return view('admin.order.adminOrder', compact('order', 'orderDetail'));
    }
}