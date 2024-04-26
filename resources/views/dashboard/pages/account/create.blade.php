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
                    <h2>Tài Khoản</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Tài Khoản</li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Thêm tài khoản</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form id="basic-form" action="{{ route('dashboard.creAcc') }}" method="POST" enctype="multipart/form-data" novalidate="">
                                @csrf
                                <div class="row col-12 px-0">
                                    <div class="form-group col-6">
                                        <label>Tên tài khoản</label>
                                        <input type="text" class="form-control" required="" name="name" placeholder="Tên tài khoản">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Hình ảnh</label>
                                        <button class="col-12 p-2 border rounded" class="uploadImage" data-select-images='true'>Chọn
                                            ảnh
                                            <input type="hidden" name="img">
                                        </button>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" required="" name="phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" required="" name="email" placeholder="Email....">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" required="" name="password">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Vị trí</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="role" value="admin" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="status">
                                            <span><i></i>Admin</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="role" value="user" data-parsley-multiple="status" checked>
                                            <span><i></i>User</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                                <div class="col-12 row">


                                    <div class="form-group col-6">
                                        <label>Trạng thái hoạt động</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="active_status" value="0" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="status">
                                            <span><i></i>không hoạt động</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="active_status" value="1" data-parsley-multiple="status" checked>
                                            <span><i></i>hoạt động</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Trạng thái</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="inactive" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="status">
                                            <span><i></i>Ẩn</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="status" value="active" data-parsley-multiple="status" checked>
                                            <span><i></i>Hiện</span>
                                        </label>
                                        <p id="error-radio"></p>
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