<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                {{-- <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><img src="{{ asset('ctag/images/phone.png') }}" alt></div>+38 068 005 3570
                </div> --}}
                {{-- <div class="top_bar_contact_item">
                    <div class="top_bar_icon"><img src="{{ asset('ctag/images/mail.png') }}" alt></div><a
                        href="https://preview.colorlib.com/cdn-cgi/l/email-protection#365057454245575a534576515b575f5a1855595b"><span
                            class="__cf_email__"
                            data-cfemail="8ee8effdfafdefe2ebfdcee9e3efe7e2a0ede1e3">[email&#160;protected]</span></a>
                </div> --}}
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            {{-- <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Japanese</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li>
                                <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">EUR Euro</a></li>
                                    <li><a href="#">GBP British Pound</a></li>
                                    <li><a href="#">JPY Japanese Yen</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="{{ asset('ctag/images/user.svg') }}" alt></div>
                        @if (Auth::check())
                            <div>
                                <a href="{{ route('client') }}">Xin chào, {{ Auth::user()->name }}</a>
                            </div>
                            <a href="{{ route('logout') }}">Đăng xuất</a>
                        @else
                            <div><a href="{{ route('register') }}">Đăng ký</a></div>
                            <div><a href="{{ route('login') }}">Đăng nhập</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
