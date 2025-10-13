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
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

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
            padding: 80px;
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
        .file-import-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .file-import-section h4 {
            color: #666;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .btn-file-import {
            background-color: #5cb85c;
            color: white;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 12px;
            padding: 5px 10px;
            height: auto;
        }

        .btn-file-sample {
            background-color: #f0ad4e;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            height: auto;
            margin-bottom: 5px;
        }

        .file-input-custom {
            margin-bottom: 10px;
            font-size: 12px;
        }

     
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img src="/Eshopper/images/home/logotruong.png" style="width: 150px; height: 150px; margin-left:29px;" alt="" />
            <h2 class="welcome text-center " style="color: #007EA7">ĐĂNG KÝ</h2>
            <hr>
            
            <form class="form-signin" action="" method="POST">
                @csrf  
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Tên người dùng</p>
                <input type="text" id="inputName" name='name' class="login_box" placeholder="Nhập tên" required autofocus>

                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Email</p>
                <input type="email" id="inputEmail" name='email' class="login_box" placeholder="Nhập Email" required autofocus>
                <div id="emailError" style="color: red; display: none;">Email đã tồn tại!</div>

                <p class="input_title">Mật Khẩu</p>
                <input type="password" id="inputPassword" name='password'class="login_box" placeholder="Nhập mật khẩu" required>
                <div id="remember" class="checkbox"></div>

                <p class="input_title">Nhập lại mật khẩu</p>
                <input type="password" id="inputPasswordConfirm" name='password_confirmation' class="login_box" placeholder="Nhập lại mật khẩu" required>
                <div id="remember" class="checkbox"></div>

                <button class="btn btn-lg btn-primary" type="submit">Đăng ký</button>
                <a href="{{route('feuser.login')}}" class="btn btn-primary btn-block">Tôi đã có tài khoản</a>
            </form>
             <!-- File Import Section -->
    <div class="file-import-section">
        <h4><i class="glyphicon glyphicon-import"></i> Import Multiple Users</h4>
        <form method="POST" action="{{ route('import.users') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="import_file" accept=".txt" class="form-control file-input-custom" required>
            <button type="submit" class="btn btn-file-import">
                <i class="glyphicon glyphicon-upload"></i> Import Users
            </button>
            <a href="{{ route('download.sample.file') }}" class="btn btn-file-sample">
                <i class="glyphicon glyphicon-download"></i> Download Sample File
            </a>
        </form>
        <small class="text-muted">
            <strong>File format:</strong> name=value, separated by lines, multiple users separated by "---"<br>
            <strong>Required fields:</strong> name, email, password<br>
            <strong>Optional fields:</strong> phone, address
        </small>
    </div>
        </div>
    </div>
    
    <script>
        try{Typekit.load({ async: true });}catch(e){}
        $(document).ready(function() {
            $('#inputEmail').on('blur', function() {
                var email = $(this).val();
                if (email) {
                    $.ajax({
                        url: '{{ route('check-email') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            email: email
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#emailError').show();
                            } else {
                                $('#emailError').hide();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
