@extends('layouts.admin')

@section('title', 'Order Status')

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Order', 'key' => 'Status'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p>Trạng thái của đơn hàng có ID: {{ $order->id }}</p>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route('order.updatestatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select name="status" class="form-control" id="status">
                                    @foreach($statuses as $key => $status)
                                        <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
