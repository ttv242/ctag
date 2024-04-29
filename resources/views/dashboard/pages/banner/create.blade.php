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
                        <li class="breadcrumb-item"><a href=""><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Quảng cáo</li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Quảng cáo</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form id="basic-form" action="{{ route('dashboard.creBan') }}" method="POST" enctype="multipart/form-data" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label>Tiêu đề quảng cáo</label>
                                    <input type="text" class="form-control" required="" name="title" placeholder="Tiêu đề bài viết ở đây...">
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'>Chọn
                                        ảnh
                                        <input type="hidden" value name="img">
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label>Quảng cáo Sản Phẩm</label>
                                    <div class="c_multiselect">
                                        <select class="form-select form-control" name="parent_id" aria-label="Default select example">
                                            <option selected>Chọn sản phẩm quảng cáo </option>
                                            @foreach ($product as $key => $item)
                                            @if ($item['hidden'] == 1)
                                            @continue
                                            @endif
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['name'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Link quảng cáo</label>
                                    <input type="url" class="form-control" required="" name="url">
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