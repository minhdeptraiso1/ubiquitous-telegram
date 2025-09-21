<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ hàng</title>
    <link href="{{ asset('Eshopper/home/all.min.css')}}" rel="stylesheet" integrity="YOUR-INTEGRITY-CODE" crossorigin="anonymous">
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
        ul {
        display: flex;
        justify-content: flex-end;
        }
        li {
        display: flex;
        justify-content: flex-end;
        }

        .add-button1 a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-button1 a:hover {
            background-color: #0056b3;
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
                                        <li class="active">Thông tin khách hàng</li>
                                    </ol>
                                   
                                </div>
                                <div class="table-responsive cart_info">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="cart_menu">
                                                <th class="name">Tên</th>
                                                <th class="phone">Số điện thoại</th>
                                                <th class="address">Địa chỉ</th>
                                                <th class="delete">Thay đổi thông tin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customers as $customer)
                                                <tr>
                                                    <td class="cart_name">
                                                        <h4>{{ $customer->name }}</h4>
                                                    </td>
                                                    <td class="cart_phone">
                                                        <p>{{ $customer->phone }}</p>
                                                    </td>
                                                    <td class="cart_address">
                                                        {{ $customer->address }}
                                                    </td>
                                                    <td>
                                                        <li class="add-button1"><a href="{{ route('feuser.add') }}">Đổi</a></li>
                                                    </td>
                                                </tr>
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
</body>
</html>
