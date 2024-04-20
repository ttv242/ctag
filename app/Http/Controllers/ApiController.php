<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SplFileInfo;
class ApiController extends Controller
{
    //

    public function getFeaturedProducts()
    {
        $data = File::get(public_path('json/data/product.json'));
        $data = json_decode($data, true);

        // Sắp xếp mảng dựa trên ngày cập nhật mới nhất
        usort($data, function ($a, $b) {
            return strtotime($b['updated_at']) - strtotime($a['updated_at']);
        });

        $featuredProducts = [];
        $count = 0;

        foreach ($data as $item) {
            if ($item['featured'] == 1 && $count < 24) {
                $featuredProducts[] = $item;
                $count++;
            }
        }
        // dd($featuredProducts);
        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'orther/featuredProducts.json', json_encode($featuredProducts));

        // dd($data);
        $featuredProducts = File::get(public_path('json/orther/featuredProducts.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($featuredProducts);
    }

    public function getMonthlyOfferProducts()
    {

        $categories = json_decode(File::get(public_path('json/data/category.json')), true);
        $subcategories = json_decode(File::get(public_path('json/data/subcategory.json')), true);
        $data = json_decode(File::get(public_path('json/data/product.json')), true);

        // Sắp xếp mảng dựa trên ngày cập nhật mới nhất
        usort($data, function ($a, $b) {
            return strtotime($b['updated_at']) - strtotime($a['updated_at']);
        });

        $monthlyOffers = [];
        $count = 0;

        foreach ($data as $item) {
            if ($item['target_time'] != null && $count < 8) {
                if ($item['categories_id'] != null) {
                    foreach ($categories as $cat) {
                        if ($item['categories_id'] == $cat['id']) {
                            $item['category']['name'] = $cat['name'];
                            $item['category']['alias'] = $cat['alias'];
                        }
                    }
                }
                if ($item['subcategories_id'] != null) {
                    foreach ($subcategories as $subcat) {
                        if ($item['subcategories_id'] == $subcat['id']) {
                            $item['subcategory']['name'] = $subcat['name'];
                            $item['subcategory']['alias'] = $subcat['alias'];
                        }
                    }
                }
                $monthlyOffers[] = $item;
                $count++;
            }
        }
        // dd($monthlyOffers);
        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'orther/monthlyOffers.json', json_encode($monthlyOffers));

        // dd($data);
        $monthlyOffers = File::get(public_path('json/orther/monthlyOffers.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($monthlyOffers);
    }

    public function getBestSeller()
    {
        $data = File::get(public_path('json/orther/bestSeller.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($data);
    }

    public function getSale()
    {
        $data = File::get(public_path('json/data/product.json'));
        $data = json_decode($data, true);


        // Sắp xếp mảng dựa trên phần trăm giảm giá cao nhất
        usort($data, function ($a, $b) {
            $discountPercentageA = ($a['product_details']['discount'] / $a['product_details']['price']) * 100;
            $discountPercentageB = ($b['product_details']['discount'] / $b['product_details']['price']) * 100;
            return $discountPercentageB - $discountPercentageA;
        });

        $sale = [];
        $count = 0;

        foreach ($data as $item) {
            if ($item['product_details']['discount'] > 0 && $count < 24) {
                $sale[] = $item;
                $count++;
            }
        }
        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'orther/sale.json', json_encode($sale));

        $data = File::get(public_path('json/orther/sale.json'));
        return response($data);
    }
    public function getViews()
    {
        $data = File::get(public_path('json/data/product.json'));
        $data = json_decode($data, true);

        // Sắp xếp mảng dựa trên ngày cập nhật mới nhất
        // Sắp xếp mảng dựa trên số lượt xem cao nhất
        usort($data, function ($a, $b) {
            return $b['views'] - $a['views'];
        });

        $views = [];
        $count = 0;

        foreach ($data as $item) {
            if ($item['views'] > 0 && $count < 24) {
                $views[] = $item;
                $count++;
            }
        }
        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'orther/views.json', json_encode($views));

        $data = File::get(public_path('json/orther/views.json'));
        return response($data);
    }

    public function getCategories()
    {
        $data = File::get(public_path('json/data/category.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($data);
    }
    public function getSubcategories()
    {
        $data = File::get(public_path('json/data/subcategory.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($data);
    }

    public function getBrands()
    {
        $data = File::get(public_path('json/data/brand.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($data);
    }

    public function getFeaturedBrands()
    {
        $data = File::get(public_path('json/data/brand.json'));
        $data = json_decode($data, true);
        $featuredBrands = [];
        foreach ($data as $item) {
            if ($item['featured'] == 1) {
                $featuredBrands[] = $item;
            }
        }
        // dd($featuredBrands);
        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'orther/featuredBrands.json', json_encode($featuredBrands));

        // dd($data);
        $featuredBrands = File::get(public_path('json/orther/featuredBrands.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($featuredBrands);
    }

    public function getProducts()
    {
        $data = File::get(public_path('json/data/product.json'));
        // return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm nổi bật', 'data' => $data]);
        return response($data);
    }

    function dataDefault()
    {
        $data = [];
        $categories = json_decode(File::get(public_path('json/data/category.json')), true);
        $subcategories = json_decode(File::get(public_path('json/data/subcategory.json')), true);
        $viewed = session('viewed');

        $data['meta']['keyword'] = 'keyword';
        $data['meta']['description'] = 'description';
        $data['content']['categories'] = $categories;
        $data['content']['subcategories'] = $subcategories;
        $data['content']['viewed'] = $viewed;

        return $data;
    }

    public function getHome()
    {
        $data = $this->dataDefault();
        $data['title'] = 'Trang chủ';

        $featuredBrands = json_decode(File::get(public_path('json/orther/featuredBrands.json')), true);
        $featuredProducts = json_decode(File::get(public_path('json/orther/featuredProducts.json')), true);
        $sale = json_decode(File::get(public_path('json/orther/sale.json')), true);
        $views = json_decode(File::get(public_path('json/orther/views.json')), true);
        $monthlyOffers = json_decode(File::get(public_path('json/orther/monthlyOffers.json')), true);

        if (empty($featuredBrands)) {
            $featuredBrands = $this->getFeaturedBrands();
            $featuredBrands = json_decode($featuredBrands, true);
        }

        if (empty($featuredProducts)) {
            $featuredProducts = $this->getFeaturedProducts();
            $featuredProducts = json_decode($featuredProducts, true);
        }

        if (empty($sale)) {
            $sale = $this->getSale();
            $sale = json_decode($sale, true);
        }

        if (empty($views)) {
            $views = $this->getViews();
            $views = json_decode($views, true);
        }

        if (empty($monthlyOffers)) {
            $monthlyOffers = $this->getMonthlyOfferProducts();
            $monthlyOffers = json_decode($monthlyOffers, true);
        }

        $data['content']['featuredBrands'] = $featuredBrands;
        $data['content']['featuredProducts'] = $featuredProducts;
        $data['content']['sale'] = $sale;
        $data['content']['views'] = $views;
        $data['content']['monthlyOffers'] = $monthlyOffers;

        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'pages/home.json', json_encode($data));

        return response($data);
    }

    public function getShop()
    {
        $data = $this->dataDefault();


        $brands = json_decode(File::get(public_path('json/data/brand.json')), true);
        $products = json_decode(File::get(public_path('json/data/product.json')), true);


        if (empty($brands)) {
            $brands = $this->getBrands();
            $brands = json_decode($brands, true);
        }

        if (empty($products)) {
            $products = $this->getProducts();
            $products = json_decode($products, true);
        }

        $data['title'] = 'Cửa hàng';
        $data['content']['products'] = $products;
        $data['content']['brands'] = $brands;

        $jsonFilePath = public_path('json/');

        File::put($jsonFilePath . 'pages/shop.json', json_encode($data));

        return response($data);
    }

    public function clearDataJson($slug = NULL)
    {
        $jsonFilePath = public_path('json/');

        if (empty($slug)) {
            $allFiles = File::allFiles($jsonFilePath);
            foreach ($allFiles as $file) {
                $fileRelativePath = $file->getRelativePathname();
                $filePath = $jsonFilePath . $fileRelativePath;

                if (File::exists($filePath)) {
                    File::put($filePath, ''); // Xóa nội dung của các tệp JSON
                }
            }
        } else {

            $filePath = $jsonFilePath . $slug;

            if (File::exists($filePath)) {
                File::put($filePath, ''); // Xóa nội dung của các tệp JSON
            }
        }

        // Gọi lại phương thức importDbToJson() để tạo lại dữ liệu JSON
        // $this->importDbToJson($jsonFilePath, $allFiles);
    }
}
