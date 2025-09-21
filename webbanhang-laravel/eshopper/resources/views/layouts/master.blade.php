<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    @yield('title')
    <link href="{{ asset('/Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/main.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body>

@include('components.header')

@yield('content')
@include('components.footer')

<script src="{{ asset('/Eshopper/js/jquery.js')}}"></script>
<script src="{{ asset('/Eshopper/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/Eshopper/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('/Eshopper/js/price-range.js')}}"></script>
<script src="{{ asset('/Eshopper/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('/Eshopper/js/main.js')}}"></script>

<!-- JavaScript -->
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
            alertify.success('Đã thêm sàn phẩm ');
        })
		
	}
</script>
@yield('js')
</body>
</html>
