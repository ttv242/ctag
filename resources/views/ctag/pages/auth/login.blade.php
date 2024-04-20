<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Mar 2024 01:19:27 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) && !empty($title) ? $title : 'Đăng nhập' }}</title>

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
                        <p>Hãy đăng nhập để tiếp tục trải nghiệm tuyệt vời và mua sắm dễ dàng trên trang web của chúng tôi.</p>
                        <div class="page-links">
                            <a href="{{ route('login') }}" class="active">Đăng nhập</a><a href="{{ route('register') }}">Đăng ký</a>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <input class="form-control" type="text" name="email" placeholder="Địa chỉ Email" required>
                            <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Đăng nhập</button> <a href="">Quên mật khẩu?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>Hoặc đăng nhập</span><a href="">Facebook</a><a href="">Google</a><a href="">Linkedin</a>
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

<!-- Mirrored from brandio.io/envato/iofrm/html/login5.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Mar 2024 01:19:30 GMT -->
</html>
