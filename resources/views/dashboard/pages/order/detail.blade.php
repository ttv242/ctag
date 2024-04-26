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
                            Chi tiết đơn hàng
                        </h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}"><i class="fa fa-dashboard"></i></a>
                            </li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Đơn hàng</li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix pb-2">
                            <div class="col-lg-8 col-md-12">
                                <h5>{{ $order->name }} <small>&nbsp; | &nbsp; Nickname : {{ $order->users->name }}</small>
                                </h5>
                                <p class="mb-0"><b>Số điện thoại :</b> {{ $order->phone }}</p>
                                <p class="mb-0"><b>Email :</b> {{ $order->email }}</p>
                                <p><b>Địa chỉ :</b> {{ $order->address }}</p>
                            </div>
                            @if($order->status == 'cancelled' || $order->status == 'completed')
                            <div class="col-lg-4 col-md-12 text-right">
                                <button class="btn bg-{{ $order->status == 'completed' ? 'success' : 'danger' }} text-light" disabled>{{ $order->status }}</button>
                            </div>
                            @elseif($order->status=='pending')
                            <div class="col-lg-4 col-md-12 text-right">
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/cancelled" class="btn bg-danger text-light">Hủy đơn</a>
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/{{ $order->status }}" class="btn bg-secondary text-light">Duyệt đơn</a>
                            </div>
                            @elseif($order->status=='processing')
                            <div class="col-lg-4 col-md-12 text-right">
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/cancelled" class="btn bg-danger text-light">Hủy đơn</a>
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/{{ $order->status }}" class="btn bg-secondary text-light">Vận chuyển</a>
                            </div>
                            @elseif($order->status=='shipped')
                            <div class="col-lg-4 col-md-12 text-right">
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/cancelled" class="btn bg-danger text-light">Hủy đơn</a>
                                <a href="{{ route('dashboard.order.update') }}/{{ $order->id }}/{{ $order->status }}" class="btn bg-secondary text-light">Đã hoàn thành</a>
                            </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-right">Số lượng</th>
                                        <th class="text-right">Giá</th>
                                        <th class="text-right">Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($orderItem as $item)
                                        @php
                                            $price = $item->products->product_details->discount
                                                ? $item->products->product_details->discount
                                                : $item->products->product_details->price;
                                            $amount = $item->amount;
                                            $total += $price * $amount;
                                            $voucherCode = $item->order->voucher->code ?? 'Không';
                                            $voucherPercent = $item->order->voucher->percent ?? 0;
                                            if (!empty($item->order->voucher->code)) {
                                                $discount =
                                                    $total - ($total * $item->order->voucher->percent) / 100;
                                            }
                                        @endphp
                                    <tr>
                                        <td class="col-md-4">{{ $item->products->name }}</td>
                                        <td class="col-md-2 text-right"> {{ $amount }}</td>
                                        <td class="col-md-4 text-right"> {{ number_format($price, 0, ',', ',') }}<sup>đ</sup></td>
                                        <td class="col-md-2 text-right"> {{ number_format($price * $amount, 0, ',', ',') }}<sup>đ</sup></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right" colspan="2">
                                            <div class="row clearfix">
                                                <div class="col-lg-8 col-md-12">
                                                    <p class="mb-0"><b>Ngày đặt hàng :</b> {{ $order->created_at }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <p>Voucher:</p>
                                            <p>% giảm:</p>
                                            <p>Tổng thanh toán:</p>
                                        </td>
                                        <td class="text-right">
                                            <p><strong>{{ $voucherCode }}</strong></p>
                                            <p><strong>{{ $voucherPercent }}%</strong></p>
                                            <p><strong> {!! empty($discount)
                                                ? number_format($total, 0, ',', ',') . '<sup>đ</sup>'
                                                : '<del>' . number_format($total, 0, ',', ',') . '<sup>đ</sup>' . '</del> ' . number_format($discount, 0, ',', ',') . '<sup>đ</sup>' !!}</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">
                                            <h6><strong>Ghi chú đơn hàng</strong></h6>
                                        </td>
                                        <td class="text-danger text-right" colspan="3" rowspan="3">
                                            <p class="col-12 px-1 text-info" style="text-align:justify; word-break: overflow; white-space: normal;">{{ $order->note }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
