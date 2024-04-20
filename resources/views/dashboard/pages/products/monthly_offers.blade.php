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
                        <h2>Ưu đãi tháng</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sản phẩm</li>
                            <li class="breadcrumb-item active">Ưu đãi tháng</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Danh sách ưu đãi tháng</h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th>Tên</th>
                                            <th>Danh Mục Cha</th>
                                            <th>Danh Mục Con</th>
                                            <th class="text-center col-2">Icon</th>
                                            <th class="col-2 text-center">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($products))
                                            @foreach ($products as $key => $item)

                                                @if( $item->target_time == null)
                                                    @continue
                                                @endif

                                            <tr class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '')}}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->categories->name }}</td>
                                                    <td>{{ $item->subcategories ? $item->subcategories->name : '' }}</td>
                                                    <td><img class="col-12" src="{{ asset($item->product_details ? $item->product_details->img : '') }}" alt="{{ $item->name }}"></td>
                                                    <td>
                                                        <div class="d-flex justify-content-around px-4">
                                                            <a href="{{ route('dashboard.monthlyOffers') }}/{{ $item->id }}" title="Xóa ưu đãi">
                                                                <i class="fa fa-trash-o text-danger"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center mt-2 h6 text-danger">Không có danh mục
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="header">
                            <h2>Thêm sản phẩm ưu đãi</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <form id="basic-form" action="{{ route('dashboard.monthlyOffers') }}" method="POST"
                                    enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    @method('PUT')
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
                                        <div class="form-group col-6">
                                            <label>Chọn sản phẩm</label>
                                            <div class="c_multiselect">
                                                <select class="form-select form-control" name="id"
                                                    aria-label="Default select example">
                                                    <option selected>Chọn sản phẩm</option>
                                                    @foreach ($products as $key => $item)
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

                                    <div class="form-group col-lg-12 col-md-12 px-0">
                                        <label>Ưu đãi đến: </label>
                                        <div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
                                            <input type="text" class="form-control" name="target_time">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><i
                                                        class="fa fa-calendar"></i></button>
                                            </div>
                                        </div>
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




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            const selectCategories = $('select[name="categories_id"]');
            const selectSubcategories = $('select[name="subcategories_id"]');
            const selectBrands = $('select[name="brands_id"]');
            const selectProducts = $('select[name="id"]');

            const inputPrice = $('input[name="price"]');
            const inputDiscount = $('input[name="discount"]');
            const inputTarget_time = $('input[name="target_time"]');

            const inputUpdate = $('input[name="update"]');

            selectSubcategories.prop('disabled', true); // Ban đầu disabled subcategories
            selectProducts.prop('disabled', true); // Ban đầu disabled products

            selectCategories.on('change', function(event) {
                const selectedCategoryId = selectCategories.val();

                selectSubcategories.prop('disabled', selectedCategoryId === selectCategories.find(
                    'option:first').val());

                // Bỏ các tùy chọn hiện tại trong subcategories
                selectSubcategories.empty();

                if (selectedCategoryId !== selectCategories.find('option:first').val()) {
                    const subcategories = getSubcategoriesByCategoryId(selectedCategoryId);

                    subcategories.forEach(subcategory => {
                        const option = $('<option></option>');
                        option.val(subcategory.id);
                        option.text(subcategory.name);
                        selectSubcategories.append(option);
                    });
                }

                // Reset và render lại danh sách products
                selectProducts.empty();
                renderProducts(selectSubcategories.val());
            });

            selectSubcategories.on('change', function(event) {
                selectCategories.prop('disabled', selectSubcategories.val() !== selectSubcategories.find(
                    'option:first').val());

                // Reset và render lại danh sách products
                selectProducts.empty();
                renderProducts(selectSubcategories.val());
            });

            selectBrands.on('change', function(event) {
                // Reset và render lại danh sách products
                selectProducts.empty();
                renderProductsByBrands(selectBrands.val());
            });

            function getSubcategoriesByCategoryId(categoryId) {
                const subcategories = {!! json_encode($subcategories) !!};

                const subcategoryFilter = new SubcategoryFilter(subcategories);
                return subcategoryFilter.getByCategoryId(categoryId);
            }

            function renderProductsByBrands(brandId) {
                const products = {!! json_encode($products) !!};

                const filteredProducts = products.filter(item => item.brands_id == brandId);

                filteredProducts.forEach(product => {
                    const option = $('<option></option>');
                    option.val(product.id);
                    option.text(product.name);
                    selectProducts.append(option);
                });

                // Kích hoạt select products
                selectProducts.prop('disabled', false);
            }

            function renderProducts(subcategoryId) {
                const products = {!! json_encode($products) !!};

                const filteredProducts = products.filter(item => item.subcategories_id == subcategoryId);

                filteredProducts.forEach(product => {
                    const option = $('<option></option>');
                    option.val(product.id);
                    option.text(product.name);
                    selectProducts.append(option);
                });

                // Kích hoạt select products
                selectProducts.prop('disabled', false);
            }

            class SubcategoryFilter {
                constructor(subcategories) {
                    this.subcategories = subcategories;
                }

                getByCategoryId(categoryId) {
                    const foundItems = this.subcategories.filter(item => item.categories_id == categoryId);

                    if (foundItems.length > 0) {
                        console.log('Các phần tử thỏa mãn điều kiện:', foundItems);
                        return foundItems;
                    } else {
                        console.log('Không có phần tử nào thỏa mãn điều kiện.');
                        return [];
                    }
                }
            }

            function getProductById(productId) {
                const products = {!! json_encode($products) !!};

                return products.find(product => product.id == productId);
            }

            function getDetailByParentId(productId) {
                const product_details = {!! json_encode($product_details) !!};

                return product_details.find(details => details.parent_id == productId);
            }

            selectProducts.on('change', function(event) {
                const selectedProductId = selectProducts.val();
                const product = getProductById(selectedProductId);
                const detail = getDetailByParentId(selectedProductId);

                renderPrice(detail.price);
                renderDiscount(detail.discount);
                renderTargetTime(product.target_time);
            });

            function renderPrice(price) {
                inputPrice.val(price);
            }

            function renderDiscount(discount) {
                inputDiscount.val(discount);
            }

            function renderTargetTime(target_time) {
                inputTarget_time.val(target_time);
            }

            inputUpdate.on('click', function(event) {
                event.preventDefault(); // Chặn hành động mặc định của sự kiện click

                let price = inputPrice.val();
                let discount = inputDiscount.val();
                let target_time = inputTarget_time.val();
                let productId = selectProducts.val();
                let detaiId = getProductById(productId).id;

                $.ajax({
                    url: '{{ route('dashboard.monthlyOffers') }}',
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: JSON.stringify({
                        id: productId,
                        detaiId: detaiId,
                        price: price,
                        discount: discount,
                        target_time: target_time
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(data) {
                        // Xử lý dữ liệu phản hồi từ API ở đây
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi ở đây (nếu có)
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
