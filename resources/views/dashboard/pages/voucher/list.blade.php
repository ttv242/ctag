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
                            <li class="breadcrumb-item">Phiếu Giảm Giá</li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header row">
                            <h2 class="col-lg-6 col-md-6 col-sm-12">Tất cả thương hiệu</h2>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="d-flex flex-row-reverse">
                                    <div class="page_action">
                                        <a href="{{ route('dashboard.creVou') }}">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>
                                                Thêm</button>
                                        </a>
                                    </div>
                                    <div class="p-2 d-flex"></div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th class="text-center">Mã code</th>
                                            <th class="text-center col-2">Giảm giá</th>
                                            <th class="text-center col-2">thời hạn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($voucher as $key => $item)
                                            <tr
                                                class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->code) }}</td>
                                                <td>{{ ucfirst($item->percent) }}</td>
                                                <td>{{ ucfirst($item->created_at) }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around px-4">
                                                        <a href="{{ route('dashboard.voucher') }}/delete/{{ $item->id }}" title="Xóa">
                                                            <i class="fa fa-trash-o text-danger"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center mt-2 h6 text-danger">Không có mã giảm giá
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
