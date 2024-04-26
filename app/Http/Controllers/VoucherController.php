<?php

namespace App\Http\Controllers;

use App\Helpers\CRUDHelper;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    function voucher(Request $request, $slug = NULL, $id = NULL)
    {
        $title = 'Phiếu giảm giá';


        if (!empty($slug) && $slug) {

            if ($slug == 'delete' && $id) {
                $CRUDHelper = new CRUDHelper();
                $delete = $CRUDHelper->Delete(Voucher::class, $id);
                if ($delete->getStatusCode() === 200) {
                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/brand.json');
                    $apiController->clearDataJson('orther/featuredBrands.json');
                    $apiController->clearDataJson('data/product.json');
                    $apiController->clearDataJson('order/monthlyOffers.json');
                    $apiController->clearDataJson('order/sale.json');
                    $apiController->clearDataJson('order/view.json');
                    smilify('success', 'Xóa Mã giảm giá ' . $request->code . ' thành công!');
                    return redirect()->back();
                } else {
                    return redirect()->back();
                    // echo $delete->getContent();
                }
            }
        }
        
        $voucher = Voucher::all();
        return view('dashboard.pages.voucher.list', [
            'title' => $title,
            'voucher' => $voucher
        ]);
    }

    function creVou(Request $request)  {


        $title = 'Phiếu giảm giá';

        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            $create = $CRUDHelper->Create(Voucher::class, $request);
            $apiController = new ApiController();
            $apiController->clearDataJson('data/brand.json');
            $apiController->clearDataJson('orther/featuredBrands.json');
            $apiController->clearDataJson('data/product.json');
            $apiController->clearDataJson('order/monthlyOffers.json');
            $apiController->clearDataJson('order/sale.json');
            $apiController->clearDataJson('order/view.json');
            smilify('success', 'xóa mã giảm giá thành công!');
            return redirect()->back();
        }
        return view('dashboard.pages.voucher.create', [
            'title' => $title,
        ]);
    }
}
