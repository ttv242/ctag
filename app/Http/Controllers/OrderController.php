<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\ApiController;

class OrderController extends Controller
{
    //
    public function update($slug1 = null, $slug2 = null)
    {
        if (isset($slug1) && isset($slug2)) {
            $idOrder = $slug1;
            $status = $slug2;
            $order = Order::find($idOrder);
            if (isset($order) && !empty($order)) {
                if ($status != 'completed' && $status != 'cancelled') {
                    switch ($status) {
                        case 'pending':
                            $order->status = 'processing';
                            $order->save();

                            $apiController = new ApiController();
                            $apiController->clearDataJson('data/order.json');
                            smilify('success', 'Đã duyệt đơn thành công!');
                            return redirect()->back();
                        case 'processing':
                            $order->status = 'shipped';
                            $order->save();

                            $apiController = new ApiController();
                            $apiController->clearDataJson('data/order.json');
                            smilify('success', 'Đã duyệt đơn thành công!');
                            return redirect()->back();
                        case 'shipped':
                            $order->status = 'completed';
                            $order->save();

                            $apiController = new ApiController();
                            $apiController->clearDataJson('data/order.json');
                            smilify('success', 'Đã duyệt đơn thành công!');
                            return redirect()->back();

                    }
                } elseif ($status == 'cancelled') {
                    $order->status = 'cancelled';
                    $order->save();

                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/order.json');
                    smilify('success', 'Đã hủy đơn thành công!');
                    return redirect()->back();
                }
            }
        }
        // return view('dashboard.pages.order.pending', [
        //     'title' => 'Danh sách đơn hàng chờ xử lý',
        //     'pending'=> $pending,
        // ]);
    }

    public function pending()
    {
        $pending  = Order::where('status', 'pending')->get();
   
            return view('dashboard.pages.order.pending', [
                'title' => 'Danh sách đơn hàng chờ xử lý',
                'pending' => $pending,
            ]);
        
    }
    public function processing(){
        $processing  = Order::where('status', 'processing')->get();
        return view('dashboard.pages.order.processing', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'processing' => $processing,
        ]);
    }

    public function shipped(){
        $shipped  = Order::where('status', 'shipped')->get();
        return view('dashboard.pages.order.shipped', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'shipped' => $shipped,
        ]);
    }

    public function completed(){
        $completed  = Order::where('status', 'completed')->get();
        return view('dashboard.pages.order.completed', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'completed' => $completed,
        ]);
    }

    public function cancelled(){
        $cancelled  = Order::where('status', 'cancelled')->get();
        return view('dashboard.pages.order.cancelled', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'cancelled' => $cancelled,
        ]);
    }



    public function detail($slug)
    {
        $order  = Order::find($slug);
        // dd($order);
        $orderItem  = OrderItem::where('parent_id', $slug)->get();
        return view('dashboard.pages.order.detail', [
            'title' => 'Danh sách đơn hàng chờ xử lý',
            'order' => $order,
            'orderItem' => $orderItem,
        ]);
    }
}
