@extends('ctag.master')
@section('content')
    <style>
        .card-header:hover button {
            text-decoration: none;
        }
    </style>

    <style>
        /*Background color*/
        #grad1 {
            /* background-color: : #9C27B0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    background-image: linear-gradient(120deg, #FF4081, #81D4FA); */
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 100%;
            margin: 0 3% 20px 3%;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;

            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E;
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0;
        }

        /*Blue Buttons*/
        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
        }

        /*Previous Buttons*/
        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
        }

        /*Dropdown List Exp Date*/
        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px;
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue;
        }

        /*The background card*/
        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative;
        }

        /*FieldSet headings*/
        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
        }

        #progressbar .active {
            color: #000000;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative;
        }

        /*Icons in the ProgressBar*/
        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023";
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007";
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d";
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        /*ProgressBar before any progress*/
        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue;
        }

        /*Imaged Radio Buttons*/
        .radio-group {
            position: relative;
            margin-bottom: 25px;
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px;
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
        }

        /*Fit image in bootstrap div*/
        .fit-image {
            width: 100%;
            object-fit: cover;
        }
    </style>

    <style>
        .container-table100 {
            width: 100%;
            min-height: 100vh;
            background: #c850c0;
            background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
            background: -o-linear-gradient(45deg, #4158d0, #c850c0);
            background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
            background: linear-gradient(45deg, #4158d0, #c850c0);
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 33px 30px
        }

        .wrap-table100 {
            width: 1170px
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative
        }

        table * {
            position: relative
        }

        table td,
        table th {
            padding-left: 8px
        }

        table thead tr {
            height: 60px;
            background: #0E8CE4
        }

        table tbody tr {
            height: 50px
        }

        table tbody tr:last-child {
            border: 0
        }

        table td,
        table th {
            text-align: left
        }

        table td.l,
        table th.l {
            text-align: right
        }

        table td.c,
        table th.c {
            text-align: center
        }

        table td.r,
        table th.r {
            text-align: center
        }

        .table100-head th {
            /* font-family: 'Lato', helvetica, arial, sans-serif; */
            ;
            font-size: 16.5px;
            color: #fff;
            line-height: 1.2;
            font-weight: unset
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5
        }

        tbody tr {
            font-family: 'Lato', helvetica, arial, sans-serif;
            ;
            font-size: 13.5px;
            color: gray;
            line-height: 1.2;
            font-weight: unset
        }


        table tbody tr:hover {
            color: white;
            background-color: #0E8CE4;
            cursor: pointer
        }

        .column1 {
            width: 10%;
            /* padding-left: 10px */
        }

        .column2 {
            width: 15%
        }

        .column3 {
            width: 30%
        }

        .column4 {
            width: 10%;
        }

        .column5 {
            width: 10%;
        }

        .column6 {
            width: 10%;
            /* padding-right: 62px */
        }

        @media screen and (max-width:992px) {
            table {
                display: block
            }

            table>*,
            table tr,
            table td,
            table th {
                display: block
            }

            table thead {
                display: none
            }

            table tbody tr {
                height: auto;
                padding: 20px 5px
            }

            table tbody tr td {
                padding-left: 40% !important;
                margin-bottom: 10px
            }

            table tbody tr td:last-child {
                margin-bottom: 0
            }

            table tbody tr td:before {
                font-size: 14px;
                color: #999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                width: 40%;
                left: 30px;
                top: 0
            }

            table tbody tr td:nth-child(1),
            table tbody tr td:nth-child(2),
            table tbody tr td:nth-child(3),
            table tbody tr td:nth-child(4),
            table tbody tr td:nth-child(5),
            table tbody tr td:nth-child(6),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(1),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(2),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(3),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(4),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(5),
            table .tableOrder>tbody>tr .trOrder>td .tdOrder:nth-child(6) {
                padding-left: 20px;
            }

            table tbody tr td:nth-child(1):before,
            table tbody tr td:nth-child(2):before,
            table tbody tr td:nth-child(3):before,
            table tbody tr td:nth-child(4):before,
            table tbody tr td:nth-child(5):before,
            table tbody tr td:nth-child(6):before {
                position: absolute;
                left: 5px;
            }

            .tableOrder2 tbody .trOrder2 .tdOrder2:nth-child(1):before {
                content: "Tên"
            }

            .tableOrder2 tbody .trOrder2 .tdOrder2:nth-child(2):before {
                content: "Số lượng"
            }

            .tableOrder2 tbody .trOrder2 .tdOrder2:nth-child(3):before {
                content: "Giá"
            }

            .tableOrder2 tbody .trOrder2 .tdOrder2:nth-child(4):before {
                content: "Tổng cộng"
            }




            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(1):before {
                content: "Họ và tên"
            }

            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(2):before {
                content: "Số điện thoại"
            }

            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(3):before {
                content: "Địa chỉ"
            }

            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(4):before {
                content: "Ngày đặt"
            }

            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(5):before {
                content: "Trạng thái"
            }

            .tableOrder1 tbody .trOrder1 .tdOrder1:nth-child(6):before {
                content: "Chi tiết đơn"
            }


            .tableOrder tbody .trOrder .tdOrder:nth-child(1):before {
                content: "Tên"
            }

            .tableOrder tbody .trOrder .tdOrder:nth-child(2):before {
                content: "Số lượng"
            }

            .tableOrder tbody .trOrder .tdOrder:nth-child(3):before {
                content: "Giá"
            }

            .tableOrder tbody .trOrder .tdOrder:nth-child(4):before {
                content: "Tổng cộng"
            }

            .tableOrder tbody .trOrder .tdOrder:nth-child(5):before {
                content: "Trạng thái"
            }

            .tableOrder tbody .trOrder .tdOrder:nth-child(6):before {
                content: "Chi tiết đơn"
            }

            .column4,
            .column5,
            .column6 {
                text-align: left
            }

            .column4,
            .column5,
            .column6,
            .column1,
            .column2,
            .column3 {
                width: 100%
            }

            tbody tr {
                font-size: 14px
            }

            table tbody tr:hover {
                color: #999;
                background-color: #ddddddc6;
                cursor: pointer
            }
        }

        /* @media(max-width:576px) {
                                                                                                                                                                                        .container-table100 {
                                                                                                                                                                                            padding-left: 15px;
                                                                                                                                                                                            padding-right: 15px
                                                                                                                                                                                        }
                                                                                                                                                                                    } */
    </style>
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        {{-- <div class="cart_title">Thông tin khách hàng</div> --}}

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-center text-dark"
                                            type="button" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Thông tin tài khoản</strong>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="form_account" action="" method="">
                                            @csrf
                                            {{-- @method("PUT") --}}
                                            <div class="form-group row">
                                                <div class="form-group col-lg-6 col-md-12 m-0 pb-2 fullname">
                                                    <label for="exampleInputEmail1">Họ và tên</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $data->content->account->name }}">
                                                    <small id="emailHelp" class="form-text text-muted">Những cái tên xinh
                                                        đẹp thường được đặt vào đây.</small>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 m-0">
                                                    <label for="exampleInputEmail1">Địa chỉ Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $data->content->account->email }}">
                                                    <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không
                                                        bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-lg-6 col-md-12 m-0 pb-2">
                                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        value="{{ $data->content->account->phone }}">
                                                    <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ gọi cho
                                                        bạn khi bạn cần.</small>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 m-0">
                                                    <label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
                                                    <input type="address" class="form-control" name="address"
                                                        value="{{ $data->content->account->address ?? '' }}">
                                                    <small id="emailHelp" class="form-text text-muted">Nơi mà những đơn hàng
                                                        được trao tay.</small>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row pt-2">
                                                <p class="col-12 text-center">CẬP NHẬT MẬT KHẨU</p>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-lg-6 col-md-12 pb-2 m-0">
                                                    <label for="exampleInputPassword1">Mật khẩu cũ</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        name="password">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12 m-0">
                                                    <label for="exampleInputPassword1">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        name="passwordUpdate">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary col-12 mb-2 account_btn">Cập
                                                nhật</button>


                                            <script>
                                                let $formAccount = $('.form_account');
                                                let $accountBtn = $('.account_btn');

                                                $accountBtn.on('click', function(e) {
                                                    e.preventDefault(); // Prevent default form submission

                                                    // Collect form data
                                                    let formData = {
                                                        name: $('input[name="name"]', $formAccount).val(),
                                                        email: $('input[name="email"]', $formAccount).val(),
                                                        phone: $('input[name="phone"]', $formAccount).val(),
                                                        address: $('input[name="address"]', $formAccount).val(),
                                                        password: $('input[name="password"]', $formAccount).val(),
                                                        passwordUpdate: $('input[name="passwordUpdate"]', $formAccount).val()
                                                    };

                                                    // Send AJAX request to update account
                                                    $.ajax({
                                                        url: 'khach-hang/update/account',
                                                        type: 'POST',
                                                        data: formData,
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        },
                                                        success: function(response) {
                                                            createToast(response['status'], response['message']);
                                                        },
                                                        error: function(error) {
                                                            createToast(response['status'], response['message']);

                                                            // Handle update error
                                                            console.error('Error updating account:', error);
                                                            // You can add additional logic here, such as displaying an error message
                                                        }
                                                    });
                                                });
                                            </script>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark text-center collapsed"
                                            type="button" data-toggle="collapse" data-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <strong>Thanh toán đơn hàng</strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    @if (!empty($data->content->cart))
                                        <div class="card-body px-0">

                                            <!-- MultiStep Form -->
                                            <div class="container-fluid" id="grad1">
                                                <div class="row justify-content-center mt-0">
                                                    <div
                                                        class="col-lg-12 col-12 col-sm-12 col-md-12 text-center p-0 mt-3 mb-2">
                                                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                                            <h2><strong>Các bước thanh toán đơn hàng</strong></h2>
                                                            <p>Điền vào tất cả các trường biểu mẫu để chuyển sang bước tiếp
                                                                theo
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-12 mx-0">
                                                                    <form id="msform" class="form_order">
                                                                        <!-- progressbar -->
                                                                        <ul id="progressbar">
                                                                            <li class="active" id="account">
                                                                                <strong>Thông tin</strong>
                                                                            </li>
                                                                            <li id="personal"><strong>Đơn hàng</strong>
                                                                            </li>
                                                                            <li id="payment"><strong>Thanh toán</strong>
                                                                            </li>
                                                                            <li id="confirm"><strong>Thành công</strong>
                                                                            </li>
                                                                        </ul>
                                                                        <!-- fieldsets -->
                                                                        <fieldset>
                                                                            <div class="form-card px-1">
                                                                                <h4 class="fs-title text-center">Thông tin
                                                                                    tài
                                                                                    khoản</h4>
                                                                                <input class="text-center" type="email"
                                                                                    name="email"
                                                                                    value="{{ $data->content->account->email }}"
                                                                                    placeholder="Địa chỉ Email" />
                                                                                <input class="text-center" type="text"
                                                                                    name="name"
                                                                                    value="{{ $data->content->account->name }}"
                                                                                    placeholder="Họ và tên" />
                                                                                <input class="text-center" type="tel"
                                                                                    name="phone"
                                                                                    value="{{ $data->content->account->phone }}"
                                                                                    placeholder="Số điện thoại" />
                                                                                <input class="text-center" type="address"
                                                                                    name="address"
                                                                                    placeholder="Địa chỉ nhận hàng"
                                                                                    value="{{ $data->content->account->address ?? '' }}" />
                                                                            </div>
                                                                            <input type="button" name="next"
                                                                                class="nextInfor action-button"
                                                                                value="Tiếp tục" />
                                                                        </fieldset>
                                                                        <fieldset>
                                                                            <div class="form-card px-1">
                                                                                <h4 class="fs-title text-center">Thông tin
                                                                                    đơn
                                                                                    hàng</h4>


                                                                                <div class="section-gap col-12 p-0 containerTableOrder"
                                                                                    style="overflow-x: auto;">

                                                                                    <table class="tableOrder"
                                                                                        style="min-width: 100%;">
                                                                                        <thead class="theadOrder">
                                                                                            <tr
                                                                                                class="table100-head trOrder">
                                                                                                <th
                                                                                                    class="text-center column1 thOrder">
                                                                                                    Tên</th>
                                                                                                <th
                                                                                                    class="text-center column2 thOrder">
                                                                                                    Số lượng</th>
                                                                                                <th
                                                                                                    class="text-center column3 thOrder">
                                                                                                    Giá</th>
                                                                                                <th
                                                                                                    class="text-center column4 thOrder">
                                                                                                    Tổng cộng</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="">
                                                                                            @php
                                                                                                $total = 0;
                                                                                            @endphp

                                                                                            @foreach ($data->content->cart as $key => $item)
                                                                                                <tr class="trOrder">
                                                                                                    <td
                                                                                                        class="text-center tdOrder">
                                                                                                        {{ $item->name }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center tdOrder">
                                                                                                        {{ $item->amount }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center tdOrder">
                                                                                                        {{ number_format($item->product_details->discount == 0 ? $item->product_details->price : $item->product_details->discount, 0, ',', ',') }}<sup>đ</sup>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-center tdOrder">
                                                                                                        {{ number_format($item->product_details->discount == 0 ? $item->product_details->price : $item->product_details->discount * $item->amount, 0, ',', ',') }}<sup>đ</sup>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @php
                                                                                                    $total +=
                                                                                                        $item
                                                                                                            ->product_details
                                                                                                            ->discount ==
                                                                                                        0
                                                                                                            ? $item
                                                                                                                ->product_details
                                                                                                                ->price
                                                                                                            : $item
                                                                                                                    ->product_details
                                                                                                                    ->discount *
                                                                                                                $item->amount;
                                                                                                @endphp
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-12 row">
                                                                                    <div class="col-lg-6 col-md-12 text-center pt-2">

                                                                                            Tổng thanh toán:
                                                                                            <strong>
                                                                                                {{ number_format($total, 0, ',', ',') }}<sup>đ</sup>
                                                                                            </strong>
                                                                                    </div>
                                                                                    <div class="col-lg-6 col-md-12 text-center">

                                                                                            <a class="cart_item_text text-info"
                                                                                                href="{{ route('cart') }}">Cập
                                                                                                nhật đơn hàng</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <input type="button" name="previous"
                                                                                class="previous action-button-previous"
                                                                                value="Trở lại" />
                                                                            <input type="button" name="next"
                                                                                class="next action-button"
                                                                                value="Tiếp tục" />
                                                                        </fieldset>
                                                                        <fieldset>
                                                                            <div class="form-card px-1">
                                                                                <h2 class="fs-title text-center">Xác nhận
                                                                                    thanh
                                                                                    toán
                                                                                </h2>

                                                                                <label
                                                                                    class="col-12 pay text-center">Phương
                                                                                    thức thanh
                                                                                    toán</label>
                                                                                <select
                                                                                    class="form-control text-center col-12 mx-0"
                                                                                    id="">
                                                                                    <option>
                                                                                        --- Thanh toán khi nhận hàng ---
                                                                                    </option>
                                                                                </select>

                                                                                <div class="row py-3">
                                                                                    <div class="col-lg-9 col-md-12">
                                                                                        <label class="pay">
                                                                                            Nhập mã giảm giá (nếu có)
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="code" name="code"
                                                                                            placeholder="Mã giảm giá % trên tổng đơn hàng" />
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-12">
                                                                                        <label class="percent">Được giảm
                                                                                            (%)</label>
                                                                                        <input type="text"
                                                                                            class="percent" name="cvcpwd"
                                                                                            placeholder="-0%" disabled />
                                                                                    </div>
                                                                                    <small
                                                                                        class="col-12 form-text text-muted text-center">Theo
                                                                                        dõi livestream hoặc xem tin tức
                                                                                        của chúng tôi để săn voucher bạn
                                                                                        nhé...!</small>
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <label class="col-12 text-center">
                                                                                        Thanh toán
                                                                                    </label>
                                                                                    <h2
                                                                                        class="col-12 text-center total px-0">
                                                                                        {{ number_format($total, 0, ',', ',') }}<sup>đ</sup>
                                                                                    </h2>
                                                                                </div>

                                                                                <div class="">
                                                                                    <label class="col-12 text-center">
                                                                                        Ghi chú đơn hàng
                                                                                    </label>
                                                                                    <textarea class="text-center" id="" cols="30" rows="1"
                                                                                        placeholder="Bạn có muốn nói với chúng tôi điều gì không?" name="note"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <input type="button" name="previous"
                                                                                class="previous action-button-previous"
                                                                                value="Trở lại" />
                                                                            <input type="button" name="make_payment"
                                                                                class="nextOrder action-button"
                                                                                value="Xác nhận" />
                                                                        </fieldset>
                                                                        <fieldset>
                                                                            <div class="form-card">
                                                                                <h2 class="fs-title text-center">Đặt hàng
                                                                                    thành
                                                                                    công!</h2>
                                                                                <br><br>
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-3">
                                                                                        <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                                                            class="fit-image">
                                                                                    </div>
                                                                                </div>
                                                                                <br><br>
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-7 text-center">
                                                                                        <h4>Chúng tôi sẽ phê duyệt ngay, để
                                                                                            theo
                                                                                            dõi đơn hàng hãy click vào mục
                                                                                            Trạng
                                                                                            thái đơn hàng. Xin cảm ơn</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {

                                                    var current_fs, next_fs, previous_fs; //fieldsets
                                                    var opacity;

                                                    var formOrderInforData = {};

                                                    function formatNumberWithCommas(number) {
                                                        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '<sup>đ</sup>';
                                                    }

                                                    $(".code").on("change", function(e) {
                                                        let total = {{ $total }};
                                                        let code = $(e.target).val();
                                                        if (code != "") {
                                                            $.ajax({
                                                                url: 'khach-hang/check/voucher',
                                                                method: 'POST',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                },
                                                                data: {
                                                                    code: code,
                                                                },
                                                                dataType: 'json',
                                                                success: function(response) {
                                                                    // console.log(response);
                                                                    createToast(response['status'], response['message']);
                                                                    $(".percent").val('-' + response['data'] + '%');
                                                                    $('.total').html('<small><del>' + formatNumberWithCommas(total) +
                                                                        '</del></small> ' + formatNumberWithCommas(total - (total *
                                                                            response[
                                                                                'data'] / 100)));
                                                                    formOrderInforData['code'] = code;

                                                                    if (response['status'] == 'info') {
                                                                        if (formOrderInforData.hasOwnProperty('code')) {
                                                                            delete formOrderInforData['code'];
                                                                        }
                                                                        $('.total').html(formatNumberWithCommas(total));
                                                                    }
                                                                },
                                                                error: function(error) {
                                                                    // Handle update error
                                                                    console.error('Error updating account:', error);
                                                                    // You can add additional logic here, such as displaying an error message
                                                                }
                                                            });
                                                        }

                                                    })


                                                    $(".nextInfor").click(function() {
                                                        let checkInfor = true;

                                                        let formOrder = $('.form_order');
                                                        let formOrderInfor = {
                                                            name: $('input[name="name"]', formOrder),
                                                            email: $('input[name="email"]', formOrder),
                                                            phone: $('input[name="phone"]', formOrder),
                                                            address: $('input[name="address"]', formOrder),
                                                        };


                                                        for (let key in formOrderInfor) {
                                                            if (formOrderInfor[key].val() == '') {
                                                                createToast('warning', 'Vui lòng điền ' + formOrderInfor[key].attr('placeholder'));
                                                                checkInfor = false;
                                                                break;
                                                            }
                                                        }

                                                        if (checkInfor == true) {
                                                            for (let key in formOrderInfor) {

                                                                formOrderInforData[key] = formOrderInfor[key].val();
                                                                next($(this));
                                                            }
                                                        }
                                                    });

                                                    $(".next").click(function() {
                                                        next($(this));
                                                    });

                                                    $(".nextOrder").click(function() {
                                                        let checkOrder = true;

                                                        let formOrder = $('.form_order');

                                                        let formOrderPay = {};

                                                        if ($('textarea[name="note"]', formOrder).val() != "") {
                                                            formOrderPay = {
                                                                note: $('textarea[name="note"]', formOrder).val(),
                                                            };
                                                        }

                                                        const formOrderPayData = Object.assign(formOrderInforData, formOrderPay);

                                                        $.ajax({
                                                            url: 'khach-hang/order/',
                                                            method: 'POST',
                                                            headers: {
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            },
                                                            data: formOrderPayData,
                                                            dataType: 'json',
                                                            success: function(response) {
                                                                console.log(response);
                                                                if (response['status'] != 'success') {
                                                                    createToast(response['status'], response['message']);
                                                                    checkOrder = false;
                                                                } else {
                                                                    createToast(response['status'], response['message']);
                                                                }
                                                            },
                                                            error: function(error) {
                                                                // Handle update error
                                                                console.error('Error updating account:', error);
                                                                // You can add additional logic here, such as displaying an error message
                                                            }
                                                        });

                                                        if (checkOrder == true) {
                                                            next($(this));
                                                            fetchData();
                                                        }
                                                    });

                                                    function next(e) {
                                                        current_fs = e.parent();
                                                        next_fs = e.parent().next();

                                                        //Add Class Active
                                                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                                                        //show the next fieldset
                                                        next_fs.show();
                                                        //hide the current fieldset with style
                                                        current_fs.animate({
                                                            opacity: 0
                                                        }, {
                                                            step: function(now) {
                                                                // for making fielset appear animation
                                                                opacity = 1 - now;

                                                                current_fs.css({
                                                                    'display': 'none',
                                                                    'position': 'relative'
                                                                });
                                                                next_fs.css({
                                                                    'opacity': opacity
                                                                });
                                                            },
                                                            duration: 600
                                                        });
                                                    };

                                                    $(".previous").click(function() {

                                                        current_fs = $(this).parent();
                                                        previous_fs = $(this).parent().prev();

                                                        //Remove class active
                                                        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                                                        //show the previous fieldset
                                                        previous_fs.show();

                                                        //hide the current fieldset with style
                                                        current_fs.animate({
                                                            opacity: 0
                                                        }, {
                                                            step: function(now) {
                                                                // for making fielset appear animation
                                                                opacity = 1 - now;

                                                                current_fs.css({
                                                                    'display': 'none',
                                                                    'position': 'relative'
                                                                });
                                                                previous_fs.css({
                                                                    'opacity': opacity
                                                                });
                                                            },
                                                            duration: 5000
                                                        });
                                                    });

                                                    $('.radio-group .radio').click(function() {
                                                        $(this).parent().find('.radio').removeClass('selected');
                                                        $(this).addClass('selected');
                                                    });

                                                    $(".submit").click(function() {
                                                        return false;
                                                    })

                                                });
                                            </script>
                                        </div>
                                    @else
                                        <div class="alert alert-warning text-center" role="alert">
                                            Đơn hàng rỗng, xin mời quay lại đặt hàng...!
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-center text-dark collapsed"
                                            type="button" data-toggle="collapse" data-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <strong>Trạng thái đơn hàng</strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse orderStatus" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="section-gap col-12 p-0" style="overflow-x: auto;">
                                                <table class="tableOrder1" style="min-width: 100%;">
                                                    <thead>
                                                        <tr class="table100-head trOrder1">
                                                            <th class="column1 thOrder1">Họ và tên</th>
                                                            <th class="column2 thOrder1">Số điện thoại</th>
                                                            <th class="column3 thOrder1">Địa chỉ</th>
                                                            <th class="column4 thOrder1">Ngày đặt</th>
                                                            <th class="column5 thOrder1">Trạng thái</th>
                                                            <th class="column6 thOrder1">Chi tiết đơn</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbodyOrder1">
                                                        <tr class="trOrder1">
                                                            <td class="tdOrder2"></td>
                                                            <td class="tdOrder2"></td>
                                                            <td class="tdOrder2"></td>
                                                            <td class="tdOrder2"></td>
                                                            <td class="tdOrder2"></td>
                                                            <td class="tdOrder2">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal" data-target="#exampleModalLong">
                                                                    Xem
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function fetchData() {
                                        $.get('khach-hang/order/' + '{{ Auth::user()->id }}')
                                            .done(function(data) {
                                                console.log(data);
                                                renderData(data);
                                                renderModalOrders(data);
                                                return data;
                                            })
                                            .fail(function(jqXHR, textStatus, errorThrown) {
                                                console.error(errorThrown);
                                            })
                                        // .always(function() {
                                        //     setTimeout(fetchData, 5000);
                                        // });
                                    }

                                    // Gọi lần đầu tiên
                                    fetchData();

                                    function translateOrderStatus(status) {
                                        if (status == 'pending') {
                                            flagStatus = true;
                                            return $('<td class="text-secondary">').text('Chờ xử lý');

                                        } else if (status == 'processing') {
                                            return $('<td class="text-secondary">').text('Đang xử lý');
                                        } else if (status == 'shipped') {
                                            return $('<td class="text-primary">').text('Đang vận chuyển');
                                        } else if (status == 'cancelled') {
                                            return $('<td class="text-danger">').text('Đã hủy bỏ');
                                        } else if (status == 'completed') {
                                            return $('<td class="text-success">').text('Đã hoàn thành');
                                        }
                                    }

                                    function renderData(data) {
                                        $('.tbodyOrder1').empty();
                                        $.each(data, function(index, order) {
                                            let row = $('<tr>').addClass('trOrder1');
                                            row.data('order_id', order.id);
                                            row.data('area', order);

                                            let nameCell = $('<td>').text(order.name).addClass('tdOrder1');
                                            let phoneCell = $('<td>').text(order.phone).addClass('tdOrder1');
                                            let addressCell = $('<td>').text(order.address).addClass('tdOrder1');
                                            let createdAtCell = $('<td>').text(order.created_at.split('T')[0]).addClass('tdOrder1');
                                            let statusCell = translateOrderStatus(order.status).addClass('tdOrder1');

                                            let actionCell = $('<td>').addClass('tdOrder1');
                                            actionCell.append(
                                                `<button type="button" class="btn btn-primary view-order-btn" data-toggle="modal" data-target="#${order.id}" value="${order.id}">Xem</button>`
                                            );

                                            row.append(nameCell, phoneCell, addressCell, createdAtCell, statusCell, actionCell);
                                            $('.tbodyOrder1').append(row);
                                        });
                                    }

                                    function formatNumberWithCommas(number) {
                                        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '<sup>đ</sup>';
                                    }

                                    function renderTableRows(order) {
                                        let rows = '';
                                        let total = 0;
                                        $.each(order.order_item, function(index, item) {
                                            let price = item.detail.discount > 0 ? item.detail.discount : item.detail.price;
                                            rows += `
                                                <tr class="trOrder2">
                                                    <td class="tdOrder2">${item.name}</td>
                                                    <td class="tdOrder2">${item.amount}</td>
                                                    <td class="tdOrder2">${formatNumberWithCommas(price)}</td>
                                                    <td class="tdOrder2">${formatNumberWithCommas(price * item.amount)}</td>
                                                </tr>
                                                `;
                                            total += price * item.amount;
                                        });

                                        if (order.voucher != null) {
                                            rows += `<p class="col-12 text-center">
                                                Tổng thanh toán: <del>${formatNumberWithCommas(total)}</del> => ${formatNumberWithCommas(total - (total * order.voucher.percent / 100))} </br>
                                                                    Voucher: ${order.voucher.code}, đã giảm ${order.voucher.percent}% trên tổng giá trị đơn hàng
                                                                </p>`;
                                        } else {
                                            rows += `<p class="col-12 text-center">
                                                Tổng thanh toán: ${formatNumberWithCommas(total)}
                                                                </p>`;

                                        }
                                        return rows;
                                    }

                                    function renderModalOrders(order) {
                                        $.each(order, function(index, order) {
                                            let modalOrder = `
                                                <div class="modal fade modalOrder" id="${order.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <table class="tableOrder2" style="min-width: 100%;">
                                                            <thead class="theadOder2">
                                                            <tr class="table100-head trOrder2">
                                                                <th class="column3 thOrder2">Tên</th>
                                                                <th class="column2 thOrder2">Số lượng</th>
                                                                <th class="column1 thOrder2">Giá</th>
                                                                <th class="column4 thOrder2">Tổng cộng</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="tbodyOrder2">
                                                            ${renderTableRows(order)}
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            `;

                                            // <small class="text-secondary">Đơn chỉ được hủy đơn khi ở trạng thái Chờ xử lý</small>
                                            // <button type="button" class="btn btn-danger destroyOrder" ${order.status == 'pending' ? '' : 'disabled'} value="${order.id}">Hủy đơn</button>

                                            $('body').append(modalOrder);

                                            // Gắn sự kiện click vào nút "Hủy đơn"
                                            $('.destroyOrder').click(function(e) {

                                                // Kiểm tra trạng thái của đơn hàng
                                                let target = $(e.target);
                                                let orderId = target.val();
                                                console.log(orderId);
                                                return false;
                                                // if (target.prop('disabled')) {
                                                //     // Nếu đơn hàng không ở trạng thái 'pending', không làm gì cả
                                                //     return;
                                                // }

                                                // Thực hiện hủy đơn hàng
                                                // $.ajax({
                                                //     url: '/khach-hang/order/delete/' + orderId,
                                                //     type: 'POST',
                                                //     success: function(response) {
                                                //         // Xử lý kết quả hủy đơn hàng thành công
                                                //         // console.log('Đã hủy đơn hàng:', orderId);
                                                //         console.log(response);
                                                //         // Ẩn hoặc vô hiệu hóa nút
                                                //         $element.hide();
                                                //     },
                                                //     error: function(xhr, status, error) {
                                                //         // Xử lý lỗi khi hủy đơn hàng
                                                //         console.error('Lỗi khi hủy đơn hàng:', error);
                                                //     }
                                                // });
                                            });
                                        });
                                    }
                                </script>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="images/send.png" alt></div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text">
                                    <p>...and receive %20 coupon for first shopping.</p>
                                </div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required"
                                        placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                                <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>














        <div class="modal fade modalOrder" id="order.id" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="tableOrder2" style="min-width: 100%;">
                            <thead>
                                <tr class="table100-head trOrder2">
                                    <th class="column1 thOrder2">Tên</th>
                                    <th class="column2 thOrder2">Số lượng</th>
                                    <th class="column3 thOrder2">Giá</th>
                                    <th class="column4 thOrder2">Tổng cộng</th>
                                    <th class="column5 thOrder2">Trạng thái</th>
                                    {{-- <th class="column6">Hủy đơn</th> --}}
                                </tr>
                            </thead>
                            <tbody class="tbodyOrder2">
                                <tr class="trOrder2">
                                    <td class="tdOrder2"></td>
                                    <td class="tdOrder2"></td>
                                    <td class="tdOrder2"></td>
                                    <td class="tdOrder2"></td>
                                    <td class="tdOrder2"></td>
                                    <td class="tdOrder2">
                                        <button type="button" class="btn btn-primary">
                                            Hủy
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
