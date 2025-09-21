@extends('layouts.admin')

<title>Order Statistics</title>
@section('title')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css')}}">
@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{ asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')
<div class="content-wrapper">
  @include('partials.content-header', ['name'=>'Thống kê', 'key'=>'đơn hàng'])
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('order.order') }}" class="btn btn-success float-left m-2">Quay lại</a>
        </div>
        <div class="col-md-12">
          <form action="{{ route('order.thongkedonhang') }}" method="GET" class="form-inline">
            <div class="form-group mb-2">
              <label for="date" class="sr-only">Chọn ngày</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2">Thống kê</button>
          </form>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tổng đơn hàng</th>
                <th scope="col">Số lượng đơn hàng đã thanh toán</th>
                <th scope="col">Số lượng đơn hàng chưa thanh toán</th>
                <th scope="col">Tổng số tiền thu được</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $totalOrders }}</td>
                <td>{{ $paidOrders }}</td>
                <td>{{ $unpaidOrders }}</td>
                <td>{{ number_format($totalRevenue, 0, ',', '.') }} VND</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
