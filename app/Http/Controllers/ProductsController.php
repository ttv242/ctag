<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CRUDHelper;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetail;
use Carbon\Carbon;

class ProductsController extends Controller
{
    //
    public function catPro(Request $request, $slug1 = NULL, $slug2 = NULL, $paginate = NULL)
    {
        $title = NULL;
        $products = NULL;
        if (empty($paginate)) {
            $paginate = 20;
        }

        if (!empty($slug1)) {
            $category = Category::where('alias', $slug1)->first();
            $title = 'Sản phẩm danh mục ' . $category->name;

            if (empty($slug2)) {
                if ($category) {
                    $products = $category->products()->paginate($paginate);
                }
            } else {
                $subcategory = SubCategory::where('alias', $slug2)->first();
                $title = 'Sản phẩm danh mục ' . $subcategory->name;
                if ($category && $subcategory) {
                    $products = $subcategory->products()->paginate($paginate);
                }
            }
        }


        return view("dashboard.pages.products.list", [
            "title" => $title,
            // "categories" => $categories,
            // "subcategories" => $subcategories,
            // "products" => $products,
            "products" => $products,
            // "subcategories" => $subcategories,
        ]);
    }
    public function braPro(Request $request, $slug = NULL, $paginate = NULL)
    {
        $title = NULL;
        $products = NULL;
        if (empty($paginate)) {
            $paginate = 20;
        }

        if (!empty($slug)) {
            $brand = Brand::where('alias', $slug)->first();
            $title = 'Sản phẩm thương hiệu ' . $brand->name;

            if ($brand) {
                $products = $brand->products()->paginate($paginate);
            }
        }


        return view("dashboard.pages.products.list", [
            "title" => $title,
            // "categories" => $categories,
            // "subcategories" => $subcategories,
            // "products" => $products,
            "products" => $products,
            // "subcategories" => $subcategories,
        ]);
    }
    public function pro(Request $request, $slug = NULL, $id = NULL, $paginate = NULL)
    {
        $title = 'Sản phẩm';
        $products = NULL;
        if (empty($paginate)) {
            $paginate = 20;
        }

        if (empty($slug) || $slug == "tat-ca") {
            $products = Product::where(['hidden' => 0, 'featured' => 0])->orderBy('updated_at', 'desc')->paginate($paginate);
        } else {
            if ($slug == "noi-bat") {
                $products = Product::where('featured', 1)->orderBy('updated_at', 'asc')->paginate($paginate);
            } elseif ($slug == "da-an") {
                $products = Product::where('hidden', 1)->orderBy('updated_at', 'asc')->paginate($paginate);
            } elseif ($slug == 'delete' && $id) {
                $CRUDHelper = new CRUDHelper();
                $delete = $CRUDHelper->Delete(Product::class, $id);
                if ($delete->getStatusCode() === 200) {
                    $apiController = new ApiController();
                    $apiController->clearDataJson('data/product.json');
                    $apiController->clearDataJson('orther/featuredBrands.json');
                    $apiController->clearDataJson('orther/monthlyOffers.json');
                    smilify('success', 'Xóa sản phẩm ' . $request->name . ' thành công!');
                    return redirect()->back();
                } else {
                    return redirect()->back();
                    // echo $delete->getContent();
                }
            } elseif ($slug == 'update' && $id) {
                if ($request->isMethod('get')) {
                    $data = Product::find($id);
                    $categories = Category::where('hidden', 0)->get();
                    $subcategories = Subcategory::where('hidden', 0)->get();
                    $brands = Brand::where('hidden', 0)->get();
                    // dd($data->categories->name);
                    // dd($slug1);
                    return view("dashboard.pages.products.update", [
                        "title" => $title,
                        "categories" => $categories,
                        "subcategories" => $subcategories,
                        "brands" => $brands,
                        "slug" => $slug,
                        "data" => $data,
                    ]);
                }

                if ($request->isMethod('put')) {
                    $CRUDHelper = new CRUDHelper();
                    $data = [
                        "name" => $request->name,
                        "brands_id" => $request->brands_id,
                        "categories_id" => $request->categories_id,
                        "subcategories_id" => $request->subcategories_id,
                        "featured" => $request->featured,
                        "hidden" => $request->hidden,
                    ];
                    $result = $CRUDHelper->Update(Product::class, $request, $id);
                    // dd($result);

                    if ($result->getStatusCode() === 200) {
                        // dd($result);
                        $data = [
                            "parent_id" => $id,
                            "img" => $request->img,
                            "album" => $request->album,
                            "price" => $request->price,
                            "discount" => $request->discount,
                            "summary" => $request->summary,
                            "description" => $request->description,
                            "meta_keyword" => $request->meta_keyword,
                            "meta_description" => $request->meta_description,
                        ];
                        $detail = ProductDetail::where('parent_id', $id)->first() ?? null;
                        $detailId = $detail->id ?? null;
                        if ($detailId == null) {
                            $create = $CRUDHelper->Create(ProductDetail::class, $data);
                        } else {
                            $result = $CRUDHelper->Update(ProductDetail::class, $data, $detailId);
                        }

                        $CRUDHelper = new CRUDHelper();
                        $create = $CRUDHelper->Create(Brand::class, $request);
                        $apiController = new ApiController();
                        $apiController->clearDataJson('data/product.json');
                        $apiController->clearDataJson('orther/featuredBrands.json');
                        $apiController->clearDataJson('orther/monthlyOffers.json');
                        return redirect()->route('dashboard.pro');
                    } else {
                        return redirect()->back();
                    }
                }
            }
        }

        return view("dashboard.pages.products.list", [
            "title" => $title,
            // "categories" => $categories,
            // "subcategories" => $subcategories,
            // "products" => $products,
            "products" => $products,
            // "subcategories" => $subcategories,
        ]);
    }

