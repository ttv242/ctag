<?php

namespace App\Http\Controllers;

use App\Helpers\CRUDHelper;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\ApiController;

class CategoriesController extends Controller
{
    //
    public function cat(Request $request, $slug1 = NULL, $slug2 = NULL, $id = NULL)
    {
        $title = "Danh mục";
        $table = NULL;
        $categories = Category::orderBy('updated_at', 'asc')->get();
        $subcategories = Subcategory::orderBy('categories_id', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();


        if (!empty($slug1) && $slug1 == 'categories' || $slug1 = 'subcategories') {
            $table = $slug1 == 'categories' ? Category::class : Subcategory::class;

            if ($slug2 == 'delete' && $id) {
                $CRUDHelper = new CRUDHelper();
                $delete = $CRUDHelper->Delete($table, $id);
                if ($delete->getStatusCode() === 200) {
                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/category.json');
                    $apiController->clearDataJson('data/subcategory.json');
                    $apiController->clearDataJson('data/product.json');
                    $apiController->clearDataJson('orther/monthlyOffers.json');
                    $apiController->clearDataJson('orther/sale.json');
                    $apiController->clearDataJson('orther/view.json');
                    smilify('success', 'Xóa danh mục ' . $request->name . ' thành công!');
                    return redirect()->back();
                } else {
                    return redirect()->back();
                    // echo $delete->getContent();
                }
            } elseif ($slug2 == 'update' && $id) {
                if ($request->isMethod('get')) {
                    $data = $table::find($id);
                    // dd($data);
                    // dd($slug1);
                    return view("dashboard.pages.categories.update", [
                        "title" => $title,
                        "categories" => $categories,
                        "slug" => $slug1,
                        "data" => $data,
                    ]);
                }

                if ($request->isMethod('put')) {
                    $result = $table::find($id)->update($request->all());
                    if ($result === true) {
                        $apiController = new ApiController();
                        $apiController->clearDataJson('data/category.json');
                        $apiController->clearDataJson('data/subcategory.json');
                        $apiController->clearDataJson('data/product.json');
                        $apiController->clearDataJson('orther/monthlyOffers.json');
                        $apiController->clearDataJson('orther/sale.json');
                        $apiController->clearDataJson('orther/view.json');
                        smilify('success', 'cập nhật danh mục ' . $request->name . ' thành công!');
                        return redirect()->route('dashboard.cat');
                    } else {
                        return redirect()->back();
                    }
                }
            }
        }


        return view("dashboard.pages.categories.list", [
            "title" => $title,
            // "categories" => $categories,
            // "subcategories" => $subcategories,
            // "products" => $products,
            "categories" => $categories,
            "subcategories" => $subcategories,
        ]);
    }

    public function creCat(Request $request, $slug = NULL)
    {
        // dd('fds');
        $title = "Tạo danh mục";
        $categories = NULL;
        $subcategories = NULL;

        if (!empty($slug) && $slug == 'categories' || $slug == 'subcategories') {
            if ($slug == 'subcategories') {
                $categories = Category::get();
                $slug = 'subcategories';
            }
        }

        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            if ($slug && $slug == 'categories') {
                $create = $CRUDHelper->Create(Category::class, $request);
            } elseif ($slug && $slug == 'subcategories') {
                $create = $CRUDHelper->Create(Subcategory::class, $request);
            }
            $apiController = new ApiController();
            $apiController->clearDataJson('data/category.json');
            $apiController->clearDataJson('data/subcategory.json');
            $apiController->clearDataJson('data/product.json');
            $apiController->clearDataJson('orther/monthlyOffers.json');
            $apiController->clearDataJson('orther/sale.json');
            $apiController->clearDataJson('orther/view.json');
            smilify('success', 'Tạo danh mục ' . $request->name . ' thành công!');
        }

        return view("dashboard.pages.categories.create", [
            "title" => $title,
            "categories" => $categories,
            "slug" => $slug,
            // "products" => $products,
        ]);
    }


}
