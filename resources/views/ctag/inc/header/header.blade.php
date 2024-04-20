<!DOCTYPE html>
<html lang="vn">

<head>
    <title>{{ isset($data->title) && !empty($data->title) ? $data->title : 'C&T' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @notifyCss

    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('ctag/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/notifications.css') }}">

    @if (Request::route()->getName() == 'home')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/slick-1.8.0/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/main_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'shop' ||
            Request::route()->getName() == 'categories' ||
            Request::route()->getName() == 'brands')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/shop_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/shop_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'product')
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('ctag/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/product_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/product_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'blog')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/blog_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/blog_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'blog_single')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/blog_single_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/blog_single_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'regular')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/regular_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/regular_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'contact')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/contact_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/contact_responsive.css') }}">
    @endif

    @if (Request::route()->getName() == 'cart' || Request::route()->getName() == 'client')
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/cart_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('ctag/styles/cart_responsive.css') }}">
    @endif


    {{-- <script nonce="d1de502e-1eeb-4b9b-9499-75cc3a949218">
        try {
            (function(w, d) {
                ! function(du, dv, dw, dx) {
                    du[dw] = du[dw] || {};
                    du[dw].executed = [];
                    du.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    du.zaraz.q = [];
                    du.zaraz._f = function(dy) {
                        return async function() {
                            var dz = Array.prototype.slice.call(arguments);
                            du.zaraz.q.push({
                                m: dy,
                                a: dz
                            })
                        }
                    };
                    for (const dA of ["track", "set", "debug"]) du.zaraz[dA] = du.zaraz._f(dA);
                    du.zaraz.init = () => {
                        var dB = dv.getElementsByTagName(dx)[0],
                            dC = dv.createElement(dx),
                            dD = dv.getElementsByTagName("title")[0];
                        dD && (du[dw].t = dv.getElementsByTagName("title")[0].text);
                        du[dw].x = Math.random();
                        du[dw].w = du.screen.width;
                        du[dw].h = du.screen.height;
                        du[dw].j = du.innerHeight;
                        du[dw].e = du.innerWidth;
                        du[dw].l = du.location.href;
                        du[dw].r = dv.referrer;
                        du[dw].k = du.screen.colorDepth;
                        du[dw].n = dv.characterSet;
                        du[dw].o = (new Date).getTimezoneOffset();
                        if (du.dataLayer)
                            for (const dH of Object.entries(Object.entries(dataLayer).reduce(((dI, dJ) => ({
                                    ...dI[1],
                                    ...dJ[1]
                                })), {}))) zaraz.set(dH[0], dH[1], {
                                scope: "page"
                            });
                        du[dw].q = [];
                        for (; du.zaraz.q.length;) {
                            const dK = du.zaraz.q.shift();
                            du[dw].q.push(dK)
                        }
                        dC.defer = !0;
                        for (const dL of [localStorage, sessionStorage]) Object.keys(dL || {}).filter((dN => dN
                            .startsWith("_zaraz_"))).forEach((dM => {
                            try {
                                du[dw]["z_" + dM.slice(7)] = JSON.parse(dL.getItem(dM))
                            } catch {
                                du[dw]["z_" + dM.slice(7)] = dL.getItem(dM)
                            }
                        }));
                        dC.referrerPolicy = "origin";
                        dC.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(du[
                            dw])));
                        dB.parentNode.insertBefore(dC, dB)
                    };
                    ["complete", "interactive"].includes(dv.readyState) ? zaraz.init() : du.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script> --}}
</head>

<body>

    <div class="super_container">

        <!-- <header class="header"> -->
        <header class="header">

            <!-- <div class="top_bar"> -->
            @include('ctag.inc.header.top_bar')

            <!-- <div class="header_main"> -->
            @include('ctag.inc.header.header_main')

            <!-- <nav class="main_nav"> -->
            @include('ctag.inc.header.main_nav')


            <!-- <div class="page_menu"> -->
            @include('ctag.inc.header.page_menu')

        </header>
