<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Load jQuery first -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Then Bootstrap JS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    

    <style>
        body, html {
            background-image: url('/Eshopper/images/home/background.jpg');
        }

        .login_box{
            background:#f7f7f7;
            border:3px solid #F4F4F4;
            padding-left: 15px;
            margin-bottom:25px;
        }

        .input_title{
            color:rgba(164, 164, 164, 0.9);
            padding-left:3px;
            margin-bottom: 2px;
        }

        hr{
            width:100%;
        }
        
        .welcome{
            font-family: "myriad-pro",sans-serif;
            font-style: normal;
            font-weight: 100;
            color:#FFFFFF;
            margin-bottom:25px;
            margin-top:50px;
        }

        .login_title{
            font-family: "myriad-pro",sans-serif;
            font-style: normal;
            font-weight: 100;
            color:rgba(164, 164, 164, 0.44);
        }

        .card-container.card {
            float: right;
            max-width: 800px;
            margin: 0 auto;
            margin-top: 5%;
           margin: 200px;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
            border-radius:0;
            background:#43A6EB;
            height: 55px;
            margin-bottom:10px;
        }

        .card {
            background-color: #FFFFFF;
            padding: 1px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 15%x;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #inputEmail,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            background-color: rgb(104, 145, 162);
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(12, 97, 33);
        }

        .forgot-password {
            color: rgb(104, 145, 162);
        }

        .forgot-password:hover,
        .forgot-password:active,
        .forgot-password:focus{
            color: rgb(12, 97, 33);
        }

        
    </style>
</head>
<body>
    
<div class="container">
        <div class="card card-container">
            <img src="/Eshopper/images/home/logotruong.png" style="width: 150px; height: 150px; margin-left:29px;" alt="" />
        <h2 class='login_title text-center'>ĐĂNG NHẬP</h2>
        <hr>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    
    <form class="form-signin" method="POST" action="{{ route('postLogin') }}">
        @csrf
        <span id="reauth-email" class="reauth-email"></span>
        <p class="input_title">Email</p>
        <input type="email" id="inputEmail" name='email' class="login_box" placeholder="Nhập Email" required autofocus>
        <p class="input_title">Mật Khẩu</p>
        <input type="password" id="inputPassword" name='password' class="login_box" placeholder="Nhập mật khẩu" required>
        <div id="remember" class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Login</button>
        <a href="{{ route('feuser.register') }}" class="btn btn-primary btn-block">Create New Account</a>
    </form><!-- /form -->
    
   
    
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
