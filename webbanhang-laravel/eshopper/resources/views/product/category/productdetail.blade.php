@extends('layouts.master')

@section('title')
    <title>Home Page</title>
@endsection

@section('css')

    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('home/detail.css') }}">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    
    <script>
        function Addcart(id){
            $.ajax({
                url: 'Add-cart/' +id,
                type: 'GET',
                dataType: 'html',
            }).done(function(response) {
                console.log(response);
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                alertify.success('Đã thêm sản phẩm ');
            })
            
        }
    </script>
@endsection

@section('content')
<section>

    <div class="container">
        <div class="card">
            <div class="container-fluid">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" /></div>
                            @foreach($product->images as $index => $image)
                                <div class="tab-pane" id="pic-{{ $index + 2 }}"><img src="{{ config('app.base_url') . $image->image_path }}" alt="" /></div>
                            @endforeach
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            @foreach($product->images as $index => $image)
                                <li><a data-target="#pic-{{ $index + 2 }}" data-toggle="tab"><img src="{{ config('app.base_url') . $image->image_path }}" alt="" /></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->name }}</h3>
                       
                        <p class="product-description">{{ $product->content }}</p>
                        <h4 class="price">Giá:  <span>{{ number_format($product->price) }} VND</span></h4>
                        <div class="action">
                            <a onclick="Addcart({{ $product->id }})" href="javascript:" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                            </a>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

