<div class="header_main">
    <div class="container">
        <div class="row">

            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="{{ route('home') }}">C&T</a></div>
                </div>
            </div>

            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            {{-- <form action="#" class="header_search_form clearfix">
                                <input type="search" required="required" class="header_search_input"
                                    placeholder="Tìm kiếm sản phẩm...">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">Tất cả danh mục</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="#">Tất cả danh mục</a></li>
                                            @if (isset($categories))
                                                @foreach ($categories as $item)
                                                    <li><a class="clc" href="{{ route('categories') . '/' . $item->alias }}">{{ $item->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300"
                                    value="Submit"><img src="{{ asset('ctag/images/search.png') }}" alt></button>
                            </form> --}}

                            <form action="{{ route('search') }}" method="GET" class="header_search_form clearfix">
                                <input type="search" name="search" required="required" class="header_search_input"
                                    placeholder="Tìm kiếm sản phẩm..." id="search-input">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">Tất cả danh mục</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="#">Tất cả danh mục</a></li>
                                            @foreach ($data->content->categories as $item)
                                                <li><a class="clc"
                                                        href="{{ route('categories.show', $item->alias) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit">
                                    <img src="{{ asset('ctag/images/search.png') }}" alt="">
                                </button>
                            </form>

                            {{-- @dd($products); --}}
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    var typingTimer;
                                    var doneTypingInterval = 500; // Thời gian chờ sau khi dừng nhập (milliseconds)
                                    var searchInput = $('#search-input');

                                    searchInput.on('keyup', function() {
                                        clearTimeout(typingTimer);
                                        typingTimer = setTimeout(doneTyping, doneTypingInterval);
                                    });

                                    searchInput.on('keydown', function() {
                                        clearTimeout(typingTimer);
                                    });

                                    function doneTyping() {
                                        var searchTerm = searchInput.val();

                                        if (searchTerm.length >= 2) {
                                            $.ajax({
                                                url: "{{ route('search-suggestions') }}",
                                                type: "GET",
                                                data: {
                                                    search: searchTerm
                                                },
                                                success: function(response) {
                                                    // Xử lý gợi ý và hiển thị cho người dùng
                                                    console.log(response);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.log(xhr.responseText);
                                                }
                                            });
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    {{-- <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon"><img src="{{ asset('ctag/images/heart.png') }}" alt></div>
                        <div class="wishlist_content">
                            <div class="wishlist_text"><a href="#">Yêu thích</a></div>
                            <div class="wishlist_count">115</div>
                        </div>
                    </div> --}}

                    <a href="{{ route('cart') }}" class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <img src="{{ asset('ctag/images/cart.png') }}" alt>
                                <div class="cart_count"><span>0</span></div>
                            </div>
                            <div class="cart_content">
                                <div class="cart_text"><a href="{{ route('cart') }}">Giỏ hàng</a></div>
                                <a href="{{ route('cart') }}" class="cart_price"></a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
