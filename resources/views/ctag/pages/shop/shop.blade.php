@extends('ctag.master')
@section('content')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
            data-image-src="{{ asset('ctag/images/shop_background.jpg') }}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $data->title }}</h2>
        </div>
    </div>

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Danh mục</div>
                            <ul class="sidebar_categories">
                                <ul class="sidebar_categories">
                                    @if (isset($data->content->categories))
                                        @foreach ($data->content->categories as $cat)
                                            <li><a
                                                    href="{{ route('categories') . '/' . $cat->alias }}">{{ $cat->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Bộ lọc</div>
                            <div class="sidebar_subtitle">Giá</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly
                                        style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                        {{-- <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Color</div>
                            <ul class="colors_list">

                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#"
                                        style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div> --}}

                        @if (isset($data->content->brands))
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Thương hiệu</div>
                                <ul class="brands_list">
                                    @foreach ($data->content->brands as $item)
                                        <li class="brand"><a
                                                href="{{ route('brands') . '/' . $item->alias }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count">
                                <span>{{ count((array)$data->content->products) }}</span> sản phẩm được tìm thấy
                            </div>
                            <div class="shop_sorting">
                                <span>Sắp xếp theo:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">Đánh giá cao nhất<i
                                                class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button"
                                                data-isotope-option="{ &quot;sortBy&quot;: &quot;original-order&quot; }">
                                                Đánh giá cao nhất</li>
                                            <li class="shop_sorting_button"
                                                data-isotope-option="{ &quot;sortBy&quot;: &quot;name&quot; }">Tên
                                            </li>
                                            <li class="shop_sorting_button"
                                                data-isotope-option="{ &quot;sortBy&quot;: &quot;price&quot; }">
                                                Giá</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_grid">
                            <div class="product_grid_border"></div>

                            @if (isset($data->content->products))
                            @foreach ($data->content->products as $pro)
                                    @php
                                        $price = empty($pro->product_details->price) ? 1 : $pro->product_details->price;
                                        $discount = empty($pro->product_details->discount) ? 1 : $pro->product_details->discount;
                                        $img = empty($pro->product_details->img) ? '' : $pro->product_details->img;
                                    @endphp

                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            {{-- <img src="{{ asset($img) }}" alt> --}}
                                            <img src="{{ asset($img) }}" alt>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_price">{{ $price }}$</div>
                                            <div class="product_name">
                                                <div><a href="{{ route('product') . '/' . $pro->alias }}"
                                                        tabindex="0">{{ $pro->name }}</a></div>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">
                                                -{{ (($price - $discount) / $price) * 100 }}%
                                            </li>
                                            @if (Carbon\Carbon::parse($pro->created_at)->diffInDays(Carbon\Carbon::now()) <= 7)

                                                <li class="product_mark product_new">Mới</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                            @endif

                            {{-- <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_5.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Philips BT6900A</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item discount">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_1.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225<span>$300</span></div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_2.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Apple iPod shuffle</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_3.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Sony MDRZX310W</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_4.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">LUNA Smartphone</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/shop_1.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Canon IXUS 175...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_5.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379<span>$300</span></div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Canon STM Kit...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_6.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225<span>$300</span></div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Samsung J330F</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_7.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Lenovo IdeaPad</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_8.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Digitus EDNET...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_1.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Astro M2 Black</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_2.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Transcend T.Sonic</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_3.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Xiaomi Band 2...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_4.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Rapoo T8 White</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item discount">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_1.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225<span>$300</span></div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Huawei MediaPad...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_6.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Nokia 3310 (2017)</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_7.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Rapoo 7100p Gray</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/new_8.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Canon EF</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/shop_2.jpg') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$225</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Gembird SPK-103</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div>

                            <div class="product_item is_new">
                                <div class="product_border"></div>
                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('ctag/images/featured_5.png') }}" alt>
                                </div>
                                <div class="product_content">
                                    <div class="product_price">$379</div>
                                    <div class="product_name">
                                        <div><a href="#" tabindex="0">Canon STM Kit...</a></div>
                                    </div>
                                </div>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                <ul class="product_marks">
                                    <li class="product_mark product_discount">-25%</li>
                                    <li class="product_mark product_new">new</li>
                                </ul>
                            </div> --}}
                        </div>

                        @if (isset($data->content->products) && is_array($data->content->products) && count($data->content->products) > 0)
                            <div class="shop_page_nav d-flex flex-row">
                                <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i
                                        class="fas fa-chevron-left"></i></div>
                                <ul class="page_nav d-flex flex-row">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">21</a></li>
                                </ul>
                                <div class="page_next d-flex flex-column align-items-center justify-content-center"><i
                                        class="fas fa-chevron-right"></i></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="viewed_slider_container">

                        <div class="owl-carousel owl-theme viewed_slider">

                            <div class="owl-item">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_1.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_2.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_3.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225</div>
                                        <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div
                                    class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_4.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_5.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('ctag/images/view_6.jpg') }}" alt></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$375</div>
                                        <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <div class="owl-carousel owl-theme brands_slider">
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_1.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_2.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_3.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_4.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_5.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_6.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_7.jpg') }}" alt></div>
                            </div>
                            <div class="owl-item">
                                <div class="brands_item d-flex flex-column justify-content-center"><img
                                        src="{{ asset('ctag/images/brands_8.jpg') }}" alt></div>
                            </div>
                        </div>

                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>
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
