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
                        <h2>TạoPhiếu Giảm Giá</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Phiếu Giảm Giá</li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm Phiếu Giảm Giá</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="basic-form" action="{{ route('dashboard.creVou') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Tên thương hiệu</label>
                                            <input type="text" class="form-control" required="" name="code"
                                                placeholder="nhập mã phiếu giảm giá...">
                                        </div>
                                    </div>
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Phần trăm giảm</label>
                                            <input type="number" class="form-control" required="" name="percent"
                                                placeholder="Phâm trăm giảm...">
                                        </div>
                                    </div>
                              
                               
                                    <button type="submit" class="col-12 btn btn-primary" name="create">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
