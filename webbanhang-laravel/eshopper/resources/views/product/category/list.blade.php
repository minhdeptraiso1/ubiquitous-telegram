@extends('layouts.master')

@section('title')
    <title>Home Page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
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
                url: '{{ url("/Add-cart") }}/' + id,
                type: 'GET',
                dataType: 'json',
            }).done(function(response) {
                console.log(response);
                if(response.message) {
                    alertify.success(response.message);
                    // Cập nhật giỏ hàng nếu cần
                } else {
                    alertify.error('Error adding product to cart');
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alertify.error('Error adding product to cart');
                console.error(jqXHR, textStatus, errorThrown);
            });
        }
    </script>
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($categorys as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{ $category->id }}">
                                            <span class="badge pull-right">
                                                @if($category->categoryChildrent->count())
                                                    <i class="fa fa-plus"></i>
                                                @endif
                                            </span>
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear_{{ $category->id }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($category->categoryChildrent as $categoryChildrent)
                                                <li>
                                                    <a href="{{ route('category.product', ['slug' => $categoryChildrent->slug, 'id' => $categoryChildrent->id]) }}">
                                                        {{ $categoryChildrent->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div class="row">
                        @foreach($products as $prd)
                            <div class="col-sm-3" style="width: 200px; height: 380px;">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('product.category.productdetail', ['id' => $prd->id]) }}"><img src="{{ $prd->feature_image_path ? url('http://127.0.0.1:8001' . $prd->feature_image_path) : asset('Eshopper/images/home/product1.jpg') }}" alt="{{ $prd->name }}" /></a>
                                            <h4 style="color: orange;">{{ number_format($prd->price) }} VND</h4>
                                            <p>{{ $prd->name }}</p>
                                            <a onclick="Addcart({{ $prd->id }})" href="javascript:" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection