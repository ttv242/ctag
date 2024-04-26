<!doctype html>
<html lang="en">


<!-- Mirrored from wrraptheme.com/templates/iconic/dist/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Dec 2023 05:13:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

   

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/charts-c3/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
    <style>
        .annual_report .c3-axis.c3-axis-y {
            display: none;
        }

        .annual_report .c3-axis.c3-axis-x {
            display: none;
        }
    </style>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/custom.css') }}">
    @notifyCss

    <title>
        {{ $title }}
    </title>
</head>

<body data-theme="light" class="font-nunito">

    <div id="wrapper" class="theme-cyan">

        <!-- Page Loader -->
        {{-- <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ asset('dashboard/images/logo-icon.svg') }}" width="48" height="48"
                    alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div> --}}