    public function crePro(Request $request)
    {
        // dd('fds');
        $title = "Tạo Sản phẩm";

        $categories = Category::where('hidden', 0)->get();
        $subcategories = Subcategory::where('hidden', 0)->get();
        $brands = Brand::where('hidden', 0)->get();


        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            // dd($request->all());
            $data = [
                "name" => $request->name,
                "brands_id" => $request->brands_id,
                "categories_id" => $request->categories_id,
                "subcategories_id" => $request->subcategories_id,
                "featured" => $request->featured,
                "hidden" => $request->hidden,
            ];
            $create = $CRUDHelper->Create(Product::class, $data);
            if ($create->getStatusCode() === 200) {
                $parent_id = $create->getData()[0];
                $data = [
                    "parent_id" => $parent_id,
                    "img" => $request->img,
                    "album" => $request->album,
                    "price" => $request->price,
                    "discount" => $request->discount,
                    "summary" => $request->summary,
                    "description" => $request->description,
                    "meta_keyword" => $request->meta_keyword,
                    "meta_description" => $request->meta_description,
                ];
                $create = $CRUDHelper->Create(ProductDetail::class, $data);
                $CRUDHelper = new CRUDHelper();
                $create = $CRUDHelper->Create(Brand::class, $request);

                $apiController = new ApiController();
                $apiController->clearDataJson('data/product.json');
                $apiController->clearDataJson('orther/featuredBrands.json');
                $apiController->clearDataJson('orther/monthlyOffers.json');
                smilify('success', 'Tạo sản phẩm ' . $request->name . ' thành công!');
                if ($create->getStatusCode() !== 200) {
                    $delete = $CRUDHelper->Delete(Product::class, $parent_id);
                }
            }
        }

        return view("dashboard.pages.products.create", [
            "title" => $title,
            "categories" => $categories,
            "subcategories" => $subcategories,
            "brands" => $brands,
        ]);
    }

    public function monthlyOffers(Request $request, $slug = null)
    {

        $categories = Category::where('hidden', 0)->get();
        $subcategories = Subcategory::where('hidden', 0)->get();
        $brands = Brand::where('hidden', 0)->get();

        if (!empty($slug)) {
            $product = Product::find($slug);
            // dd($product);
            $product->target_time = null;
            $product->save();
            $apiController = new ApiController();
            $apiController->clearDataJson('data/product.json');
            $apiController->clearDataJson('orther/monthlyOffers.json');
            smilify('success', 'Đã xóa ưu đãi tháng sản phẩm ' . $request->name . ' thành công!');
            return redirect()->back();
        }

        if ($request->isMethod('put')) {

            $productId = Product::find($request->id);
            $targetTime = Carbon::createFromFormat('m/d/Y', $request->target_time)->format('Y-m-d');
            $productId->target_time = $targetTime;
            $detaiId = ProductDetail::find($request->detaiId);
            $detaiId->price =  $request->price;
            $detaiId->discount =  $request->discount;

            $productId->save();
            $detaiId->save();

            $apiController = new ApiController();
            $apiController->clearDataJson('data/product.json');
            $apiController->clearDataJson('orther/monthlyOffers.json');

            // Return a JSON response
            return response()->json(['success' => true, 'message' => 'Đã thêm sản phẩm ưu đãi tháng: ', 'name' => $productId->name]);
        }

        $products = Product::whereNotNull('target_time')->get();

        $title = "Ưu đãi tháng";
        return view("dashboard.pages.products.monthly_offers", [
            "title" => $title,
            "categories" => $categories,
            "subcategories" => $subcategories,
            "brands" => $brands,
            "products" => $products,
            "product_details" => ProductDetail::get(),
        ]);

    }
}
