<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Mar 2024 01:20:03 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) && !empty($title) ? $title : 'Đăng ký' }}</title>
    @notifyCss

    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/register-login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/register-login/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/register-login/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/register-login/css/iofrm-theme5.css') }}">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="{{ route('home') }}">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('ctag/register-login/images/logo-light.svg') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('ctag/register-login/images/graphic2.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Chào mừng đến với C&T</h3>
                        <p>Đăng ký và khám phá ngay bộ sưu tập PC, laptop, năng lượng mặt trời, camera và hơn thế nữa!</p>
                        <div class="page-links">
                            <a href="{{ route('login') }}">Đăng nhập</a><a href="{{ route('register') }}" class="active">Đăng ký</a>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Họ và tên" required>
                            <input class="form-control" type="email" name="email" placeholder="Địa chỉ E-mail" required>
                            <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Đăng ký</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Hoặc đăng nhập</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('ctag/register-login/js/jquery.min.js') }}"></script>
<script src="{{ asset('ctag/register-login/js/popper.min.js') }}"></script>
<script src="{{ asset('ctag/register-login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ctag/register-login/js/main.js') }}"></script>

<x-notify::notify />

@notifyJs
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Mar 2024 01:20:03 GMT -->
</html>
