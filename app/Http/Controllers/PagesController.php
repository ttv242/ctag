<?php

namespace App\Http\Controllers;

use App\Events\EventNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    //

    // public static function getInfo()
    // {
    //     return General::first();
    // }

    function checkView(Request $request, $tableName, $id)
    {
        $modelName = "App\\Models\\" . $tableName; // Đặt tên model tương ứng với bảng
        $row = $modelName::find($id); // Truy vấn và lấy dòng từ bảng
        $row->views = $row->views + 1;

        if ($request->session()->has('viewed')) {
            $viewed = $request->session()->get('viewed');
        } else {
            $viewed = [];
        }

        $products = $this->getApi('getProducts');
        $product = [];

        $check = false;
        foreach ($products as $item) {
            foreach ($viewed as $k => $i) {
                if ($item->id != $k) {
                    $check = $k;
                }
            }
            if ($check != true) {
                if (!empty($viewed)) {
                    unset($viewed[$k]);
                }
            }
            if ($item->id == $row->id) {
                $product = $item;
            }
        }

        if (empty($viewed)) {
            $viewed[$row->id] = $product;
        } else {
            $productExists = false;

            foreach ($viewed as $key => $item) {
                if ($key == $row->id) {
                    // Sản phẩm đã tồn tại
                    $productExists = true;
                    break;
                }
            }

            if (!$productExists) {
                // Sản phẩm chưa tồn tại
                $viewed[$row->id] = $product;
            }
        }

        // Lưu vào session
        $request->session()->put('viewed', $viewed);

        $row->update();
    }


    function getApi($slug)
    {
        $apiController = new ApiController();
        $data = $apiController->$slug();

        if (is_array($data)) {
            return $data;
        } else {
            $content = $data->getContent();
            $data = json_decode($content);
            return $data;
        }
    }

    public function home()
    {
        $data = $this->getApi('getHome');
        return view("ctag.pages.home.home", [
            "data" => $data,
        ]);
    }

    public function shop($param1 = NULL, $param2 = NULL)
    {

        if (!empty($param1) && empty($param2)) {

            $data = $this->getApi('dataDefault');
            $brands = $this->getApi('getBrands');
            $data['content']['brands'] = $brands;
            $categories = $this->getApi('getCategories');

            foreach ($data['content']['categories'] as $item) {
                if ($item['alias'] == $param1) {
                    $data['title'] = "Sản phẩm danh mục " . ucfirst($item['name']);

                    $products = $this->getApi('getProducts');
                    foreach ($products as $i) {
                        if ($item['id'] == $i->categories_id) {
                            $data['content']['products'][] = $i;
                        }
                    }
                }
            }

        } elseif (!empty($param1) && !empty($param2)) {
            $data = $this->getApi('dataDefault');
            $brands = $this->getApi('getBrands');
            $data['content']['brands'] = $brands;

            foreach ($data['content']['subcategories'] as $item) {
                if ($item['alias'] == $param2) {
                    $data['title'] = "Sản phẩm danh mục " . ucfirst($item['name']);

                    $products = $this->getApi('getProducts');
                    foreach ($products as $i) {
                        if ($item['id'] == $i->subcategories_id) {
                            $data['content']['products'][] = $i;
                        }
                    }
                }
            }

        } elseif (empty($param1) && empty($param2)) {
            $data = $this->getApi('getShop');

            return view("ctag.pages.shop.shop", [
                "data" => $data,
            ]);
        }

        if (isset($data) && !empty($data)) {
            $data = json_encode($data);
            $data = json_decode($data);
            return view("ctag.pages.shop.shop", [
                "data" => $data,
            ]);
        }
    }

    public function brand($param1 = NULL)
    {
        $data = $this->getApi('dataDefault');
        $brands = $this->getApi('getBrands');

        $data['content']['brands'] = $brands;
        foreach ($brands as $item) {
            if ($item->alias == $param1) {
                $data['title'] = "Sản phẩm thương hiệu " . ucfirst($item->name);

                $products = $this->getApi('getProducts');
                foreach ($products as $i) {
                    if ($item->id == $i->brands_id) {
                        $data['content']['products'][] = $i;
                    }
                }
            }
        }

        $data = json_encode($data);
        $data = json_decode($data);

        return view("ctag.pages.shop.shop", [
            "data" => $data,
        ]);
    }

    public function product(Request $request, $param1 = NULL)
    {

        $data = $this->getApi('dataDefault');

        $product = json_decode(File::get(public_path('json/data/product.json')), true);

        $flagProJs = 0;
        foreach ($product as $key => $item) {
            if ($item['alias'] === $param1) {
                $data['meta'] = [];
                $data['meta']['keyword'] = $item['product_details']['meta_keyword'];
                $data['meta']['description'] = $item['product_details']['meta_description'];
                $data['title'] = 'Chi tiết sản phẩm ' . $item['name'];

                foreach ($data['content']['categories'] as $cat) {
                    if ($cat['id'] == $item['categories_id']) {
                        $item['category']['name'] = $cat['name'];
                        $item['category']['alias'] = $cat['alias'];
                    }

                    if ($item['subcategories_id']) {
                        foreach ($data['content']['subcategories'] as $subcat) {
                            if ($subcat['id'] == $item['subcategories_id']) {
                                $item['subcategory']['name'] = $subcat['name'];
                                $item['subcategory']['alias'] = $subcat['alias'];
                            }
                        }
                    }
                }

                $data['content']['product'] = $item;
                $flagProJs = $key;
                break; // Thoát khỏi vòng lặp sau khi tìm thấy phần tử
            }
        }

        $data = json_encode($data);
        $data = json_decode($data);

        if (!empty($data)) {
            $this->checkView($request, 'Product', $data->content->product->id);
            $product[$flagProJs]['views'] += 1;
            $product = json_encode($product, JSON_PRETTY_PRINT);
            file_put_contents(public_path('json/data/product.json'), $product);
            return view("ctag.pages.shop.product", [
                "data" => $data,
            ]);
        }
    }

    public function blog()
    {
        $title = "Danh sách sản phẩm";
        // $data = DB::table('sanpham')
        //     ->where([
        //         ['hot', 1],
        //         ['anhien', 1]
        //     ])
        //     ->orderBy('ngay', 'desc')
        //     ->limit(8)
        //     ->get();

        return view("ctag.pages.blog.blog", [
            // "title"=> $title,
            // "data" => $data,
        ]);
    }

    // public function blog_single($alias = null) {
    public function blog_single()
    {
        $title = "Danh sách sản phẩm";
        // $data = DB::table('sanpham')
        //     ->where([
        //         ['hot', 1],
        //         ['anhien', 1]
        //     ])
        //     ->orderBy('ngay', 'desc')
        //     ->limit(8)
        //     ->get();

        return view("ctag.pages.blog.blog_single", [
            // "title"=> $title,
            // "data" => $data,
        ]);
    }

    public function contact()
    {
        $data = $this->getApi('dataDefault');
        $data['title'] = "Liên hệ";
        $data = json_encode($data);
        $data = json_decode($data);


        return view("ctag.pages.contact.contact", [
            "data" => $data,
        ]);
    }

    public function cart()
    {
        $data = $this->getApi('dataDefault');
        $data['title'] = "Giỏ hàng";

        $data = json_encode($data);
        $data = json_decode($data);
        return view("ctag.pages.cart.cart", [
            "data" => $data,
        ]);
    }

    public function client(Request $request)
    {
        if (Auth::check()) {
            $data = $this->getApi('dataDefault');
            $data['title'] = "Thông tin người dùng";
            $data['content']['account'] = Auth::user();
            $data['content']['cart'] = empty(session('cart')) ? null : session('cart');
            $data = json_encode($data);
            $data = json_decode($data);
            // dd($data);

            // event(new EventNotify(emotify('success', 'Bạn đã tạo tài khoản thành công')));

            return view("ctag.pages.auth.client", [
                "data" => $data,
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function checkVoucher(Request $request)
    {
        if (Auth::check()) {

            $vouchers = json_decode(File::get(public_path('json/data/voucher.json')), true);
            $code = $request->code;

            foreach ($vouchers as $item) {
                if ($item['code'] == $code) {
                    return response()->json(['status' => 'success', 'message' => 'Đơn hàng được -' . $item["percent"] . '%', 'data' => $item["percent"]]);
                } else {
                    return response()->json(['status' => 'info', 'message' => 'Không tồn tại mã ' . $code]);
                }
            }
        }
    }

    public function order(Request $request, $slug = null)
    {
        if (Auth::check()) {
            if ($request->isMethod('post')) {
                $order = $request->all();

                $data['users_id'] = Auth::user()->id;

                $vouchers = json_decode(File::get(public_path('json/data/voucher.json')), true);

                if (isset($order['code']) && !empty($order['code'])) {
                    foreach ($vouchers as $item) {
                        if ($item['code'] == $order['code']) {
                            $data['voucher_id'] = $item['id'];
                        } else {
                            return response()->json(['status' => 'error', 'message' => 'Không tồn tại mã ' . $order['code']]);
                        }
                    }
                }

                if (isset($order['note']) && !empty($order['note'])) {
                    $data['note'] = $order['note'];
                }

                $data['name'] = $order['name'];
                $data['phone'] = $order['phone'];
                $data['address'] = $order['address'];
                $data['email'] = $order['email'];

                $orderTable = new Order();
                $orderTable->fill($data);
                $orderTable->save();

                // $orderTable->id = 1;
                if (isset($orderTable->id) && !empty($orderTable->id)) {
                    $data = [];
                    $data['parent_id'] = $orderTable->id;


                    foreach (session("cart") as $item) {
                        $product = Product::find($item["id"]);
                        if ($item["id"] == $product->id) {
                            $data['products_id'] = $product->id;
                            $data['amount'] = $item['amount'];
                            $orderItemTable = new OrderItem();
                            $orderItemTable->fill($data);
                            $orderItemTable->save();
                            if (!isset($orderItemTable->id) && empty($orderItemTable->id)) {
                                $orderTable->delete();
                                return response()->json(['status' => 'info', 'message' => 'Thanh toán thất bại']);
                            }
                        } else {
                            $orderTable->delete();
                            return response()->json(['status' => 'info', 'message' => 'Sản phẩm ' . $item["name"] . ' không còn tồn tại, vui lòng cập nhật giỏ hàng']);
                        }
                    }

                    session()->forget('cart');
                    return response()->json(['status' => 'success', 'message' => 'Đã thanh toán thành công']);
                }

            } else if ($request->isMethod('get')) {
                if (!empty($slug)) {
                    $order = Order::where('users_id', $slug)->get();
                    if (isset($order)) {
                        foreach($order as $key => $item) {

                            $data[$key] = $item;
                            if ($item['voucher_id'] && !empty($item['voucher_id'])) {
                                $data[$key]['voucher'] = $item->voucher;
                                unset($data[$key]['voucher_id']);
                            } else unset($data[$key]['voucher_id']);

                            foreach($item->order_item as $k => $i) {
                                $item->order_item[$k] = Product::find($i['products_id']);
                                $item->order_item[$k]['amount'] = $i['amount'];
                                $item->order_item[$k]['detail'] = Product::find($i['products_id'])->product_details;
                            }
                            $data[$key]['order_item'] = $item->order_item;
                        }
                        return response($data);
                    }

                } else return response()->json(['status' => 'info', 'message' => 'Không lấy được danh sách đặt hàng']);
            }
        }
    }

    public function orderDelete(Request $request, $slug) {
        if (Auth::check()) {
            return response($slug);
        }
    }

    public function suggestions(Request $request)
    {
        $searchTerm = $request->input('search');

        // Thực hiện logic để lấy gợi ý dựa trên từ khóa tìm kiếm

        $products = Product::where('hidden', 1)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->limit(5) // Giới hạn số lượng gợi ý
            ->get();

        $suggestions = $products->pluck('name'); // Lấy ra danh sách các tên sản phẩm làm gợi ý

        return response()->json($suggestions);
    }


    public function search(Request $request)
    {
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            // dd($searchTerm); //"product1" // app\Http\Controllers\PagesController.php:216
            $product = Product::where('name', $searchTerm)->first();

            // dd($product); //null // app\Http\Controllers\PagesController.php:218

            if ($product) {
                $alias = $product->alias;
                return Redirect::route('product', ['param1' => $alias]);
            }
        }

        // Logic xử lý khi không tìm thấy sản phẩm
        return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
    }
}
