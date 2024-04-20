<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //
    public function pending() {
        $pending  = Order::where('status', 'pending')->get();
        return view('dashboard.pages.order.pending', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'pending'=> $pending,
        ]);
    }

    public function detail($slug) {
        $order  = Order::find($slug);
        $orderItem  = OrderItem::where('parent_id', $slug)->get();
        return view('dashboard.pages.order.detail', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'order'=> $order,
            'orderItem'=> $orderItem,
        ]);
    }
}
