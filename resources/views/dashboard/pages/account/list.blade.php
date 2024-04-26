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
                        <li class="breadcrumb-item">Tài khoản</li>
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
                                    <a href="{{ route('dashboard.creAcc') }}">
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
                                        <th>Tên</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center col-2">Email</th>
                                        <th class="text-center col-2">Phone</th>
                                        <th class="col-2 text-center">Vị trí </th>
                                        <th class="col-2 text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($account as $key => $item)
                                    <tr class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>
                                            <img class="col-12" src="{{ asset($item->img) }}" alt="{{ $item->name }}">
                                        </td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{ ucfirst($item->role) }}</td>


                                        <td>
                                            <div class="d-flex justify-content-around px-4">
                                                <a id="editModalBtn" href="{{ route('dashboard.acc') }}/update/{{ $item->id }}" title="Sửa">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                                <a href="{{ route('dashboard.acc') }}/delete/{{ $item->id }}" title="Xóa">
                                                    <i class="fa fa-trash-o text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center mt-2 h6 text-danger">Không có thương hiệu
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