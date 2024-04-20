<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CartsController extends Controller
{
    //

    public function getItemToCart(Request $request)
    {
        // Kiểm tra phương thức của yêu cầu
        if ($request->method('GET')) {
            // Kiểm tra slug có phù hợp

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng chưa
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');

                // Trả về JSON response
                $cart = array_reverse($cart);
                return response()->json(['success' => true, 'message' => 'Danh sách sản phẩm trong giỏ hàng', 'cart' => $cart]);
            }
        }
    }

    public function addItemToCart(Request $request)
    {
        // Kiểm tra phương thức của yêu cầu
        if ($request->method('POST')) {
            // Kiểm tra slug có phù hợp

            $productId = $request->input('product_id');

            // Tìm sản phẩm theo ID
            // $product = Product::find($productId);
            $products = json_decode(File::get(public_path('json/data/product.json')), true);

            $product = [];
            foreach ($products as $item) {
                if ($item['id'] == $productId) {
                    $product = $item;
                }
            }

            // $product['product_details'] = $product->product_details;

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng chưa
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            } else {
                $cart = [];
            }

            if (empty($cart)) {
                // Giỏ hàng trống, thêm sản phẩm vào giỏ hàng
                $amount = 1;
                $product['amount'] = $amount;
                $cart[$productId] = $product;

            } else {
                $productExists = false;

                foreach ($cart as $key => $item) {
                    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                    if ($key == $productId) {
                        // Sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
                        $cart[$key]['amount'] += 1;
                        $productExists = true;
                        break;
                    }
                }

                if (!$productExists) {
                    // Sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
                    $amount = 1;
                    $product['amount'] = $amount;
                    $cart[$productId] = $product;
                }
            }

            // Lưu giỏ hàng vào session
            $request->session()->put('cart', $cart);

            // Trả về JSON response
            return response()->json(['success' => true, 'message' => 'Đã thêm sản phẩm vào giỏ hàng', 'cart' => $cart]);
        }
    }

    public function updateAmountItem(Request $request)
    {
        // Kiểm tra phương thức của yêu cầu
        if ($request->method('PUT')) {
            // Kiểm tra slug có phù hợp

            $productId = $request->input('product_id');
            $amount = $request->input('amount');

            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng chưa
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            }


            $productExists = false;

            foreach ($cart as $key => $item) {
                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                if ($key == $productId) {
                    // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                    $cart[$key]['amount'] = $amount;
                    $productExists = true;

                    break;
                }
            }

            if (!$productExists) {
                return response()->json(['success' => false, 'message' => 'Cập nhật số lượng không thành công...!']);
            }


            // Lưu giỏ hàng vào session
            $request->session()->put('cart', $cart);

            // Trả về JSON response
            return response()->json(['success' => true, 'message' => 'Cập nhật số lượng thành công...!', 'cart' => $cart[$productId]]);
        }
    }

    public function deleteItemToCart(Request $request)
    {
        // Kiểm tra phương thức của yêu cầu
        if ($request->method('POST')) {
            // Lấy ID của sản phẩm cần xóa khỏi giỏ hàng
            $productId = $request->input('product_id');

            // Kiểm tra xem giỏ hàng có tồn tại trong session không
            if ($request->session()->has('cart')) {
                // Lấy giỏ hàng từ session
                $cart = $request->session()->get('cart');

                // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
                if (array_key_exists($productId, $cart)) {
                    // Xóa sản phẩm khỏi giỏ hàng
                    unset($cart[$productId]);

                    // Lưu giỏ hàng vào session
                    $request->session()->put('cart', $cart);

                    // Trả về JSON response
                    return response()->json(['success' => true, 'message' => 'Đã xóa sản phẩm khỏi giỏ hàng', 'cart' => $cart]);
                }
            }
        }

        // Trả về JSON response nếu không thành công
        return response()->json(['success' => false, 'message' => 'Không thể xóa sản phẩm khỏi giỏ hàng']);
    }
}
