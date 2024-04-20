@extends('ctag.master')

<style>
    .input {
        font-family: monospace;
        max-width: 190px;
        max-height: 32px;
        outline: none;
        border: 1px solid #dadada;
        padding: 10px;
        border-radius: 5px;
        background-color: #f3f7fe;
        transition: .3s;
        color: #3b82f6;
        text-align: center;
    }

    .input:focus {
        border: 1px solid #3b82f6;
        box-shadow: 0 0 0 4px #3b83f65f
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .buttonCart {
        align-items: center;
        appearance: none;
        background-color: #EEF2FF;
        border-radius: 8px;
        border-width: 2px;
        border-color: #536DFE;
        box-shadow: rgba(83, 109, 254, 0.2) 0 2px 4px, rgba(83, 109, 254, 0.15) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #ffffff;
        cursor: pointer;
        display: inline-flex;
        /* font-family: "JetBrains Mono", monospace; */
        max-height: 32px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 24px;
        padding-right: 24px;
        position: relative;
        text-align: center;
        text-decoration: none;
        transition: box-shadow 0.15s, transform 0.15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 20px;
    }

    .buttonCart:focus {
        outline: none;
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(83, 109, 254, 0.4) 0 2px 4px, rgba(83, 109, 254, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .buttonCart:hover {
        box-shadow: rgba(83, 109, 254, 0.3) 0 4px 8px, rgba(83, 109, 254, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .buttonCart:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
    }

    .cart_list li:hover {
        background-color: #0e8be40f;
        transition: .1s ease-in;
    }

    .cart_item_delete:hover * {
        color: red;
        cursor: pointer;
        transition: .1s all ease-in-out;
    }
</style>

@php
    if (session()->has('cart')) {
        $cart = session('cart');
        $cart = array_reverse($cart);

        $cart = json_encode($cart);
        $cart = json_decode($cart);
        $total = 0;
    }
@endphp

@section('content')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">Giỏ hàng</div>


                        @if (!empty($cart))
                            <div class="cart_items">
                                <ul class="cart_list">

                                    @foreach ($cart as $item)
                                        <li class="cart_item clearfix" style="border-bottom: 1.5px solid #f0f0f0">
                                            <div class="cart_item_image"><img
                                                    src="{{ $item->product_details->img ? asset($item->product_details->img) : asset('ctag/images/shopping_cart.jpg') }}"
                                                    alt></div>
                                            <div
                                                class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col col-lg-4">
                                                    <div class="cart_item_title">Tên sản phẩm</div>
                                                    <div href="{{ route('product') . '/' . $item->alias }}"
                                                        class="cart_item_text">{{ $item->name }}</div>
                                                </div>
                                                {{-- <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text"><span
                                                        style="background-color:#999999;"></span>Silver</div>
                                            </div> --}}
                                                <div class="cart_item_quantity cart_info_col col-lg-2">
                                                    <div class="cart_item_title">Số lượng</div>
                                                    <div class="cart_item_text row d-flex" name="id"
                                                        value="{{ $item->id }}" data-csrfToken="{{ csrf_token() }}">
                                                        <button class="button buttonCart col-3 minus"
                                                            role="button">-</button>

                                                        <input value="{{ $item->amount }}" class="input col-6"
                                                            name="amount" type="number">
                                                        <button class="button buttonCart col-3 plus"
                                                            role="button">+</button>
                                                        {{-- <button class="col-2">-</button> <input class="col-4" type="number" name="" id="" value="{{ $item->amount }}"> <button class="col-2">+</button> --}}
                                                    </div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Giá</div>
                                                    <div class="cart_item_text">
                                                        {{ number_format($item->product_details->discount == 0 ? $item->product_details->price : $item->product_details->discount, 0, ',', ',') }}<sup>đ</sup>
                                                    </div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Tổng cộng</div>
                                                    <div class="cart_item_text">
                                                        {{ number_format($item->product_details->discount == 0 ? $item->product_details->price : $item->product_details->discount * $item->amount, 0, ',', ',') }}<sup>đ</sup>
                                                    </div>
                                                </div>
                                                <div class="cart_item_delete cart_info_col">
                                                    {{-- <div class="cart_item_title">Xóa</div> --}}
                                                    <div class="cart_item_text col-1 text-info cart_delete"
                                                        data-product_id="{{ $item->id }}"
                                                        data-csrfToken="{{ csrf_token() }}">
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        @php
                                            $total += $item->product_details->price * $item->amount;
                                        @endphp
                                    @endforeach
                                </ul>
                            </div>

                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Tổng cộng:</div>
                                    <div class="order_total_amount">{{ $total }}</div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Đơn hàng rỗng, xin mời quay lại đặt hàng...!
                            </div>
                        @endif

                        <div class="cart_buttons">
                            <a href="{{ route('shop') }}">
                                <button type="button" class="button cart_button_clear">Quay lại</button>
                            </a>
                            <a href="{{ route("client") }}">
                                <button type="button" class="button cart_button_checkout">Thanh toán</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text">
                                <p>...and receive %20 coupon for first shopping.</p>
                            </div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required"
                                    placeholder="Enter your email address">
                                <button class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
