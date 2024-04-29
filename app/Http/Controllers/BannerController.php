<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Helpers\CRUDHelper;


use Illuminate\Http\Request;

class BannerController extends Controller
{


    public function banner(Request $request, $slug = null, $id = null)
    {

        $title = 'Quảng cáo';

        $banner = Banner::all();

        return view("dashboard.pages.banner.list", [
            'title' => $title,
            'banner' => $banner,
        ]);
    }

    public function creBan(Request $request){
        $title = 'Quảng cáo';

        $product = Product::all();


        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            $data = [
                "parent_id" => $request->parent_id,
                "title" => $request->title,
                "img" => $request->img,
                "url" => $request->url,
                "hidden" => $request->hidden,
            ];
             $CRUDHelper->Create(Banner::class, $data);

        }
        return view('dashboard.pages.banner.create', [
            "title" => $title,
            "product" => $product,
        ]);
    }
}
