@extends('layouts.admin')

@section('title')
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')


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
                
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
              @csrf
    <div class="form-group">
    <label>Tên Sản phẩm</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên Sản phẩm"
        value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>


      <div class="form-group">
      <label>Giá sản phẩm</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" name="price"
        placeholder="Nhập giá Sản phẩm"  >
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
      <label>Số lượng</label>
      <input type="text" class="form-control @error('quanty') is-invalid @enderror" value="{{old('quanty')}}" name="quanty"
        placeholder="Nhập số lượng"  >
        @error('quanty')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label>Ảnh đại điện</label>
        <input type="file" class="form-control-file @error('feature_image_path') is-invalid @enderror" name="feature_image_path">
        @error('feature_image_path')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Ảnh chi tiết</label>
        <input type="file" class="form-control-file @error('image_path.*') is-invalid @enderror" name="image_path[]" multiple>
        @error('image_path.*')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
            <textarea name="contents" class="@error('contents') is-invalid @enderror form-control" rows="3" >{{old('contents')}}</textarea>
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

