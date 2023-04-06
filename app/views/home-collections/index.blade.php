@extends('layout.main-client')
@section('content')
<!-- main -->
<div class="main-top">
    <p class="main-top__title">
        <a href="{{ route('') }}" class="main-top__title-link">Trang chủ</a>
        <span class="main-top__category">Giày đá bóng nam</span>
    </p>
</div>
<div class="main-container">
    <div class="main-container__header">
        <h1 class="main-container__heading">Giày Đá Bóng Nam</h1>
    </div>
    <div class="main-container__list">
        <ul class="main-container__list-item">
            <li class="main-container__item">DANH MỤC<i class='bx bx-chevron-down'></i></li>
            <li class="main-container__item">THƯƠNG HIỆU<i class='bx bx-chevron-down'></i></li>
            <li class="main-container__item">GIÁ SẢN PHẨM<i class='bx bx-chevron-down'></i></li>
            <li class="main-container__item">MÀU SẮC<i class='bx bx-chevron-down'></i></li>
            <li class="main-container__item">KÍCH THƯỚC<i class='bx bx-chevron-down'></i></li>
        </ul>
        <select class="main-container__option">
            <option value="" selected><a href="" class="main-container__option-link">Sản phẩm nổi bật<i class='bx bx-chevron-down'></i></a></option>
            <option value=""><a href="" class="main-container__option-link">Giá: Tăng dần</a></option>
            <option value=""><a href="" class="main-container__option-link">Giá giảm dần</a></option>
        </select>
    </div>
    <div class="main-container__list-product">
        @foreach($listProduct as $values)
        <div class="product-list__item">
            <div class="product-list__item-images">
                <a href="{{BASE_URL}}home-detail/{{$values->id}}/{{$values->fk_cate_id}}"><img src="{{BASE_URL}}public/uploads/{{$values->image}}" alt="" class="product-list__img"></a>
            </div>
            <h3 class="product-list__title">
                <a href="" class="product-list__link">{{$values->title}}</a>
            </h3>
            <p class="product-list__price">{{number_format($values->price)}}<sup>đ</sup></p>
            <div class="product-list__btn">
                <button class="product-list__buy">MUA NGAY</button>
                <button class="product-list__add">THÊM VÀO GIỎ</button>
            </div>
        </div>
        @endforeach

    </div>
    <div class="main-container__paging">
        <ul class="main-container__paging-list">
            <li class="main-container__paging-item">
                <a href="" class="main-container__paging-link-arrow"><i class='fas fa-long-arrow-alt-left'></i></a>
            </li>
            <li class="main-container__paging-item">
                <a href="" class="main-container__paging-link">1</a>
            </li>
            <li class="main-container__paging-item">
                <a href="" class="main-container__paging-link">2</a>
            </li>
            <li class="main-container__paging-item">
                <a href="" class="main-container__paging-link">3</a>
            </li>
            <li class="main-container__paging-item">
                <a href="" class="main-container__paging-link-arrow"><i class='fas fa-long-arrow-alt-right'></i></a>
            </li>
        </ul>
    </div>
</div>
<!-- end-main -->
@endsection