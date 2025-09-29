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
    <link href="{{ asset('/Eshopper/css/custom-product-images.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body>

@include('components.header')

@yield('content')
@include('components.footer')

<!-- jQuery CDN với fallback -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // Fallback nếu CDN fail
    window.jQuery || document.write('<script src="{{ asset("/Eshopper/js/jquery.js") }}"><\/script>');
    console.log('jQuery version:', typeof jQuery !== 'undefined' ? jQuery.fn.jquery : 'Not loaded');
</script>

<!-- Bootstrap 3.4.1 CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<!-- Error handling -->
<script>
    window.addEventListener('error', function(e) {
        console.warn('JavaScript Error caught:', e.message, 'at', e.filename + ':' + e.lineno);
    });
    
    // Safe script execution
    $(document).ready(function() {
        console.log('Document ready - DOM loaded');
        
        // Initialize any critical functionality here
        try {
            // Your initialization code
        } catch(error) {
            console.error('Initialization error:', error);
        }
    });
</script>

<!-- Load other scripts with error handling -->
<script src="{{ asset('/Eshopper/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('/Eshopper/js/price-range.js') }}"></script>  
<script src="{{ asset('/Eshopper/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('/Eshopper/js/main.js') }}"></script>

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
