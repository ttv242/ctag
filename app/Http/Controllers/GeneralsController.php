<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Helpers\CRUDHelper;

use Illuminate\Http\Request;

class GeneralsController extends Controller
{
    public function general(Request $request, $slug = null,)
    {
        $title = "Thông tin trang";
        if ($slug == 'update') {
            $general = General::first();
            if (!$general) {
                $general = General::create([
                    'meta_keyword' => NULL,
                    'meta_description' => NULL,
                    'company_name' => NULL,
                    'introduce' => NULL,
                    'email' => NULL,
                    'facebook' => NULL,
                    'phone' => NULL,
                    'logo' => NULL,
                ]);
            }
            if ($request->isMethod('get')) {
                $data = General::first();

                return view("dashboard.pages.general.update", [
                    "title" => $title,
                    "data" => $data,
                ]);
            }
            if ($request->isMethod('put')) {
                $data = General::first();
                $datas = [
                    "meta_keyword" => $request->meta_keyword,
                    "meta_description" => $request->meta_description,
                    "company_name" => $request->company_name,
                    "introduce" => $request->introduce,
                    "email" => $request->email,
                    "facebook" => $request->facebook,
                    "phone" => $request->phone,
                    "logo" => $request->img,
                ];
                $data->update($datas);
                
                return redirect()->route('dashboard.general');
            }
        }
        $data = General::first();
        return view("dashboard.pages.general.update", [
            "title" => $title,
            "data" => $data,
        ]);

    }
}
