@if($newCart != null)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ hàng</title>
    <link href="{{ asset('Eshopper/home/all.min.css')}}" integrity="YOUR-INTEGRITY-CODE" crossorigin="anonymous">
    <link href="{{ asset('/Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <style>
        .cart-summary {
            height: 300px;
            width: 300px;
            margin-top: 20px;
            float: right;
        }
        .cart-mari{
            height: 300px;
            width: 300px;
            padding-left: 120px;
            margin-top: -25px;

        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        form {
        
        margin: 20px auto;
        width: 400px;
        padding: 20px 50px 80px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 30px -115px;
    }

    label, input {
        display: block;
        margin-bottom: 15px;
    }
    input[type="text1"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        
    }
     
    </style>
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <section id="cart_items">
                        <div class="container">
                            @if($newCart != null && Session::has("Cart") != null && Session::get('Cart')->totalQuanty > 0)
                                <!-- Nếu giỏ hàng có sản phẩm -->
                                <div class="row">
                                    <div class="col-ss" id="list-cart">
                                        <div class="breadcrumbs">
                                            <ol class="breadcrumb">
                                                <li><a href="{{route('home')}}">Home</a></li>
                                                <li class="active">Giỏ hàng</li>
                                            </ol>
                                        </div>
                                        <div class="table-responsive cart_info">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr class="cart_menu">
                                                        <th class="image">Ảnh</th>
                                                        <th class="description">Tên</th>
                                                        <th class="price">Giá</th>
                                                        <th class="quantity">Số lượng</th>
                                                        <th class="total">Tổng cộng</th>
                                                        <th class="save">Lưu</th>
                                                        <th class="delete">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(Session::get('Cart')->products as $item)
                                                        <tr>
                                                            <td class="cart_product">
                                                                @if($item['productInfo']->feature_image_path)
                                                                    <img class="image_size" style="width: 100px; height: 80px; object-fit: cover;" src="{{ url('http://127.0.0.1:8001' . $item['productInfo']->feature_image_path) }}" alt="{{ $item['productInfo']->name }}" />
                                                                @else
                                                                    <img class="image_size" style="width: 100px; height: 80px; object-fit: cover;" src="{{ asset('Eshopper/images/home/product1.jpg') }}" alt="No image" />
                                                                @endif
                                                            </td>
                                                            <td class="cart_description">
                                                                <h4>{{$item['productInfo']->name}}</h4>
                                                            </td>
                                                            <td class="cart_price">
                                                                <p>{{number_format($item['productInfo']->price)}} VNĐ</p>
                                                            </td>
                                                            <td class="cart_quantity">
                                                                <div class="cart_quantity_button">
                                                                    <a class="cart_quantity_down" href="javascript:void(0);" onclick="decreaseQuantity({{$item['productInfo']->id}})"> - </a>
                                                                    <input class="cart_quantity_input" type="text" name="quantity" id="quantity-{{$item['productInfo']->id}}" value="{{$item['quanty']}}" autocomplete="off" size="2">
                                                                    <a class="cart_quantity_up" href="javascript:void(0);" onclick="increaseQuantity({{$item['productInfo']->id}})"> + </a>
                                                                </div>
                                                            </td>
                                                            <td class="cart_total">
                                                                <p class="cart_total_price">{{ number_format($item['price']) }} VNĐ</p>
                                                            </td>
                                                            <td>
                                                                <a><i class="ti-save" onclick="SaveListCart({{$item['productInfo']->id}})"><button> &#128190;</button></i><a>
                                                            </td>
                                                            <td class="cart_delete">
                                                                <a class="cart_quantity_delete" href="javascript:void(0);" onclick="DeleteListCart({{$item['productInfo']->id}})">X</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-3 cart-summary">
                                            <div class="total_area">
                                                <ul>
                                                    <li>Số lượng: <span>{{ (Session::get('Cart')->totalQuanty) }}</span></li><br>
                                                    <li>Tổng cộng: <span>{{ number_format(Session::get('Cart')->totalprice)}}VNĐ</span></li><br>
                                                </ul>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buyModal">
                                                    Đặt hàng
                                                </button>
                                            </div>
                                            <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buyModalLabel">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if(auth()->check())
                                                                Bạn có chắc chắn mua hàng không?
                                                            @else
                                                                Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục mua hàng.
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            @if(auth()->check())
                                                                <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục</a>
                                                            @else
                                                                <a href="{{ route('feuser.login') }}" class="btn btn-primary">Đăng nhập</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 cart-mari">
                                            <div class="col-sm-3 cart-mari">
                                                <form id="userInfoForm" method="POST" action="{{ route('order.store') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Tên khách hàng</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên khách hàng" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Địa chỉ</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phương thức thanh toán</label><br>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked onclick="toggleCardInfo(false)">
                                                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" onclick="toggleCardInfo(true)">
                                                            <label class="form-check-label" for="card">Thanh toán bằng thẻ</label>
                                                        </div>
                                                    </div>
                                                    <div id="cardInfo" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="card_number">Số thẻ</label>
                                                            <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Số thẻ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card_expiry">Ngày hết hạn</label>
                                                            <input type="text" class="form-control" id="card_expiry" name="card_expiry" placeholder="MM/YY">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="card_cvc">CVC</label>
                                                            <input type="text" class="form-control" id="card_cvc" name="card_cvc" placeholder="CVC">
                                                        </div>
                                                    </div>
                                                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                            </form>
                                        </div>
                                </div>
                            @endif
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        @include('components.footer')
    </footer>
    
    <script src="{{ asset('/Eshopper/js/jquery.js')}}"></script>
    <script src="{{ asset('/Eshopper/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/Eshopper/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('/Eshopper/js/price-range.js')}}"></script>
    <script src="{{ asset('/Eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('/Eshopper/js/main.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    
    <script>
        function toggleCardInfo(show) {
            document.getElementById('cardInfo').style.display = show ? 'block' : 'none';
            var cardInputs = document.querySelectorAll('#cardInfo input');
            for (var i = 0; i < cardInputs.length; i++) {
                cardInputs[i].required = show;
            }
        }
    </script>
    <script>
        function increaseQuantity(productId) {
            var inputElement = document.getElementById('quantity-' + productId);
            var currentValue = parseInt(inputElement.value);
            inputElement.value = currentValue + 1;
            // Gọi hàm để cập nhật số lượng trong giỏ hàng hoặc gửi yêu cầu AJAX tới máy chủ để cập nhật số lượng.
        }
    
        function decreaseQuantity(productId) {
            var inputElement = document.getElementById('quantity-' + productId);
            var currentValue = parseInt(inputElement.value);
            if (currentValue > 1) {
                inputElement.value = currentValue - 1;
                // Gọi hàm để cập nhật số lượng trong giỏ hàng hoặc gửi yêu cầu AJAX tới máy chủ để cập nhật số lượng.
            }
        }
 
    
    
        // Kiểm tra xem có dữ liệu đã lưu trong sessionStorage không
        if (sessionStorage.getItem('userInfo')) {
            var userInfo = JSON.parse(sessionStorage.getItem('userInfo'));
            document.getElementById('name').value = userInfo.name;
            document.getElementById('phone').value = userInfo.phone;
            document.getElementById('address').value = userInfo.address;
        }
    
        document.getElementById('userInfoForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của form
    
            // Lấy dữ liệu từ các trường input
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
    
            // Gửi request AJAX
            $.ajax({
                url: "{{ route('postTTusers') }}",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    address: address,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Xử lý response JSON
                    if (response.success) {
                        // Hiển thị thông báo
                        alert(response.message);
                        // Cập nhật thông tin người dùng
                        // Ví dụ: 
                        // document.getElementById('userInfo').innerText = response.customer.name;
                    } else {
                        alert('Thêm thông tin thành công!');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Có lỗi xảy ra!');
                    console.error(xhr.responseText);
                }
            });
        });

    document.getElementById('userInfoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: "{{ route('order.store') }}",
        type: "POST",
        data: formData,
        success: function(response) {
            if (response.success) {
                alertify.success(response.message);
            } else {
                alertify.error('Có lỗi xảy ra!');
            }
        },
        error: function(xhr, status, error) {
            alertify.error('Có lỗi xảy ra!');
            console.error(xhr.responseText);
        }
    });
});
    
        
        function placeOrder() {
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
    
            if (name.trim() === '' || phone.trim() === '' || address.trim() === '') {
                alert('Vui lòng nhập đầy đủ thông tin khách hàng.');
            } else {
            }
        }
    </script>
