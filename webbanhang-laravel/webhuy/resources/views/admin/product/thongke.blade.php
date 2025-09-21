@extends('layouts.admin')

<title>Product Statistics</title>
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
  @include('partials.content-header', ['name'=>'Thống kê', 'key'=>'sản phẩm'])
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('product.index') }}" class="btn btn-success float-left m-2">Quay lại</a>
        </div>
        <div class="col-md-12">
          <form action="{{ route('product.thongke') }}" method="GET" class="form-inline">
            <div class="form-group mb-2">
              <label for="date" class="sr-only">Chọn ngày</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ request()->date }}">
            </div>
            <div class="form-group mb-2 ml-2">
              <label for="category_id" class="sr-only">Chọn danh mục</label>
              <select name="category_id" id="category_id" class="form-control">
                <option value="">Tất cả danh mục</option>
                @foreach($allCategories as $category)
                  <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2">Lọc</button>
          </form>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Danh mục</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng sản phẩm</th>
                <th scope="col">Tổng sản phẩm danh mục</th>
                <th scope="col">Thời gian thêm</th>
                <th scope="col">Thời gian update</th>
              </tr>
            </thead>
            <tbody>
              @php
                $totalCategoryProducts = 0; // Tổng sản phẩm của các danh mục con
                $totalProducts = 0; // Tổng số lượng sản phẩm của tất cả các danh mục
              @endphp
              @foreach($categories as $category)
                @php
                  $categoryProductCount = 0;
                @endphp
                @foreach($category->products as $product)
                  @php
                    $categoryProductCount += $product->quanty;
                    $totalProducts += $product->quanty; // Cộng số lượng sản phẩm của từng sản phẩm vào tổng số lượng sản phẩm của tất cả các danh mục
                  @endphp
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quanty }}</td>
                    <td></td> <!-- Chỗ này để trống vì chúng ta chỉ hiển thị tổng số lượng ở cuối -->
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                  </tr>
                @endforeach
                @if ($categoryProductCount > 0)
                  <tr>
                    <td colspan="3"><strong>Tổng {{ $category->name }}</strong></td>
                    <td>{{ $categoryProductCount }}</td>
                    <td></td> <!-- Chỗ này để trống -->
                  </tr>
                @endif
              @endforeach
              <tr>
                <td colspan="3"><strong>Tổng số lượng sản phẩm</strong></td>
                <td style="font-size: 24px">{{ $totalProducts }}</td>
                <td></td> <!-- Chỗ này để trống -->
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          {{ $products->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
