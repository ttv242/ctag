@extends('dashboard.master')
@section('content')
    <style>
        td div a:hover i {
            font-size: 20px;
            transition: .3s ease-out;
        }
    </style>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>
                            Danh sách
                        </h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Đơn hàng</li>
                            <li class="breadcrumb-item active">Chờ xử lý</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header row">
                            <h2 class="col-lg-6 col-md-6 col-sm-12">Tất cả đơn hàng chờ xử lý</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th class="text-center">Tài khoản</th>
                                            <th class="text-center">Tên khách hàng</th>
                                            <th class="text-center">Số điện thoại</th>
                                            <th class="text-center">Địa chỉ</th>
                                            <th class="text-center">Ngày đặt hàng</th>
                                            <th class="col-2 text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cancelled as $key => $item)
                                            <tr
                                                class="">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->users->name) }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around px-4">
                                                        <a id="editModalBtn" href="{{ route('dashboard.order.detail') }}/{{ $item->id }}" title="Chi tiết đơn">
                                                            <i class="fa fa-info" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center mt-2 h6 text-danger">Không có đơn hàng
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
