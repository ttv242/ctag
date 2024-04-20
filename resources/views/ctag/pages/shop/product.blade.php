@extends('ctag.master')
@section('content')
    <div class="single_product pb-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        @php
                            // dd($data->content->product->product_details->album);
                            //"picture/assets/upload/Laptop-Notebook-SSTC-BabyShark-SL103(1).webp,picture/assets/upload/ Laptop-Notebook-SSTC-BabyShark-SL103.webp"
                            $album = explode(',', $data->content->product->product_details->album);
                        @endphp

                        @foreach ($album as $item)
                            <li data-image="{{ asset(trim($item)) }}"><img src="{{ asset(trim($item)) }}" alt></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset($data->content->product->product_details->img) }}" alt>
                    </div>
                </div>

                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">
                            {{ $data->content->product->category->name ?? '' }}/{{ $data->content->product->subcategory->name ?? '' }}
                        </div>
                        <div class="product_name">{{ $data->content->product->name }}</div>
                        {{-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
                        <div class="product_text">
                            <p>{{ $data->content->product->product_details->description }}</p>
                        </div>
                        <div class="order_info d-flex flex-row mt-0">
                            <form action="#">
                                {{-- <div class="clearfix" style="z-index: 1000;">

                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                    class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                    class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <ul class="product_color">
                                        <li>
                                            <span>Color: </span>
                                            <div class="color_mark_container">
                                                <div id="selected_color" class="color_mark"></div>
                                            </div>
                                            <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i>
                                            </div>
                                            <ul class="color_list">
                                                <li>
                                                    <div class="color_mark" style="background: #999999;"></div>
                                                </li>
                                                <li>
                                                    <div class="color_mark" style="background: #b19c83;"></div>
                                                </li>
                                                <li>
                                                    <div class="color_mark" style="background: #000000;"></div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> --}}
                                <div class="product_price mt-4">
                                    {{ number_format($data->content->product->product_details->discount == 0 ? $data->content->product->product_details->price : $data->content->product->product_details->discount, 0, ',', ',') }}<sup>đ</sup>

                                </div>
                                <div class="button_container mt-4">
                                    <button type="button" data-product_id="{{ $data->content->product->id }}"
                                        data-csrfToken="{{ csrf_token() }}"
                                        class="product_cart_button button cart_button">Add to Cart</button>
                                    {{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($data->content->viewed))
        <div class="viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="viewed_title_container">
                            <h3 class="viewed_title">Đã xem gần đây</h3>
                            <div class="viewed_nav_container">
                                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="viewed_slider_container">

                            <div class="owl-carousel owl-theme viewed_slider">

                                @foreach ($data->content->viewed as $item)
                                    <div class="owl-item">
                                        <div
                                            class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <a href="{{ route('product') . '/' . $item->alias }}" class="viewed_image"><img
                                                    src="{{ asset($item->product_details->img) }}" alt></a>

                                            <div class="viewed_content text-center">
                                                <div class="viewed_price">
                                                    {{ number_format($item->product_details->price, 0, ',', ',') }}<sup>đ</sup>
                                                    @if ($item->product_details->discount != null)
                                                        <span>
                                                            {{ number_format($item->product_details->discount, 0, ',', ',') }}<sup>đ</sup></span>
                                                    @endif

                                                </div>
                                                <div class="viewed_name"><a
                                                        href="{{ route('product') . '/' . $item->alias }}">{{ $item->name }}</a>
                                                </div>
                                            </div>
                                            <ul class="item_marks">
                                                @if (!empty($item->product_details->discount) && $item->product_details->price > $item->product_details->discount)
                                                    <li class="item_mark item_discount">
                                                        -{{ round((($item->product_details->price - $item->product_details->discount) / $item->product_details->price) * 100) }}%
                                                    </li>
                                                @endif
                                                @if (Carbon\Carbon::parse($item->created_at)->diffInDays(Carbon\Carbon::now()) <= 7)
                                                    <li class="item_mark product_new">Mới</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('ctag/images/send.png') }}" alt></div>
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
