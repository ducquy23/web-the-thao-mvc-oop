@extends('layout.main-client')
@section('content')
    <div class="main-categories-top">
        <a href="" class="main-categories-top__home main-categories-top__home--separate">Trang chủ</a>
        <a href="" class="main-categories-top__category main-categories-top__category--separate">Giày thể thao nam</a>
        <p class="main-categories-top__title">Giày đá bóng Jogarbola Colorlux 2.0 Ultra</p>
    </div>
    <div class="main-info-product">
        <div class="main-info-product__related-product">
            @foreach($product_images as $values)
            <div class="main-info-product__related-product-img">
{{--                <a href="#">--}}
                    <img src="{{BASE_URL}}public/uploads/{{$values->path}}" alt="" class="main-info-product__related-product-img-img">
{{--                </a>--}}
            </div>
            @endforeach
        </div>
        <div class="main-info-product__image">
            <img style="object-fit: contain;" src="{{BASE_URL}}public/uploads/{{$product->image}}" alt="" class="main-info-product__image-img">
        </div>
        <div class="main-info-product__discount">
            -10%
        </div>
        <div class="main-info-product__detail">
            <h3 class="main-info-product__detail-title">{{$product->title}}</h3>
            <div class="main-info-product__detail-info">Thương hiệu <span>JOGARBOLA | </span> Loại: <span>GIÀY ĐÁ BÓNG JOGARBOLA |</span> MÃ SP: <span>{{$product->id}}</span></div>
            <div class="main-info-product__detail-price">{{number_format($product->price)}}₫ <span class="main-info-product__detail-discount">695,000đ</span></div>
            <div class="main-info-product__color">
                <p class="main-info-product__color-name">Màu sắc:</p>
                <ul class="main-info-product__color-list">
                    @foreach($colors as $color)
                    <li class="main-info-product__color-item main-info-product__color-item--active">
                        <a href="" class="main-info-product__color-link" style="background-color: {{$color->hex_code}};"></a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="main-info-product__size">
                <p class="main-info-product__size-name">Kích thước:</p>
                <ul class="main-info-product__size-list">

                    <li class="main-info-product__size-item main-info-product__size-item--active">M</li>

                </ul>
            </div>
            <!-- <form action=""> -->
            <div class="main-info-product__action">
                <div class="main-info-product__form">
                    <label for="">Số lượng</label> <br>
                    <input type="number" min="1" value="1" class="main-info-product__form-input">
                </div>
                <div class="main-info-product__form-btn">
                    <a href=""><button class="main-info-product__form-btn-button">THÊM VÀO GIỎ</button></a>
                    <a href=""><button class="main-info-product__form-btn-button">MUA NGAY</button></a>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
    <div class="main-info-product-more">
        <div class="main-info-desc">
            <div class="main-info-desc__header">
                <a href="" class="main-info-desc__info-link main-info-desc__info-link--separate">THÔNG TIN SẢN PHẨM</a>
                <a href="" class="main-info-desc__info-link">ĐÁNH GIÁ</a>
            </div>
            <div class="main-info-desc__content">
                <?php
                $string = $product->description;
                // Mã hóa chuỗi HTML
                $encoded_string = html_entity_decode($string);
                // In ra chuỗi mã hóa
                echo $encoded_string;?>
            </div>
        </div>
    </div>
    <div class="main-info-product-related">
        <div class="main-info-product-related__header">
            <h2 class="main-info-product-related__header-title">SẢN PHẨM LIÊN QUAN</h2>
        </div>
        <div class="main-info-product-related__body">
            @foreach($product_relate as $value)
            <div class="product-list__item">
                <div class="product-list__item-images">
                    <a href="{{BASE_URL. 'home-detail/' . $value->id . '/' . $value->fk_cate_id}}"><img src="{{BASE_URL}}public/uploads/{{$value->image}}" alt="" class="product-list__img"></a>
                </div>
                <h3 class="product-list__title"><a href="" class="product-list__link">{{$value->title}}</a></h3>
                <p class="product-list__price">{{number_format($value->price)}}<sup>đ</sup></p>
                <div class="product-list__btn">
                    <button class="product-list__buy">MUA NGAY</button>
                    <button class="product-list__add">THÊM VÀO GIỎ</button>
                </div>
                <div class="product-list__discount">-10%</div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END-PRODUCT-RELATED -->
    <div class="main-info-product-related">
        <div class="main-info-product-related__header">
            <h2 class="main-info-product-related__header-title">SẢN PHẨM ĐÃ XEM</h2>
        </div>
        <div class="main-info-product-viewed__body">
            @foreach($productViewed as $value)
            <div class="product-list__item">
                <div class="product-list__item-images">
                    <a href="{{BASE_URL. 'home-detail/' . $value->id . '/' . $value->fk_cate_id}}"><img src="{{BASE_URL}}public/uploads/{{$value->image}}" alt="" class="product-list__img"></a>
                </div>
                <h3 class="product-list__title"><a href="" class="product-list__link">{{$value->title}}</a></h3>
                <p class="product-list__price">{{number_format($value->price)}}<sup>đ</sup></p>
                <div class="product-list__btn">
                    <button class="product-list__buy">MUA NGAY</button>
                    <button class="product-list__add">THÊM VÀO GIỎ</button>
                </div>
                <div class="product-list__discount">-10%</div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection