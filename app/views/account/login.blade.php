@extends('layout.main-client')
@section('content')
    <div class="account">
        @if(!isset($_SESSION['user']))
        <div class="box-account">
            <h3 class="box-account-heading">ĐĂNG NHẬP</h3>
                @foreach (get_notification() as $notification)
                    @foreach($notification['message'] as $msg)
                        <p class="box-account-errors" style="color: {{$notification['type']}}">{{$msg}}</p>
                    @endforeach
                @endforeach
            <form action="{{BASE_URL}}handler-login" method="post" class="box-account-form">
                <div class="form-group">
                    <input type="email" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="box-account-submit">
                    <input type="submit" name="btn-submit-login" value="Đăng Nhập">
                    <p class="box-account-text"><a class="box-account-forgot" href="">Quên mật khẩu</a>hoặc
                        <a href="{{BASE_URL}}register" class="box-account-register">Đăng ký</a></p>
                </div>
            </form>
        </div>
        @endif
        @if(isset($_SESSION['user']))
            <div class="box-account">
                <div class="box-account-heading">TÀI KHOẢN CỦA BẠN</div>
                <div class="box-account-info">
                    <h4 class="box-account-info__title">THÔNG TIN TÀI KHOẢN</h4>
                    <p class="box-account-info__name">{{$_SESSION['user']->username}}</p>
                    <p class="box-account-info__email">{{$_SESSION['user']->email}}</p>
                    <div class="box-account-info__bought-product">Bạn chưa đặt mua sản phẩm nào</div>
                </div>
            </div>
            @endif
    </div>


@endsection