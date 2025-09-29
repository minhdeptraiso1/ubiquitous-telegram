<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lịch sử Đơn hàng</title>
    <link href="{{ asset('Eshopper/home/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/Eshopper/css/main.css') }}" rel="stylesheet">
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
        .cart-mari {
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
                            <div class="row">
                                <div class="col-ss" id="list-cart">
                                    <div class="breadcrumbs">
                                        <ol class="breadcrumb">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li class="active">Lịch sử mua hàng</li>
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
                                                    <th class="status">Trạng thái</th>
                                                    <th class="time">Thời gian</th>
                                                    <th class="action">Hành động</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    @foreach($order->orderItems as $index => $orderItem)
                                                    <tr>
                                                        <td>
                                                            @if($orderItem->product && $orderItem->product->feature_image_path)
                                                                <img class="image_size" style="width: 100px; height: 80px; object-fit: cover;" src="{{ url('http://127.0.0.1:8001' . $orderItem->product->feature_image_path) }}" alt="{{ $orderItem->product->name }}">
                                                            @else
                                                                <img class="image_size" style="width: 100px; height: 80px; object-fit: cover;" src="{{ asset('Eshopper/images/home/product1.jpg') }}" alt="No image">
                                                            @endif
                                                        </td>
                                                        <td>{{ $orderItem->product ? $orderItem->product->name : 'Sản phẩm không tồn tại' }}</td>
                                                        <td>{{ number_format($orderItem->price) }} VND</td>
                                                        <td>{{ $orderItem->quanty }}</td>
                                                        @if ($index === 0)
                                                        <td rowspan="{{ $order->orderItems->count() }}">{{ number_format($order->total_price) }} VND</td>
                                                        <td rowspan="{{ $order->orderItems->count() }}">{{ $order->status }}</td>
                                                        <td rowspan="{{ $order->orderItems->count() }}">{{ $order->created_at }}</td>
                                                        <td rowspan="{{ $order->orderItems->count() }}">
                                                            @if ($order->status == 'Đã giao hàng')
                                                            <button class="btn btn-success mark-received" data-order-id="{{ $order->id }}">Đã nhận</button>
                                                            @endif
                                                        </td>
                                                        
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
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
    
    <script src="{{ asset('/Eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('/Eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/Eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('/Eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('/Eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('/Eshopper/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.mark-received').forEach(function (button) {
                button.addEventListener('click', function () {
                    var orderId = this.getAttribute('data-order-id');
                    
                    fetch(`/update-order-status/${orderId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ status: 'Đã nhận' })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alertify.success('Trạng thái đơn hàng đã được cập nhật.');
                            location.reload(); // Tải lại trang để cập nhật thay đổi
                        } else {
                            alertify.error('Có lỗi xảy ra.');
                        }
                    });
                });
            });
        });
    </script>
    
</body>
</html>
