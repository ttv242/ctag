<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CRUDHelper;

use App\Models\Brand;

class BrandsController extends Controller
{
    //
    public function bra(Request $request, $slug = NULL, $id = NULL)
    {
        // dd('fds');
        $title = "Thương hiệu";
        $brands = Brand::orderBy('updated_at', 'desc')->get();


        if (!empty($slug) && $slug) {

            if ($slug == 'delete' && $id) {
                $CRUDHelper = new CRUDHelper();
                $delete = $CRUDHelper->Delete(Brand::class, $id);
                if ($delete->getStatusCode() === 200) {
                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/brand.json');
                    $apiController->clearDataJson('orther/featuredBrands.json');
                    $apiController->clearDataJson('data/product.json');
                    $apiController->clearDataJson('order/monthlyOffers.json');
                    $apiController->clearDataJson('order/sale.json');
                    $apiController->clearDataJson('order/view.json');
                    smilify('success', 'Xóa thương hiệu ' . $request->name . ' thành công!');
                    return redirect()->back();
                } else {
                    return redirect()->back();
                    // echo $delete->getContent();
                }
            } elseif ($slug == 'update' && $id) {
                if ($request->isMethod('get')) {
                    $data = Brand::find($id);
                    // dd($data);
                    // dd($slug1);
                    return view("dashboard.pages.brands.update", [
                        "title" => $title,
                        "slug" => $slug,
                        "data" => $data,
                    ]);
                }

                if ($request->isMethod('put')) {
                    $CRUDHelper = new CRUDHelper();
                    $result = $CRUDHelper->Update(Brand::class, $request, $id);

                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/brand.json');
                    $apiController->clearDataJson('orther/featuredBrands.json');
                    $apiController->clearDataJson('data/product.json');
                    $apiController->clearDataJson('order/monthlyOffers.json');
                    $apiController->clearDataJson('order/sale.json');
                    $apiController->clearDataJson('order/view.json');
                    smilify('success', 'Cập nhật thương hiệu ' . $request->name . ' thành công!');

                    if ($result->getStatusCode() === 200) {
                        // dd($result);
                        return redirect()->route('dashboard.bra');
                    } else {
                        return redirect()->back();
                    }
                }
            }
        }

        return view("dashboard.pages.brands.list", [
            "title" => $title,
            "brands" => $brands,
        ]);
    }

    public function creBra(Request $request)
    {
        // dd('fds');
        $title = "Tạo thương hiệu";

        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            $create = $CRUDHelper->Create(Brand::class, $request);
            $apiController = new ApiController();
            $apiController->clearDataJson('data/brand.json');
            $apiController->clearDataJson('orther/featuredBrands.json');
            $apiController->clearDataJson('data/product.json');
            $apiController->clearDataJson('order/monthlyOffers.json');
            $apiController->clearDataJson('order/sale.json');
            $apiController->clearDataJson('order/view.json');
            smilify('success', 'Tạo thương hiệu ' . $request->name . ' thành công!');
        }

        return view("dashboard.pages.brands.create", [
            "title" => $title,
        ]);
    }
}
