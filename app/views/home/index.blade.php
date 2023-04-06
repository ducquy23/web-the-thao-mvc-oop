@extends('layout.main-client')
@section('content')
    <!-- main -->
    <main class="main">
        <div class="main__banner">
            <div class="main__banner-image">
                <a href=""><img src="{{BASE_URL}}public/images/banner-main.png" class="main__banner-image-img" alt=""></a>
            </div>
            <div class="main__banner-image">
                <a href=""><img src="{{BASE_URL}}public/images/banner-main.png" class="main__banner-image-img" alt=""></a>
            </div>
            <div class="main__banner-image">
                <a href=""><img src="{{BASE_URL}}public/images/banner-main.png" class="main__banner-image-img" alt=""></a>
            </div>
        </div>
        <div class="main-introduce">
            <div class="main-introduce__item">
                <a href="">
                    <img src="{{BASE_URL}}public/images/img-main_01.png" alt="" class="main-introduce__item-image">
                </a>
            </div>
            <div class="main-introduce__item">
                <a href="">
                    <img src="{{BASE_URL}}public/images/img-main_02.png" alt="" class="main-introduce__item-image">
                </a>
            </div>
            <div class="main-introduce__item">
                <a href="">
                    <img src="{{BASE_URL}}public/images/img-main_01.png" alt="" class="main-introduce__item-image">
                </a>
            </div>
            <div class="main-introduce__item">
                <a href="">
                    <img src="{{BASE_URL}}public/images/img-main_02.png" alt="" class="main-introduce__item-image">
                </a>
            </div>
        </div>
        <div class="main-product">
            <section class="main-product__categories">
                <h1 class="main-product__name">QUẦN ÁO</h1>
                <ul class="main-product__list">
                    @foreach($categoryBalls as $key => $categoryBall)
                    <li class="main-product__item"><a href="{{BASE_URL.'cate_ball/' .$categoryBall->id }}" class="main-product__link">{{$categoryBall->name}}</a></li>
                    @endforeach
                </ul>
            </section>
            <section class="product-list">
                @foreach($ballProducts as $ballProduct)
                <div class="product-list__item">
                    <div class="product-list__item-images">
                        <a href="{{BASE_URL . 'home-detail/'.$ballProduct->id . '/'.$ballProduct->fk_cate_id}}"><img src="{{BASE_URL}}public/uploads/{{$ballProduct->image}}" alt="" class="product-list__img"></a>
                    </div>
                    <h3 class="product-list__title">
                        <a href="{{BASE_URL . 'home-detail/'.$ballProduct->id . '/'.$ballProduct->fk_cate_id}}" class="product-list__link">{{$ballProduct->title}}</a>
                    </h3>
                    <p class="product-list__price">{{number_format($ballProduct->price)}}<sup>đ</sup></p>
                    <div class="product-list__btn">
                        <button class="product-list__buy">MUA NGAY</button>
                        <button class="product-list__add">THÊM VÀO GIỎ</button>
                    </div>
                    <div class="product-list__discount">-10%</div>
                </div>
                @endforeach
            </section>
            <!-- end-main-block-1 -->
            <section class="main-product__categories">
                <h1 class="main-product__name">GIÀY</h1>
                <ul class="main-product__list">
                    @foreach($categoryShoes as $key => $shoes)
                        <li class="main-product__item"><a href="{{BASE_URL. 'cate_shoes/' . $shoes->id  }}" class="main-product__link">{{$shoes->name}}</a></li>
                    @endforeach
                </ul>
            </section>
            <section class="product-list">
                @foreach($shoesProducts as $shoesProduct)
                <div class="product-list__item">
                    <div class="product-list__item-images">
                        <a href="{{BASE_URL. 'home-detail/' . $shoesProduct->id . '/' . $shoesProduct->fk_cate_id}}"><img src="{{BASE_URL}}public/uploads/{{$shoesProduct->image}}" alt="" class="product-list__img"></a>
                    </div>
                    <h3 class="product-list__title">
                        <a href="{{BASE_URL. 'home-detail/' . $shoesProduct->id . '/' . $shoesProduct->fk_cate_id}}" class="product-list__link">{{$shoesProduct->title}}</a>
                    </h3>
                    <p class="product-list__price">{{number_format($shoesProduct->price)}}<sup>đ</sup></p>
                    <div class="product-list__btn">
                        <button class="product-list__buy">MUA NGAY</button>
                        <button class="product-list__add">THÊM VÀO GIỎ</button>
                    </div>
                </div>
                @endforeach
            </section>
            <section class="product-device">
                <h1 class="product-device__name">THIẾT BỊ TẬP</h1>
                <div class="product-device__list">
                @foreach($exerciseEquipments as $exerciseEquipment)
                    <div class="product-device__item">
                        <div class="product-device__img">
                            <a href="" class="product-device__link">
                                <img src="{{BASE_URL}}public/uploads/{{$exerciseEquipment->images}}" alt="" class="product-device__img-image">
                            </a>
                            <a href="">
                                <span class="product-device__cirle"></span>
                            </a>
                        </div>
                        <div class="product-device__title">
                            <a href="" class="product-device__title-link">{{$exerciseEquipment->name}}</a>
                        </div>
                        <p class="product-device__desc">
                            {{$exerciseEquipment->description_short}}
                        </p>
                        <a href="">
                            <div class="product-device__view">
                                XEM THÊM
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
        <div class="main-news">
            <h1 class="main-news__title">TIN TỨC MỚI NHẤT</h1>
            <div class="main-news__product">
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/news_01.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/new_02.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/new_03.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/new_05.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/news_01.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
                <div class="main-news__product-item">
                    <div class="main-news__product-item__img">
                        <a href="">
                            <img src="{{BASE_URL}}public/images/news_04.png" alt="" class="main-news__product-item__img-image">
                        </a>
                        <a href="">
                            <span class="main-news__product-item__circle"></span>
                        </a>
                    </div>
                    <h2 class="main-news__name">
                        <a href="" class="main-news__name-link">Động Lực Sport đồng hành cùng Giải bóng đá Thanh niên Sinh viên Việt Nam lần thứ nhất năm 2023</a>
                    </h2>
                    <p class="main-news__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, quas? Blanditiis cupiditate consectetur fugit saepe ducimus aliquam, dolore totam, nemo error, enim libero quae? Eligendi eos a facilis deleniti quo?
                    </p>
                    <a href="">
                        <div class="product-device__view">
                            XEM THÊM
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection