<body>
    <div class="features_items">
        <h2 class="title text-center">Nổi bật</h2>
        @foreach($products as $product)
        <div class="col-sm-3">
            <div class="product-image-wrapper " style="width: 180px; height: 380px;">
                <div class="single-products">
                   
                        <div class="productinfo text-center">
                            <a href="{{ route('product.category.productdetail', ['id' => $product->id]) }}"><img src="{{ $product->feature_image_path ? url('http://127.0.0.1:8001' . $product->feature_image_path) : asset('Eshopper/images/home/product1.jpg') }}" alt="{{ $product->name }}" /></a>
                            <h4 style="color: orange;">{{number_format($product->price)}} VND</h4>
                            <p>{{$product->name}}</p>
                            <a href="javascript:void(0);" onclick="Addcart({{$product->id}})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            

                        </div>							
                    </div>
            </div>
        </div>
        @endforeach
    </div>

	

    <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

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
</body>
