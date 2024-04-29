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
                    <h2>Tạo bài viết</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Cập nhật bài viết</li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Viết bài</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form id="basic-form" action="{{ route('dashboard.updateBlo')}}/{{ 'update' }}/{{ $data->id }}" method="POST" enctype="multipart/form-data" novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" required="" name="title" value="{{$data->title}}">
                                </div>

                                <div class="form-group">
                                    <label>Mô tả ngắn bài viết</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="summary">
                                    {{$data->summary}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'>Chọn
                                        ảnh
                                        <input type="hidden" value="{{$data->img}}" name="img">
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <textarea id="editor" class="form-control" rows="10" cols="30" required="" name="content">{{$data->blog_detail->content}}</textarea>
                                </div>
                                <div class="col-12 row">
                                    <div class="form-group col-6">
                                        <label>Trạng thái</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="hidden" value="0" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="hidden">
                                            <span><i></i>Ẩn</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="hidden" value="1" data-parsley-multiple="hidden" checked>
                                            <span><i></i>Hiện</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Nổi bật</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="featured" value="0" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="featured" checked>
                                            <span><i></i>Không</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="featured" value="1" data-parsley-multiple="featured">
                                            <span><i></i>Có</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta keyword</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="meta_keyword">
                                    {{$data->blog_detail->meta_keyword}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="meta_description">
                                    {{$data->blog_detail->meta_description}}
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