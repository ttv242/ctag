<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        $title = "Trang chủ";
        // $categories = Category::where('hidden', 1)->get();
        // $subcategories = Subcategory::where('hidden', 1)->get();



        return view("dashboard.pages.dashboard.dashboard", [
            "title" => $title,
            // "categories" => $categories,
            // "subcategories" => $subcategories,
            // "products" => $products,
        ]);
    }

    public function picture() {

    }
}
