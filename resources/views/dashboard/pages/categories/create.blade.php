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
                        <h2>Tạo danh mục</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Danh mục</li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm danh mục</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="basic-form" action="{{ route('dashboard.creCat') }}/{{ $slug }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    @if ($slug && $slug == 'subcategories' && $categories)
                                        <div class="row col-12 px-0">
                                            <div class="form-group col-12">
                                                <label>Chọn danh mục cha</label>
                                                <div class="c_multiselect">
                                                    <select class="form-select form-control" name="categories_id"
                                                        aria-label="Default select example">
                                                        <option selected>Chọn danh mục cha</option>
                                                        @foreach ($categories as $key => $item)
                                                            @if ($item['hidden'] == 1)
                                                                @continue
                                                            @endif
                                                            <option value="{{ $item['id'] }}">
                                                                {{ ucfirst($item['name']) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-12">
                                            <label>Tên danh mục</label>
                                            <input type="text" class="form-control" required="" name="name"
                                                placeholder="Tên danh mục ở đây...">
                                        </div>
                                    </div>
                                    <div class="col-12 row">
                                        <div class="form-group col-6">
                                            <label>Trạng thái</label>
                                            <br>
                                            <label class="fancy-radio">
                                                <input type="radio" name="hidden" value="1" required=""
                                                    data-parsley-errors-container="#error-radio"
                                                    data-parsley-multiple="hidden">
                                                <span><i></i>Ẩn</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="hidden" value="0"
                                                    data-parsley-multiple="hidden" checked>
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
                                                    data-parsley-multiple="featured" checked>
                                                <span><i></i>Không</span>
                                            </label>
                                            <label class="fancy-radio">
                                                <input type="radio" name="featured" value="1"
                                                    data-parsley-multiple="featured">
                                                <span><i></i>Có</span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta keyword</label>
                                        <textarea class="form-control" rows="5" cols="30" required="" name="meta_keyword"
                                            placeholder="Meta keywords (từ khóa meta): Nhập các từ khóa liên quan đến nội dung..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea class="form-control" rows="5" cols="30" required="" name="meta_description"
                                            placeholder="Meta description (mô tả meta): Nhập mô tả ngắn về nội dung..."></textarea>
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
