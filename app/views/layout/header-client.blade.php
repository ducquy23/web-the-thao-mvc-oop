<header class="header">
    <div class="header-top">
        <div class="header-top__gift header-top__gift--separate">
            <i class='bx bx-gift'></i>
            Chào tháng 11 - Mua 1 tặng 1. Đặt hàng ngay hôm nay để nhận ƯU ĐÃI
        </div>
        <span href="#" class="header-top__register">
                    <a href="" class="header-top__register-link">Đăng ký ngay</a>
        </span>
    </div>
    <div class="header-bottom">
{{--        <div class="header-notification">--}}
{{--            @foreach (get_notification() as $notification)--}}
{{--                @foreach($notification['message'] as $msg)--}}
{{--                    <div style="color: {{$notification['type']}};margin-right: 320px" class="client-message">--}}
{{--                        <h3>{{$msg}}</h3>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
{{--        </div>--}}
        <ul class="header-bottom__list">
            @if(isset($_SESSION['user']) && $_SESSION['user']->role == 1)
            <li class="header-bottom__item header-bottom__item--separate">
                <a href="{{BASE_URL}}list-product" class="header-bottom__link">Trang quản trị</a>
            </li>
            @endisset
            <li class="header-bottom__item header-bottom__item--separate">
                <a href="" class="header-bottom__link">Tin tức</a>
            </li>
            <li class="header-bottom__item">
                <a href="" class="header-bottom__link header-bottom__item--separate">Cửa hàng</a>
            </li>
            <li class="header-bottom__item">
                <a href="" class="header-bottom__link header-bottom__item--separate">Liên hệ</a>
            </li>
             @isset($_SESSION['user'])
            <li class="header-bottom__item">
                <a href="{{BASE_URL}}log-out" class="header-bottom__link" style="color: red">Đăng xuất</a>
            </li>
            @endisset
            <li class="header-bottom__item">
                <a href="" class="header-bottom__link"><img src="/images/logo_vietnamese.png" alt=""></a>
                <a href="" class="header-bottom__link"><img src="/images/logo_uk.png" alt=""></a>
            </li>
        </ul>
    </div>
    <!-- box- account -->
    <div class="box-login ">
        <div class="box-login__header">
            <div class="box-login__name">TÀI KHOẢN</div>
            <div class="box-login__close"><i class='bx bx-x-circle box-login__close-icon'></i></div>
        </div>
        <!-- box--login  -->
        <div class="box-login__main">
            <h3 class="box-login__heading">ĐĂNG NHẬP</h3>
            <div class="box-login__form">
                <form action="{{BASE_URL}}handler-login" method="post">
                    <div class="form-group">
                        <label for="">Email</label> <br>
                        <input type="email" name="email" class="box-login__input" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label><br>
                        <input type="password" name="password" class="box-login__input" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="box-login__btn">Đăng nhập</button>
                    </div>
                </form>
                <div class="box-login__forgot"><a href="#" class="box-login__link">Quên mật khẩu ?</a></div>
                <div class="box-login__register"><a href="#" class="box-login__link">Chưa có tài khoản - Đăng ký</a></div>
            </div>

        </div>
        <!-- end--box--login -->
        <!-- ================================================================== -->
        <!-- box--forgot -->
        <div class="box-forgot__main">
            <p class="box-forgot__heading">
                Cài đặt lại mật khẩu <br>
                Mật khẩu mới sẽ được gửi về email của bạn.
            </p>
            <div class="box-forgot__form">
                <form action="">
                    <div class="form-group">
                        <label for="">Email</label> <br>
                        <input type="email" name="email" class="box-login__input" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="box-login__btn">Gửi</button>
                    </div>
                </form>
            </div>
            <a href="#" class="box-forgot__link">Bỏ qua</a>
        </div>
        <!-- end--box--forgot -->
        <!-- ======================================================================= -->
        <!-- box--register -->
        <div class="box-register__main">
            <h3 class="box-register__heading">ĐĂNG KÝ</h3>
            <div class="box-register__form">
                <form action="">
                    <div class="form-group">
                        <label for="">User name</label> <br>
                        <input type="text" name="username" class="box-login__input" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label> <br>
                        <input type="email" name="email" class="box-login__input" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label> <br>
                        <input type="password" name="password" class="box-login__input" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="box-login__btn">Đăng ký</button>
                    </div>
                </form>
            </div>
            <a href="#" class="box-forgot__link box-register__link">Trở về</a>
        </div>

        <!-- end--box--register -->
    </div>

    <!-- end-box-account -->
    <!-- box-cart -->
    <div class="box-cart">
        <div class="box-cart__header">
            <div class="box-cart__name">GIỎ HÀNG</div>
            <div class="box-login__close"><i class='bx bx-x-circle box-cart__icon-close'></i></div>
        </div>
        <!-- box-cart--no--product -->
        <div class="box-cart__main box-cart__main--no-product">
            <div class="box-cart__cart"><i class='bx bx-cart'></i></div>
            <div class="box-cart__status">Hiện chưa có sản phẩm nào</div>
        </div>
        <!-- end--box-cart--no--product -->
        <!-- box-cart--has--product -->
        <div class="box-cart__main box-cart__main--has-product">
            <div class="box-cart__img">
                <img src="{{BASE_URL}}pubic/images/football_06.png" alt="" class="box-cart__img-child">
            </div>
            <table class="box-cart-info">
                <thead>
                <tr>
                    <th>
                        <div class="box-cart-info__title">
                            BÓNG ĐÁ FIFA QUALITY PRO UHV 2.07 SỐ 5
                        </div>
                    </th>
                    <th><i class='bx bx-x-circle box-cart-action__icon-close'></i></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="box-cart-info__type">Đỏ/38</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="box-cart-info__quantity">1</div>
                    </td>
                    <td>
                        <div class="box-cart-action__total">1,395,000<sup><u>đ</u></sup></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- end-cart--has--product -->
        <div class="box-cart__bill">
            <p class="box-cart__total">TỔNG TIỀN :</p>
            <p class="box-cart__price">0<sup><u>đ</u></sup></p>
        </div>
        <div class="box-cart__btn">
            <button class="box-cart__view">XEM GIỎ HÀNG</button>
            <button class="box-cart__pay">THANH TOÁN</button>
        </div>
    </div>
    <!-- end-box-cart -->
    <div class="header-main">
        <div class="header-main__logo">
            <a href="{{BASE_URL}}"><img src="{{BASE_URL}}public/images/logo_dongluc.png" alt=""
                                        class="header-main__logo-img"></a>
        </div>
        <ul class="header-main__list">
            @foreach($menuHome as $category)
                @if($category->parent_id == 0)
                    <li class="header-main__item">
                        <a href="" class="header-main__link">{{$category->name}}</a>
                        <i class='bx bx-chevron-down'></i>
                        <div class="header-main-menu">
                            <ul class="header-main-menu__list">
                                @foreach($menuHome as $category1)
                                    @if($category1->parent_id == $category->id)
                                        <li class="header-main-menu__item">
                                            <a href="{{BASE_URL}}home-collections/{{$category1->id}}"
                                               class="header-main-menu__link header-main-menu--parent">{{$category1->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>

        <div class="header-main-search">
            <form action="">
                <button type="submit" class="header-main__button"><i class='bx bx-search'></i></button>
                <input type="text" class="header-main__input" placeholder="Tìm kiếm sản phẩm...">
            </form>
        </div>
        <div class="header-main-info">
            <a href="#"><i class='bx bx-user-circle header-main-info__user'></i></a>
            <a href="#"><i class='bx bx-cart header-main-info__cart'></i></a>
            <span class="header-main__quantity">0</span>
        </div>
    </div>

</header>
<!-- overlay -->
<div class="overlay"></div>
<!-- end-header -->