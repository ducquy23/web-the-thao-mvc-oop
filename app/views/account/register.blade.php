@extends('layout.main-client')
@section('content')
    <div class="account">
        <div class="box-account">
            <h3 class="box-account-heading">ĐĂNG KÝ</h3>
            @foreach (get_notification() as $notification)
                @foreach($notification['message'] as $msg)
                    <p class="box-account-errors" style="color: {{$notification['type']}}">{{$msg}}</p>
                @endforeach
            @endforeach
            <form action="{{BASE_URL}}handler-register" method="post" class="box-account-form">
                <div class="form-group">
                    <input type="text" placeholder="fullname" name="username">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="box-account-submit">
                    <input type="submit" name="btn-submit-login" value="Đăng Ký">
                    <a class="box-account-forgot" href="{{BASE_URL}}">Quay lại trang chủ</a>
                </div>
            </form>
        </div>
    </div>
@endsection