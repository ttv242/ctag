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
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h2>Tạo sản phẩm</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}?>"><i
                                        class="fa fa-dashboard"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sản phẩm</li>
                            <li class="breadcrumb-item">Cập nhật</li>
                            <li class="breadcrumb-item">{{ $data->categories->name }}</li>
                            <li class="breadcrumb-item">{{ $data->subcategories ? $data->subcategories->name : '' }}</li>
                            <li class="breadcrumb-item active">{{ $data->name }}</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <a href="{{ route('dashboard.pro') }}">
                                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        Danh sách</button>
                                </a>
                            </div>
                            <div class="p-2 d-flex">
                            </div>
                        </div>
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
                                <form id="basic-form" action="{{ route('dashboard.updatePro') }}/{{ 'update' }}/{{ $data->id }}" method="POST" enctype="multipart/form-data"
                                    novalidate="">
                                    <div class="row col-12 px-0">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group col-6">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="name"
                                                placeholder="{{ $data->name }}" value="{{ $data->name }}">
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
                                                        <option value="{{ $item['id'] }}" {{ $item->id == $data->brands_id ? 'selected' : '' }}>
                                                            {{ $item['name'] }}
                                                        </option>
                                                    @endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 px-0">
                                        <div class="form-group col-6">
                                            <label>Giá sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="price"
                                                placeholder="{{ $data->product_details ? $data->product_details->price : '' }}"
                                                value="{{ $data->product_details ? $data->product_details->price : '' }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Giảm giá</label>
                                            <input type="text" class="form-control" required="" name="discount"
                                                placeholder="{{ $data->product_details->discount ?? 0 }}"
                                                value="{{ $data->product_details->discount ?? 0 }}">
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
                                                        @if ($item->hidden == 1)
                                                            @continue
                                                        @endif

                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $data->categories_id ? 'selected' : '' }}>
                                                            {{ $item->name }}
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
                                                        @if ($item->hidden == 1)
                                                            @continue
                                                        @endif

                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $data->subcategories_id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'>
                                            {{ $data->product_details && $data->product_details->img != '' ? $data->product_details->img : 'Chọn ảnh' }}
                                            <input type="hidden" value="{{ $data->product_details ? $data->product_details->img : '' }}" name="img">
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>Album</label>
                                        <button class="col-12 p-2 border" class="uploadImage" data-select-album='true'>
                                            {{ $data->product_details && $data->product_details->album != '' ? $data->product_details->album : 'Chọn Album' }}
                                            <input type="hidden" value="{{ $data->product_details ? $data->product_details->album : '' }}" name="album">
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ngắn sản phẩm</label>
                                        <textarea id="editor1" class="form-control" rows="5" cols="30" required="" name="summary"
                                            placeholder="{{ $data->product_details->summary ?? '' }}">{{ $data->product_details->summary ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả chi tiết sản phẩm</label>
                                        <textarea id="editor" class="form-control" rows="10" cols="30" required="" name="description"
                                            placeholder="{{ $data->product_details->description ?? '' }}">{{ $data->product_details->description ?? '' }}</textarea>
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
                                            placeholder="{{ $data->product_details->meta_keyword ?? '' }}">{{ $data->product_details->meta_keyword ?? '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta description</label>
                                        <textarea class="form-control" rows="5" cols="30" required="" name="meta_description"
                                            placeholder="{{ $data->product_details->meta_description ?? '' }}">{{ $data->product_details->meta_description ?? '' }}</textarea>
                                    </div>
                                    <input type="submit" class="col-12 btn btn-primary" name="update" value="Submit">
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

            // const subcategories = <?php echo $subcategories; ?>

            console.log(subcategories);
            const foundItems = subcategories.filter(item => item.parent_id == categoryId);

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
