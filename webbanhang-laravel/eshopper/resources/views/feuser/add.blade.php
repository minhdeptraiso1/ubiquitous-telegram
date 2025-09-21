<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            font-weight: bold;
        }
        .form-container input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ route('feuser.ttusers') }}">Quay lại</a></li>
            </ol>
        </div>
        <form method="POST" action="{{ route('postTTusers') }}">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group">
                <label for="name">Thông tin khách hàng</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên khách hàng" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ giao hàng" value="{{ old('address') }}" required>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buyModal">
                Lưu thông tin
            </button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Xác nhận thông tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Tên khách hàng:</strong> <span id="modalName"></span></p>
                    <p><strong>Số điện thoại:</strong> <span id="modalPhone"></span></p>
                    <p><strong>Địa chỉ giao hàng:</strong> <span id="modalAddress"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelector('[data-toggle="modal"]').addEventListener('click', function () {
            document.getElementById('modalName').innerText = document.getElementById('name').value;
            document.getElementById('modalPhone').innerText = document.getElementById('phone').value;
            document.getElementById('modalAddress').innerText = document.getElementById('address').value;
        });

        document.getElementById('confirmButton').addEventListener('click', function () {
            document.querySelector('form').submit();
        });
    </script>
</body>
</html>