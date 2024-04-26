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
                        <li class="breadcrumb-item">Lượt xem nhiều nhất</li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center col-2">Hình Ảnh</th>
                                        <th>Danh Mục Cha</th>
                                        <th>Danh Mục Con</th>
                                        <th class="text-center col-2">Bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($product as $key => $item)
                                    <tr class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->product_details->img}}" alt=""></td>
                                        <td class="text-center">{{$item->categories->name}}</td>
                                        <td >{{$item->subcategories->name}}</td>
                                        <td>{{$item->best_seller}}</td>
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