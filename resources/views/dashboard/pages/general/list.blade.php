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
                    <h2>Thông tin trang</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Thông tin trang</li>
                        <li class="breadcrumb-item active"></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Danh sách</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Tên công ty</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">email</th>
                                        <th class="text-center">facebook</th>
                                        <th class="text-center">phone</th>
                                        <th class="col-2 text-center">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>



                                    <tr>
                                        <td>
                                            {{$general->company_name}}
                                        </td>

                                        <td class="text-center">
                                            <img class="col-2 img-fluid" src="{{$general->logo}}" alt="{{$general->company_name}}" title="{{$general->company_name}}">
                                        </td>
                                        <td>
                                            {{$general->email}}
                                        </td>
                                        <td>
                                            {{$general->facebook}}
                                        </td>
                                        <td>
                                            {{$general->phone}}
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-around px-4">
                                                <a id="editModalBtn" href="{{ route('dashboard.general') }}/update/{{ $general->id }}" title="Sửa">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                   
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