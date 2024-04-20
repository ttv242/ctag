<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main_nav_content d-flex flex-row">

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">Danh mục</div>
                        </div>
                        <ul class="cat_menu">
                            @if (isset($data->content->categories))
                                <li><a href="{{ route('shop') }}">Tất cả sản phẩm<i
                                            class="fas fa-chevron-right"></i></a></li>
                                @foreach ($data->content->categories as $cat)
                                    <li class="hassubs">
                                        {{-- <a href="{{ route('categories') . '/' . $cat->alias }}">{{ $cat->name }}<i --}}
                                        <a >{{ $cat->name }}<i
                                                class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @if (isset($data->content->subcategories) &&
                                                    collect($data->content->subcategories)->where('categories_id', $cat->id)->isNotEmpty())
                                                @foreach (collect($data->content->subcategories)->where('categories_id', $cat->id) as $subcat)
                                                    <li class="hassubs">
                                                        <a
                                                            href="{{ route('categories') . '/' . $cat->alias . '/' . $subcat->alias }}">{{ $subcat->name }}<i
                                                                class=""></i></a>
                                                        <ul>
                                                            @if (isset($products) &&
                                                                    collect($products)->where('subcat_id', $subcat->id)->where('cat_id', $cat->id)->isNotEmpty())
                                                                @foreach (collect($products)->where('subcat_id', $subcat->id)->where('cat_id', $cat->id) as $pro)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('product') . '/' . $cat->alias . '/' . $subcat->alias . '/' . $pro->alias }}">{{ $pro->name }}<i
                                                                                class="fas fa-chevron-right"></i></a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                            {{-- <li><a href="#">Computers & Laptops <i
                                        class="fas fa-chevron-right ml-auto"></i></a></li>
                            <li><a href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
                            <li class="hassubs">
                                <a href="#">Hardware<i class="fas fa-chevron-right"></i></a>
                                <ul>
                                    <li class="hassubs">
                                        <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i
                                                        class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i
                                                        class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i
                                                        class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i
                                                        class="fas fa-chevron-right"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </li>
                            <li><a href="#">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
                            <li><a href="#">Gadgets<i class="fas fa-chevron-right"></i></a></li>
                            <li><a href="#">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
                            <li><a href="#">Video Games & Consoles<i class="fas fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#">Accessories<i class="fas fa-chevron-right"></i></a></li> --}}
                        </ul>
                    </div>

                    <div class="main_nav_menu mr-auto pl-4">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ route('home') }}">Trang chủ<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="{{ route('about') }}">Giới thiệu<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="{{ route('blog') }}">Tin tức<i class="fas fa-chevron-down"></i></a></li>

                            {{-- <li class="hassubs">
                                <a href="#">Tin tức<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </li> --}}
                            {{-- <li class="hassubs">
                                <a href="#">Thương hiệu nổi bật<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </li> --}}
                            <li><a href="{{ route('contact') }}">Liên hệ<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner">
                                    <span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
