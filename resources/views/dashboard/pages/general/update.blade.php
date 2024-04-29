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
                    <h2>Cập nhật thông tin</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Cập nhật thông tin</li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Thông tin</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form id="basic-form" action="{{ route('dashboard.updateGen')}}/{{ 'update' }}" method="POST" enctype="multipart/form-data" novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" required="" name="company_name" value="{{$data->company_name}}">
                                </div>

                               
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'>Chọn
                                        ảnh
                                        <input type="hidden" value="{{$data->logo}}" name="img">
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="url" class="form-control" required="" name="email" value="{{$data->email}}">
                                </div>
                                <div class="form-group">
                                    <label>facebook</label>
                                    <input type="url" class="form-control" required="" name="facebook" value="{{$data->facebook}}">
                                </div>

                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="url" class="form-control" required="" name="phone" value="{{$data->phone}}">
                                </div>

                                <div class="form-group">
                                    <label>Giới thiệu</label>
                                    <textarea id="editor" class="form-control" rows="10" cols="30" required="" name="introduce">{{$data->introduce}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta keyword</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="meta_keyword">
                                    {{$data->meta_keyword}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="meta_description">
                                    {{$data->meta_description}}
                                    </textarea>
                                </div>
                                <input type="submit" class="col-12 btn btn-primary" name="create" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection