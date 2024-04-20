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
                        <h2>Cập nhật thương hiệu</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">thương hiệu</li>
                            <li class="breadcrumb-item active">Cập nhật</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Cập nhật thương hiệu</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="basic-form" action="{{ route('dashboard.updateBra') }}/{{ 'update' }}/{{ $data->id }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Tên thương hiệu</label>
                                            <input type="text" class="form-control" required="" name="name"
                                                value="{{ $data->name }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Hình ảnh</label>
                                            <button class="col-12 p-2 border rounded" class="uploadImage"
                                                data-select-images='true'>{{ basename($data->img) }}
                                                <!-- <input type="hidden" value name="img"> -->
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 row">
                                        <div class="form-group col-6">
                                            <label>Trạng thái</label>
                                            <br>
                                            <label class="fancy-radio">
                                                <input type="radio" name="hidden" value="1" required=""
                                                    data-parsley-errors-container="#error-radio"
                                                    data-parsley-multiple="hidden"
                                                    {{ $data->hidden == 1 ? 'checked' : '' }}>
                                                <span><i></i>Ẩn</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="hidden" value="0"
                                                    data-parsley-multiple="hidden"
                                                    {{ $data->hidden == 0 ? 'checked' : '' }}>
                                                <span><i></i>Hiện</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Nổi bật</label>
                                            <br>
                                            <label class="fancy-radio">
                                                <input type="radio" name="featured" value="0" required=""
                                                    data-parsley-errors-container="#error-radio"
                                                    data-parsley-multiple="featured"
                                                    {{ $data->featured == 0 ? 'checked' : '' }}>
                                                <span><i></i>Không</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="featured" value="1"
                                                    data-parsley-multiple="featured"
                                                    {{ $data->featured == 1 ? 'checked' : '' }}>
                                                <span><i></i>Có</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta keyword</label>
                                        <textarea class="form-control" rows="5" cols="30" required="" name="meta_keyword"
                                            placeholder="{{ $data->meta_keyword }}">{{ $data->meta_keyword }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea class="form-control" rows="5" cols="30" required="" name="meta_description"
                                            placeholder="{{ $data->meta_description }}">{{ $data->meta_description }}</textarea>
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
