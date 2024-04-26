<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Product;

class StatisticalController extends Controller
{
    function viewPro()
    {
        $title = 'Lượt xem sản phẩm';
        $product = Product::orderByDesc('views')->limit(20)->get();
        return view(
            'dashboard.pages.statistical.productViews.list',
            ['product' => $product, 'title' => $title]
        );
    }


    function bestSeller()
    {
        $title = 'Lượt xem sản phẩm';
        $product = Product::orderByDesc('best_seller')->limit(20)->get();
        return view(
            'dashboard.pages.statistical.bestSeller.list',
            ['product' => $product, 'title' => $title]
        );
    }


    function viewProdate(Request $request, $startdate, $enddate)
    {
        $title = 'Lượt xem sản phẩm';
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $product = Product::whereDate('target_time', '>=', $startdate)->whereDate('target_time', '<=', $enddate)
            ->orderByDesc('views')
            ->limit(20)
            ->get();



        return view('dashboard.pages.statistical.productViews.list', [
            'product' => $product,
            'title' => $title
        ]);
    }
}
