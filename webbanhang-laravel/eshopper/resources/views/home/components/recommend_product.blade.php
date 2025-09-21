<body>
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Gợi ý</h2>
    
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @for($i = 0; $i < count($productsRecomend); $i+=4)
                    <div class="item {{$i == 0 ? 'active' : ''}}">
                        <div class="row">
                            @for($j = $i; $j < min($i+4, count($productsRecomend)); $j++)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper" style="width: 180px; height: 380px;">
                                        <div class="single-products">
                                            
                                            <div class="productinfo text-center">
                                                <a href="{{ route('product.category.productdetail', ['id' => $productsRecomend[$j]->id]) }}"><img src="{{config('app.base_url') . $productsRecomend[$j]->feature_image_path}}" alt="" /></a>
                                                <h2>{{ number_format($productsRecomend[$j]->price) }}</h2>
                                                <p>{{ $productsRecomend[$j]->name }}</p>
                                                <a href="#" onclick="Addcart({{$productsRecomend[$j]->id}}); return false;" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                                    <div id="change-item-cart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endfor
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    
   
</body>
