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
                    <h2>Cập nhật tài Khoản</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Tài Khoản</li>
                        <li class="breadcrumb-item active">Cập nhật tài Khoản</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Settings">Thông tin</a></li>
                        </ul>
                    </div>
                    <form action="{{ route('dashboard.updateAcc') }}/{{'update'}}/{{ $data->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="tab-content">

                            <div class="tab-pane active" id="Settings">

                                <div class="body">
                                    <h6></h6>
                                    <div class="media">
                                        <div class="media-left m-r-15 " style="width: 15%; height: 15%;">
                                            <img src="{{$data->img}}" class="user-photo media-object" alt="{{$data->name}}">

                                        </div>

                                    </div>
                                </div>

                                <div class="body">
                                    <div class="mb-4">
                                        <h2><b>SƠ YẾU LÝ LỊCH</b></h2>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="" class="text-danger"><b>HỌ VÀ TÊN: </b></label>
                                                <span>{{$data->name}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-danger"><b>ĐỊA CHỈ: </b></label>
                                                @if($data->address!=null)
                                                <span>
                                                    $data->address
                                                </span>
                                                @else
                                                <span>
                                                    <i>Địa chỉ trống</i>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label for="" class="text-danger"><b>SỐ ĐIỆN THOẠI: </b></label>
                                                @if($data->phone!=null)
                                                <span>
                                                    $data->phone
                                                </span>
                                                @else
                                                <span>
                                                    <i>Số điện thoại trống</i>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="text-danger"><b>EMAIL: </b></label>
                                                <span>{{$data->email}}</span>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="role">
                                                    <option value="user">khách hàng</option>
                                                    <option value="admin">Quản trị viên</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="col-12 btn btn-primary" name="create">Submit</button>
                                </div>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection