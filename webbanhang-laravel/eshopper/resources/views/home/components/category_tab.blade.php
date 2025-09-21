<body>
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($categorys as $indexCategory =>$categoryItem)
                    <li class="{{$indexCategory == 0 ? 'active' : ''}}">
                        <a href="category_tab_{{$categoryItem->id}}" data-toggle="tab">
                            {{$categoryItem->name}}
                        </a>
                    </li>
                @endforeach	
            </ul>
        </div>
    
        <div class="tab-content">
            @foreach($categorys as $indexCategoryProduct => $categoryItemProduct)   
                <div class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : ''}}" id="category_tab_{{$categoryItemProduct->id}}" >
                    @foreach($categoryItemProduct->products as $productItemTabs)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ route('product.category.productdetail', ['id' => $productItemTabs->id]) }}">

                                        <h2>{{$productItemTabs->price}}</h2>
                                        <p>{{$productItemTabs->name}}</p>
                                        <a onclick="Addcart({{$productItemTabs->id}})" href="javascript:" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach	
        </div>
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
