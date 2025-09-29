@extends('layouts.admin')

<title>product</title>
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
  @include('partials.content-header',['name'=>'product', 'key'=>'List'])
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Thêm</a>
        <a href="{{route('product.thongke')}}" class="btn btn-success float-left m-2">Thống kê</a>
</div>
          <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Thời gian thêm</th>
                <th scope="col">Thời gian update</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $productItem)
              <tr>
                <th scope="row">{{$productItem->id}}</th>
                <td>{{$productItem->name}}</td>
                <td>{{number_format($productItem->price)}}</td>
                <td>{{($productItem->quanty)}}</td>
                <td>
                    @if($productItem->feature_image_path)
                        <img class="product_image_150_100" src="{{ asset($productItem->feature_image_path) }}" alt="{{ $productItem->name }}" style="width: 100px; height: 80px; object-fit: cover;">
                    @else
                        <div class="no-image" style="width: 100px; height: 80px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 12px;">No Image</div>
                    @endif
                </td>
                <td>{{optional($productItem->category)->name}}</td>
                <td>{{ ($productItem->created_at)}}
                <td>{{($productItem->updated_at)}}</td>
                <td>
                <a href="{{route('product.edit', ['id'=>$productItem->id])}}" class="btn btn-default">Sửa</a>
                <a href=""
                data-url="{{route('product.delete', ['id' =>$productItem->id])}}"
                class="btn btn-default action_delete">Xóa</a>

            </td>
              </tr>
          @endforeach
            </tbody>
            </table>
          </div>
          <div class="col-md-12">
          {{ $products->links('pagination::bootstrap-4') }}
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
