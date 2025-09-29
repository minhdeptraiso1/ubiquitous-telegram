@extends('layouts.admin')

@section('title')

@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css')}}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{ asset('admins/order/order.js')}}"></script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Order', 'key' => 'List'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('order.thongkedonhang')}}" class="btn btn-success float-left m-2">Thống kê</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng giá</th>
                                <th>Trạng thái</th>
                                <th>Thanh toán</th>
                                <th>Thời gian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <ul>
                                        @foreach($order->orderItems as $orderItem)
                                        @if($orderItem->product && $orderItem->product->feature_image_path)
                                            <img class="product_order_image_150_100" src="{{ asset($orderItem->product->feature_image_path) }}" alt="{{ $orderItem->product->name }}" style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <img class="product_order_image_150_100" src="{{ asset('images/no-image.jpg') }}" alt="No image" style="width: 80px; height: 60px; object-fit: cover;">
                                        @endif
                                        <li>Tên: {{ $orderItem->product ? $orderItem->product->name : 'Sản phẩm không tồn tại' }}</li>
                                        <li>Số lượng: {{ $orderItem->quanty }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->phone }}</td>
                                <td>{{ $order->customer->address }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('order.status', ['id' => $order->id]) }}" class="btn btn-info">Trạng thái</a>
                                    <a href="" 
                                        data-url="{{ route('order.delete', ['id' => $order->id]) }}" 
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
