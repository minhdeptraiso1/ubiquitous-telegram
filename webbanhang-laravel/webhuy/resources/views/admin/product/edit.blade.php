@extends('layouts.admin')

@section('title')
@endsection

@section('content')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

<div class="content-wrapper">
@include('partials.content-header', ['name'=>'product', 'key'=>'them'])
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-6">

              <form action="{{route('product.update', ['id'=> $product ->id])}}" method="post" enctype="multipart/form-data">
              @csrf
    <div class="form-group">
      <label>Tên Sản phẩm</label>
      <input type="text" class="form-control" name="name"
              placeholder="Nhập tên Sản phẩm" 
              value="{{ $product->name}}"
              >
      
    </div>

    <div class="form-group">
      <label>Giá sản phẩm</label>
      <input type="text" class="form-control" name="price"
              placeholder="Nhập giá Sản phẩm" 
              value="{{ $product->price}}">
      
    </div>
    
    <div class="form-group">
      <label>Số lượng</label>
      <input type="text" class="form-control" name="quanty"
              placeholder="Nhập số lượng Sản phẩm"
              value="{{ $product->quanty}}">
      
    </div>

<div class="form-group">
    <label>Ảnh đại diện</label>
    <input type="file" class="form-control-file" name="feature_image_path">
    <div class="col-md-12 feature_image-container">
        <div class="row">
        <div class="col-md-3">
            <img class ="feature_image"src="{{ $product->feature_image_path}}" alt="">
        </div>
        </div>

    </div>
</div>

<div class="form-group">
    <label>Ảnh chi tiết</label>
    <input type="file" class="form-control-file" name="image_path[]" multiple>
    <div class="col-md-12 feature_image-container">
        <div class="row">
            @foreach($product->productImages as $productImageItem)
            <div class="col-md-3">
                <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>



        <div class="form-group">
          <label>Chọn danh mục</label>
          <select class="form-control select_mtk" name="category_id">
            <option value="0">Chọn danh mục</option>
          {!!$htmlOption!!}
          </select>
        </div>

        
        <div class="form-group">
            <label>Nhập nội dung</label>
            <textarea name="contents" class="form-control" rows="3">{{$product->content}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{ asset('admins/product/add/add.js')}}"></script>
@endsection
