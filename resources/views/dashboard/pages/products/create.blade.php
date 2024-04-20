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
                        <h2>Tạo sản phẩm</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sản phẩm</li>
                            <li class="breadcrumb-item active">Thêm</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm sản phẩm</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="basic-form" action="{{ route('dashboard.crePro') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="name"
                                                placeholder="Tên sản phẩm ở đây...">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Thương hiệu sản phẩm</label>
                                            <div class="c_multiselect">
                                                <select class="form-select form-control" name="brands_id"
                                                    aria-label="Default select example">
                                                    <option selected>Chọn thương hiệu</option>
                                                    @foreach ($brands as $key => $item)
                                                        @if ($item['hidden'] == 1)
                                                            @continue
                                                        @endif
                                                        <option value="{{ $item['id'] }}">
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 row px-0">
                                        <div class="form-group col-6">
                                            <label>Danh mục sản phẩm (Categories)</label>
                                            <div class="c_multiselect">
                                                <select class="form-select form-control" name="categories_id"
                                                    aria-label="Default select example">
                                                    <option selected>Chọn danh mục cha</option>
                                                    @foreach ($categories as $key => $item)
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
                                        <div class="form-group col-6">
                                            <label>Danh mục sản phẩm (Subcategories)</label>
                                            <div class="c_multiselect">
                                                <select class="form-select form-control" name="subcategories_id"
                                                    aria-label="Default select example">
                                                    <option selected>Chọn danh mục con</option>
                                                    @foreach ($subcategories as $key => $item)
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
                                    </div>
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Giá sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="price"
                                                placeholder="Giá sản phẩm ở đây...">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Giảm giá</label>
                                            <input type="text" class="form-control" required="" name="discount"
                                                value="0" placeholder="Giảm giá sản phẩm ở đây...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'>Chọn
                                            ảnh
                                            <!-- <input type="hidden" value name="img"> -->
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>Album</label>
                                        <button class="col-12 p-2 border" class="uploadImage" data-select-album='true'>Chọn
                                            album
                                            <!-- <input type="hidden" value name="album"> -->
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ngắn sản phẩm</label>
                                        <textarea id="editor1" class="form-control" rows="5" cols="30" required="" name="summary"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả chi tiết sản phẩm</label>
                                        <textarea id="editor" class="form-control" rows="10" cols="30" required="" name="description"></textarea>
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
                                    <input type="submit" class="col-12 btn btn-primary" name="create" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectCategories = document.querySelector('select[name="categories_id"]');
            const selectSubcategories = document.querySelector('select[name="subcategories_id"]');

            selectSubcategories.disabled = true; // Ban đầu disabled subcategories
            selectCategories.addEventListener('change', function(event) {
                const selectedCategoryId = selectCategories.value;

                selectSubcategories.disabled = selectedCategoryId === selectCategories.options[0].value;

                // Bỏ các tùy chọn hiện tại trong subcategories
                selectSubcategories.innerHTML = '';

                if (selectedCategoryId !== selectCategories.options[0].value) {
                    // Thêm các tùy chọn mới trong subcategories với value là id của categories
                    const subcategories = getSubcategoriesByCategoryId(
                        selectedCategoryId); // Hàm lấy subcategories dựa trên id của categories

                    subcategories.forEach(subcategory => {
                        const option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.name;
                        selectSubcategories.appendChild(option);
                    });
                }
            });

            selectSubcategories.addEventListener('change', function(event) {
                // selectCategories.disabled = selectSubcategories.value !== selectSubcategories.options[0].value;
            });
        });

        function getSubcategoriesByCategoryId(categoryId) {
            // Thay thế đoạn này bằng logic thực tế để lấy danh sách subcategories
            console.log(categoryId);

            // const subcategories = {!! json_encode($subcategories) !!};
            const subcategories = {!! json_encode($subcategories) !!};

            console.log(subcategories);
            const foundItems = subcategories.filter(item => item.categories_id == categoryId);

            if (foundItems.length > 0) {
                // Các phần tử thỏa mãn điều kiện được tìm thấy
                console.log('Các phần tử thỏa mãn điều kiện:', foundItems);
                return foundItems;
            } else {
                // Không có phần tử nào thỏa mãn điều kiện
                console.log('Không có phần tử nào thỏa mãn điều kiện.');
            }
        }
    </script>
@endsection
