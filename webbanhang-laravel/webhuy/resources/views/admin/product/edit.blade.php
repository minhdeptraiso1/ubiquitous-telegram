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

              <!-- Hiển thị thông báo thành công -->
              @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif

              <!-- Hiển thị thông báo lỗi -->
              @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('error') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif

              <form action="{{route('product.update', ['id'=> $product ->id])}}" method="post" enctype="multipart/form-data">
              @csrf
    <div class="form-group">
      <label>Tên Sản phẩm</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
              placeholder="Nhập tên Sản phẩm" 
              value="{{ old('name', $product->name) }}"
              >
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label>Giá sản phẩm</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
              placeholder="Nhập giá Sản phẩm" 
              value="{{ old('price', $product->price) }}">
      @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    
    <div class="form-group">
      <label>Số lượng</label>
      <input type="text" class="form-control @error('quanty') is-invalid @enderror" name="quanty"
              placeholder="Nhập số lượng Sản phẩm"
              value="{{ old('quanty', $product->quanty) }}">
      @error('quanty')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

<div class="form-group">
    <label>Ảnh đại diện</label>
    <input type="file" class="form-control-file @error('feature_image_path') is-invalid @enderror" name="feature_image_path">
    @error('feature_image_path')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-md-12 feature_image-container">
        <div class="row">
        <div class="col-md-3">
            @if($product->feature_image_path)
                <img class="feature_image" src="{{ asset($product->feature_image_path) }}" alt="{{ $product->name }}" style="width: 100%; height: auto;">
            @else
                <div class="no-image">Chưa có ảnh đại diện</div>
            @endif
        </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Ảnh chi tiết</label>
    <input type="file" class="form-control-file @error('image_path.*') is-invalid @enderror" name="image_path[]" multiple>
    @error('image_path.*')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-md-12 feature_image-container">
        <div class="row">
            @if($product->productImages && $product->productImages->count() > 0)
                @foreach($product->productImages as $productImageItem)
                <div class="col-md-3">
                    <img class="image_detail_product" src="{{ asset($productImageItem->image_path) }}" alt="{{ $product->name }}" style="width: 100%; height: auto; margin-bottom: 10px;">
                </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="no-image">Chưa có ảnh chi tiết</div>
                </div>
            @endif
        </div>
    </div>
</div>



        <div class="form-group">
          <label>Chọn danh mục</label>
          <select class="form-control select_mtk @error('category_id') is-invalid @enderror" name="category_id">
            <option value="0">Chọn danh mục</option>
          {!!$htmlOption!!}
          </select>
          @error('category_id')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        
        <div class="form-group">
            <label>Nhập nội dung</label>
            <textarea name="contents" class="@error('contents') is-invalid @enderror form-control" rows="3">{{ old('contents', $product->content) }}</textarea>
            @error('contents')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
