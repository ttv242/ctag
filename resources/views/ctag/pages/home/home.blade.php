@extends('ctag.master')
@section('content')
    <!-- <div class="banner"></div> -->
    @include('ctag.inc.navbar.banner')

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('ctag/images/char_1.png') }}" alt></div>
                        <div class="char_content">
                            <div class="char_title">Giao hàng nhanh</div>
                            <div class="char_subtitle">từ 8<sup>k</sup> - 18<sup>k</sup></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('ctag/images/char_2.png') }}" alt></div>
                        <div class="char_content">
                            <div class="char_title">Hoàn trả nếu có lỗi</div>
                            <div class="char_subtitle">từ 1<sup>đ</sup></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('ctag/images/char_3.png') }}" alt></div>
                        <div class="char_content">
                            <div class="char_title">Thanh toán an toàn</div>
                            <div class="char_subtitle">uy tín 100%</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 char_col">
                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('ctag/images/char_4.png') }}" alt></div>
                        <div class="char_content">
                            <div class="char_title">Săn sale ưu đãi</div>
                            <div class="char_subtitle">đến 50%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    @if (isset($data->content->monthlyOffers))
                        <div class="deals">
                            <div class="deals_title">
                                Ưu đãi trong tháng
                            </div>
                            <div class="deals_slider_container">


                                <div class="owl-carousel owl-theme deals_slider">
                                    @foreach ($data->content->monthlyOffers as $item)
                                        <div class="owl-item deals_item">
                                            <a href="{{ route('product') . '/' . $item->alias }}" class="deals_image"><img
                                                    src="{{ asset($item->product_details->img) }}" alt></a>
                                            <div class="deals_content">
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_category"><a
                                                            href="{{ route('categories') . '/' . $item->category->alias ?? ('' . '/' . $item->subcategory->alias ?? '') }}">{{ $item->subcategory->name ?? '' }}</a>
                                                    </div>
                                                    <div class="deals_item_price_a ml-auto">
                                                        {{ number_format($item->product_details->price, 0, ',', ',') }}<sup>đ</sup>
                                                    </div>
                                                </div>
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <a href="{{ route('product') . '/' . $item->alias }}"
                                                        class="deals_item_name">{{ $item->name }}</a>
                                                    <div class="deals_item_price ml-auto">
                                                        {{ number_format($item->product_details->discount, 0, ',', ',') }}<sup>đ</sup>
                                                    </div>
                                                </div>
                                                <div class="available">
                                                    <div class="available_line d-flex flex-row justify-content-start">
                                                        <div class="available_title">Có sẵn: <span>24</span></div>
                                                        <div class="sold_title ml-auto">Đã bán: <span>28</span></div>
                                                    </div>
                                                    {{-- <div class="available_bar"><span style="width:17%"></span></div> --}}
                                                </div>
                                                <div
                                                    class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                    <div class="deals_timer_title_container">
                                                        <div class="deals_timer_title">Nhanh lên</div>
                                                        <div class="deals_timer_subtitle">Ưu đãi kết thúc sau:</div>
                                                    </div>
                                                    <div class="deals_timer_content ml-auto">
                                                        <div class="deals_timer_box clearfix"
                                                            data-target-time="{{ $item->target_time }}">
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                                <span>Giờ</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                                <span>Phút</span>
                                                            </div>
                                                            <div class="deals_timer_unit">
                                                                <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                                <span>Giây</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="deals_slider_nav_container">
                                <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                                </div>
                                <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Nổi bật</li>
                                    <li>Đang giảm giá</li>
                                    <li>Đánh giá tốt nhất</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @if (isset($data->content->featuredProducts))
                                        @foreach ($data->content->featuredProducts as $item)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($item->product_details->img) }}" alt>
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">
                                                            {{ number_format($item->product_details->price, 0, ',', ',') }}<sup>đ</sup>
                                                            @if ($item->product_details->discount != null)
                                                                <span>
                                                                    {{ number_format($item->product_details->discount, 0, ',', ',') }}<sup>đ</sup></span>
                                                            @endif
                                                        </div>
                                                        <div class="product_name">
                                                            <div><a
                                                                    href="{{ route('product') . '/' . $item->alias }}">{{ $item->name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            {{-- <div class="product_color">
                                                        <input type="radio" checked name="product_color"
                                                            style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div> --}}
                                                            <button class="product_cart_button"
                                                                data-product_id="{{ $item->id }}"
                                                                data-csrfToken="{{ csrf_token() }}">Thêm vào giỏ
                                                                hàng</button>
                                                        </div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        @if (!empty($item->product_details->discount) && $item->product_details->price > $item->product_details->discount)
                                                            <li class="product_mark product_discount">
                                                                -{{ round((($item->product_details->price - $item->product_details->discount) / $item->product_details->price) * 100) }}%
                                                            </li>
                                                        @endif
                                                        @if (Carbon\Carbon::parse($item->created_at)->diffInDays(Carbon\Carbon::now()) <= 7)
                                                            <li class="product_mark product_new">Mới</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <div class="product_panel panel">
                                <div class="featured_slider slider">
                                    @if (isset($data->content->sale))
                                        @foreach ($data->content->sale as $item)
                                            @if (!empty($item->product_details->discount) && $item->product_details->price > $item->product_details->discount)
                                                <div class="featured_slider_item">
                                                    <div class="border_active"></div>
                                                    <div
                                                        class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div
                                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($item->product_details->img) }}" alt>
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_price discount">
                                                                {{ number_format($item->product_details->price, 0, ',', ',') }}<sup>đ</sup>
                                                                @if ($item->product_details->discount != null)
                                                                    <span>
                                                                        {{ number_format($item->product_details->discount, 0, ',', ',') }}<sup>đ</sup></span>
                                                                @endif
                                                            </div>
                                                            <div class="product_name">
                                                                <div><a
                                                                        href="{{ route('product') . '/' . $item->alias }}">{{ $item->name }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="product_extras">
                                                                {{-- <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div> --}}
                                                                <a href="{{ route('product') . '/' . $item->alias }}"
                                                                    class="btn product_cart_button"
                                                                    data-product_id="{{ $item->id }}"
                                                                    data-csrfToken="{{ csrf_token() }}">
                                                                    Chi tiết sản phẩm
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                        <ul class="product_marks">
                                                            @if (!empty($item->product_details->discount) && $item->product_details->price > $item->product_details->discount)
                                                                <li class="product_mark product_discount">
                                                                    -{{ round((($item->product_details->price - $item->product_details->discount) / $item->product_details->price) * 100) }}%
                                                                </li>
                                                            @endif
                                                            @if (Carbon\Carbon::parse($item->created_at)->diffInDays(Carbon\Carbon::now()) <= 7)
                                                                <li class="product_mark product_new">Mới</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                    @if (isset($data->content->views))
                                        @foreach ($data->content->views as $item)
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($item->product_details->img) }}" alt>
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price discount">
                                                            {{ number_format($item->product_details->price, 0, ',', ',') }}<sup>đ</sup>
                                                            @if ($item->product_details->discount != null)
                                                                <span>
                                                                    {{ number_format($item->product_details->discount, 0, ',', ',') }}<sup>đ</sup></span>
                                                            @endif
                                                        </div>
                                                        <div class="product_name">
                                                            <div><a
                                                                    href="{{ route('product') . '/' . $item->alias }}">{{ $item->name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            {{-- <div class="product_color">
                                                        <input type="radio" checked name="product_color"
                                                            style="background:#b19c83">
                                                        <input type="radio" name="product_color"
                                                            style="background:#000000">
                                                        <input type="radio" name="product_color"
                                                            style="background:#999999">
                                                    </div> --}}
                                                            <a href="{{ route('product') . '/' . $item->alias }}"
                                                                class="btn product_cart_button"
                                                                data-product_id="{{ $item->id }}"
                                                                data-csrfToken="{{ csrf_token() }}">
                                                                Chi tiết sản phẩm
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        @if (!empty($item->product_details->discount) && $item->product_details->price > $item->product_details->discount)
                                                            <li class="product_mark product_discount">
                                                                -{{ round((($item->product_details->price - $item->product_details->discount) / $item->product_details->price) * 100) }}%
                                                            </li>
                                                        @endif
                                                        @if (Carbon\Carbon::parse($item->created_at)->diffInDays(Carbon\Carbon::now()) <= 7)
                                                            <li class="product_mark product_new">Mới</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Danh mục phổ biến</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        {{-- <div class="popular_categories_link"><a href="#">Tất cả danh mục</a></div> --}}
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            @if (isset($data->content->subcategories) && !empty($data->content->subcategories))
                                @foreach ($data->content->subcategories as $item)
                                    @if ($item->featured == 0)
                                        @continue
                                    @endif
                                    <div class="owl-item">
                                        <div
                                            class="popular_category d-flex flex-column align-items-center justify-content-center">
                                            <div class="popular_category_image"><img
                                                    src="{{ asset('ctag/images/popular_1.png') }}" alt></div>
                                            <div class="popular_category_text">{{ $item->name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner_2">
        <div class="banner_2_background"
            style="background-image:url({{ asset('ctag/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>

            <div class="owl-carousel owl-theme banner_2_slider">

                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('ctag/images/banner_2_product.png') }}" alt>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('ctag/images/banner_2_product.png') }}" alt>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('ctag/images/banner_2_product.png') }}" alt>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Sản phẩm mới</div>
                            <ul class="clearfix">
                                <li class="active">Nổi bật</li>
                                <li>Audio & Video</li>
                                <li>Laptops & Computers</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">

                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Astro M2 Black</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Transcend T.Sonic</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button active">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Xiaomi Band 2...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Rapoo T8 White</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Philips BT6900A</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Nokia 3310(2017)...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Rapoo 7100p Gray</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Canon EF</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Gembird SPK-103</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Canon IXUS 175...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button active">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>

                                <div class="product_panel panel">
                                    <div class="arrivals_slider slider">

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button active">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">-25%</li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$379</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price">$225</div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Thêm vào giỏ hàng</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount"></li>
                                                    <li class="product_mark product_new">Mới</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arrivals_single_image"><img
                                                src="{{ asset('ctag/images/new_single.png') }}" alt>
                                        </div>
                                        <div class="arrivals_single_content">
                                            <div class="arrivals_single_category"><a href="#">Smartphones</a>
                                            </div>
                                            <div class="arrivals_single_name_container clearfix">
                                                <div class="arrivals_single_name"><a href="#">LUNA Smartphone</a>
                                                </div>
                                                <div class="arrivals_single_price text-right">$379</div>
                                            </div>
                                            <div class="rating_r rating_r_4 arrivals_single_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <form action="#"><button class="arrivals_single_button">Thêm vào giỏ
                                                    hàng</button></form>
                                        </div>
                                        <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i>
                                        </div>
                                        <ul class="arrivals_single_marks product_marks">
                                            <li class="arrivals_single_mark product_mark product_new">Mới</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Bán chạy nhất</div>
                            <ul class="clearfix">
                                <li class="active">Top 20</li>
                                <li>Audio & Video</li>
                                <li>Laptops & Computers</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="bestsellers_panel panel active">

                            <div class="bestsellers_slider slider">

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_1.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_2.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Samsung
                                                    J730F...</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_3.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Nomi Black
                                                    White</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_4.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Samsung Charm
                                                    Gold</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_5.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Beoplay H7</a>
                                            </div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('ctag/images/best_6.png') }}"
                                                alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Huawei MediaPad
                                                    T3</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_1.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_2.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_3.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_4.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_5.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_6.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bestsellers_panel panel">

                            <div class="bestsellers_slider slider">

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_1.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_2.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_3.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_4.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_5.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_6.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_1.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_2.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_3.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_4.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_5.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_6.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bestsellers_panel panel">

                            <div class="bestsellers_slider slider">

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_1.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_2.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_3.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_4.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_5.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_6.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_1.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_2.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_3.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_4.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item discount">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_5.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>

                                <div class="bestsellers_item">
                                    <div
                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img
                                                src="{{ asset('ctag/images/best_6.png') }}" alt></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Tai nghe</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note
                                                    4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">Mới</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="adverts">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 advert_col">

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Xu hướng 2024</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="advert_image"><img src="{{ asset('ctag/images/adv_1.png') }}" alt></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 advert_col">

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_subtitle">Xu hướng 2024</div>
                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto">
                            <div class="advert_image"><img src="{{ asset('ctag/images/adv_2.png') }}" alt></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 advert_col">

                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                        <div class="advert_content">
                            <div class="advert_title"><a href="#">Xu hướng 2024</a></div>
                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                        </div>
                        <div class="ml-auto">
                            <div class="advert_image"><img src="{{ asset('ctag/images/adv_3.png') }}" alt></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="trends">
        <div class="trends_background" style="background-image:url({{ asset('ctag/images/trends_background.jpg') }})">
        </div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Xu hướng 2024</h2>
                        <div class="trends_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                        </div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <div class="owl-carousel owl-theme trends_slider">

                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_1.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">Jump White</a></div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="trends_item">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_2.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">Samsung Charm...</a>
                                            </div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_3.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">DJI Phantom 3...</a>
                                            </div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_1.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">Jump White</a></div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="trends_item">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_2.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">Jump White</a></div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('ctag/images/trends_3.jpg') }}" alt>
                                    </div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Smartphones</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="product.html">Jump White</a></div>
                                            <div class="trends_price">$379</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">Mới</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="reviews_title_container">
                        <h3 class="reviews_title">
                            Những đánh giá gần đây
                        </h3>
                        <div class="reviews_all ml-auto"><a href="#">Xem tất cả <span>đánh giá</span></a></div>
                    </div>
                    <div class="reviews_slider_container">

                        <div class="owl-carousel owl-theme reviews_slider">

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_1.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_2.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_3.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_1.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_2.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="{{ asset('ctag/images/review_3.jpg') }}"
                                                alt></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                                fermentum laoreet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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
                                            <a href="{{ route('product') . '/' . $item->alias }}"
                                                class="viewed_image"><img src="{{ asset($item->product_details->img) }}"
                                                    alt></a>

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

    @if (isset($data->content->featuredBrands))
        {{-- <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">

                            <div class="owl-carousel owl-theme brands_slider">

                                @foreach ($data->content->featuredBrands as $item)
                                    <div class="owl-item">
                                        <div class="brands_item d-flex flex-column justify-content-center"><img
                                                class="img-fluid col-12" src="{{ asset($item->img) }}" alt></div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
