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
                    <h2>
                        Danh sách
                    </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Lượt xem nhiều nhất</li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix  date_product">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">

                    <div class="body">
                        <div class="table-responsive">
                            <!-- <div class="row">
                                <div class="col-3">
                                    <span>Bất đầu</span>
                                    <input type="date" class="startdate" name="startdate">
                                </div>
                                <span>Kết thúc</span>
                                <div class="col-3">
                                    <input type="date" class="enddate" name="enddate">
                                </div>
                                <button type="submit" class="btn loc_date_product">Lọc</button>
                            </div> -->



                            <table class="table table-hover mb-0" id='table-data'>
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center col-2">Hình Ảnh</th>
                                        <th>Danh Mục Cha</th>
                                        <th>Danh Mục Con</th>
                                        <th class="text-center col-2">Lượt xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($product as $key => $item)
                                    <tr class="text-{{ $item->featured == 1 ? 'success' : ($item->hidden == 1 ? 'danger' : '') }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->product_details->img}}" alt=""></td>
                                        <td class="text-center">{{$item->categories->name}}</td>
                                        <td>{{$item->subcategories->name}}</td>
                                        <td>{{$item->views}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center mt-2 h6 text-danger">Không có mã giảm giá
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.loc_date_product').click(function(e) {
            e.preventDefault();

            var startdate = $(this).closest('.date_product').find('.startdate').val();
            var enddate = $(this).closest('.date_product').find('.enddate').val()

            var newUrl = window.location.origin + '/zvcx/luot-xem-san-pham/' + startdate + '/' + enddate; // lấy đường dẫn góc 


            window.location.replace(newUrl); // thây đổi lại đương đẫn 

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });



            $.ajax({
                method: "GET",
                url: "luot-xem-san-pham/" + startdate + '/' + enddate,
                data: {
                    'startdate': startdate,
                    'enddate': enddate,
                },
                success: function(response) {



                },
                error: function(response) {}
            });

        });


    })
</script>


@endsection