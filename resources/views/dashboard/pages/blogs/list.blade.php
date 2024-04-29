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
                    <h2>Danh sách bài viết</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Bài viết</li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header row">
                        <h2 class="col-lg-6 col-md-6 col-sm-12">Danh mục tin tức</h2>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-row-reverse">
                                <div class="page_action">
                                    <a href="{{ route('dashboard.creBlo') }}">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>
                                            Thêm</button>
                                    </a>
                                </div>
                                <div class="p-2 d-flex"></div>
                            </div>
                        </div>
                    </div>
                    <div class="header">
                        <h2>Danh sách</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Tiêu đề</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="col-2 text-center">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @forelse ($blogs as $key => $item)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{$item->title}}
                                        </td>

                                        <td class="text-center">
                                            <img class="col-2 img-fluid" src="{{$item->img}}" alt="{{$item->title}}" title="{{$item->title}}">
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-around px-4">
                                                <a id="editModalBtn" href="{{ route('dashboard.blogs') }}/update/{{ $item->id }}" title="Sửa">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                                <a href="{{ route('dashboard.blogs') }}/delete/{{ $item->id }}" title="Xóa">
                                                    <i class="fa fa-trash-o text-danger"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center mt-2 h6 text-danger">Không có tài khoản
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