<script>
       function SaveListCart(id) {
    $.ajax({
        url: 'Save-list-cart/' + id + '/' + $("#quantity-" + id).val(),
        type: 'GET',
    }).done(function(response) {
        console.log(response);
        RenderListCart(response, id);
        alertify.success('Đã cập nhật sản phẩm');
    });
}

function DeleteListCart(id) {
    $.ajax({
        url: 'Delete-list-cart/' + id,
        type: 'GET',
    }).done(function(response) {
        console.log(response);
        RenderListCart(response);
        alertify.success('Đã xóa sản phẩm');
    });
}

function RenderListCart(response) {
    $("#list-cart").empty();
    $("#list-cart").html(response);
}
</script>
</body>
</html>
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ hàng</title>
    <link href="{{ asset('/Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/main.css')}}" rel="stylesheet">
    <style>
        .cart-summary {
            height: 300px;
            width: 300px;
            margin-top: 20px;
            float: right;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

    </style>
    <script>
        function toggleCardInfo(show) {
            document.getElementById('cardInfo').style.display = show ? 'block' : 'none';
            var cardInputs = document.querySelectorAll('#cardInfo input');
            for (var i = 0; i < cardInputs.length; i++) {
                cardInputs[i].required = show;
            }
        }
    </script>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <section id="cart_items">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li class="active">Giỏ hàng </li>
                            </ol>
                        </div>
                        <div class="col-sm-12">
                            <div style="text-align: center; margin-top: 50px;">
                                <h3>Giỏ hàng trống</h3>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    @include('components.footer')
</footer>
</body>
</html>
@endif
