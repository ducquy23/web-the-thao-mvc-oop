$(document).ready(function () {
    const listImages = $(".main-info-product__related-product-img-img");
    const mainImages = $(".main-info-product__image-img");
    const texForgot = $(".box-login__forgot");
    const textRegister = $(".box-login__register");
    const boxMainLogin = $(".box-login__main");
    const boxLogin = $(".box-login__form");
    const boxForgot = $(".box-forgot__main");
    const boxRegister = $(".box-register__main");
    texForgot.click(function() {
        boxLogin.css("display","none");
        boxForgot.css("display","block");
    });
    textRegister.click(function() {
        boxMainLogin.css("display","none");
        boxRegister.css("display","block");
    });
    $(".box-forgot__link").click(function() {
        boxForgot.css("display","none");
        boxLogin.css("display","block");
    });
    $(".box-register__link").click(function() {
        boxRegister.css("display","none");
        boxMainLogin.css("display","block");
    });
    listImages.click(function (item) {
        const src = item.currentTarget.src;
        mainImages.attr('src',src);
    })
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('.header-main').addClass(' header-main--sticky');
            $(".header-main").css("height",90);
            $('.header-main-menu').css("top",90);
            $(".header-main__logo-img").css("height","auto");
        } else {
            $(".header-main").css("height",105);
            $('.header-main').removeClass(' header-main--sticky');
            $('.header-main-menu').css("top", 105);
            $(".header-main__logo-img").css("height",75);
        }
    });
    // box-login
    $(".header-main-info__user").click(function (item) {
        item.preventDefault();
        $(".overlay").css("display", "block");
        $(".box-login").css({ "transform": "translateX(0px)" });
    });
    $(".box-login__close-icon").click(function () {
        $(".box-login").css({ "transform": "translateX(110%)" });
        $(".overlay").css("display", "none");
    });
    // box-cart
    $(".header-main-info__cart").click(function (item) {
        item.preventDefault();
        $(".overlay").css("display", "block");
        $(".box-cart").css({ "transform": "translateX(0px)" });
    });
    $(".box-cart__icon-close").click(function () {
        $(".box-cart").css({ "transform": "translateX(110%)" });
        $(".overlay").css("display", "none");
    });
    // handle overlay
    $(".overlay").click(function () {
        $(this).css("display", "none");
        $(".box-cart").css({ "transform": "translateX(110%)" });
        $(".box-login").css({ "transform": "translateX(110%)" });
    });
    // handerler slider
    $('.main__banner').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });
    $('.main-introduce').slick({
        slidesToShow: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    })
    $(".main-news__product").slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 8000,
        dots: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });
    $(".main-info-product-related__body").slick({
        slidesToShow: 4,
        autoplay: true,
        infinite: true,
        autoplaySpeed:6000,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });
    $(".main-info-product-viewed__body").slick({
        slidesToShow: 4,
        slidesToScroll:2,
        autoplay: true,
        infinite: true,
        autoplaySpeed:4000,
        dots:true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
    });
    $(".main-info-product__related-product").slick({
        slidesToShow: 5,
        vertical: true,
        arrows: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });

});
