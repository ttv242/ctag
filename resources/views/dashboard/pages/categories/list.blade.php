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
                            <li class="breadcrumb-item">Danh mục</li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header row">
                            <h2 class="col-lg-6 col-md-6 col-sm-12">Danh mục cha</h2>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="d-flex flex-row-reverse">
                                    <div class="page_action">
                                        <a href="{{ route('dashboard.creCat') }}/categories">
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
                                            <th class="text-center">Số lượng danh mục con</th>
                                            <th class="text-center">Số lượng sản phẩm</th>

                                            <th class="col-2 text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $key => $item)
                                            <tr
                                                class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->name) }}</td>
                                                <td class="text-center">{{ count($item->subcategories) }}</td>
                                                <td class="text-center"><a href="san-pham-danh-muc/{{ $item->alias }}">{{ count($item->products) }}</a></td>
                                                <td>
                                                    <div class="d-flex justify-content-around px-4">
                                                        <a id="editModalBtn" href="{{ route('dashboard.cat') }}/categories/update/{{ $item->id }}" title="Sửa">
                                                            <i class="fa fa-edit text-secondary"></i>
                                                        </a>
                                                        <a href="{{ route('dashboard.cat') }}/categories/delete/{{ $item->id }}" title="Xóa">
                                                            <i class="fa fa-trash-o text-danger"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center mt-2 h6 text-danger">Không có danh mục
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

            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header row">
                            <h2 class="col-lg-6 col-md-6 col-sm-12">Danh mục con</h2>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="d-flex flex-row-reverse">
                                    <div class="page_action">
                                        <a href="{{ route('dashboard.creCat') }}/subcategories">
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
                                            <th>Danh Mục Cha</th>
                                            <th class="text-center">Số lượng sản phẩm</th>

                                            <th class="col-2 text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($subcategories))
                                            @foreach ($subcategories as $key => $item)
                                                <tr
                                                    class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst($item->name) }}</td>
                                                    <td>{{ $item->categories->name }}</td>
                                                    <td class="text-center"><a href="san-pham-danh-muc/{{ $item->categories->alias }}/{{ $item->alias }}">{{ count($item->products) }}</a></td>
                                                    <td>
                                                        <div class="d-flex justify-content-around px-4">
                                                            <a id="editModalBtn" href="{{ route('dashboard.cat') }}/subcategories/update/{{ $item->id }}" title="Sửa">
                                                                <i class="fa fa-edit text-secondary"></i>
                                                            </a>
                                                            <a href="{{ route('dashboard.cat') }}/subcategories/delete/{{ $item->id }}" title="Xóa">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center mt-2 h6 text-danger">Không có danh mục
                                                </td>
                                            </tr>
                                        @endif
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
