$(document).ready(function () {
    $('.open').click(function (e) {
        e.preventDefault();
        $('.header__wrapper').toggleClass('open_menu');
        $('.open').toggleClass('close_menu');
        $('.header__block').toggleClass('flex');
        $('.page-header').toggleClass('zindex');
    });

    $('.main__nav--active').click(function (e) {
        e.preventDefault();
        $('.mobile_wrap').toggle();
        $('.main__nav--active').toggleClass('main__nav--open');
    });

    if ($(window).width() <= '800'){
        $('.reviews__items').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
            ]
        });
    }

    $('#review-btn').click(function (e) {
        e.preventDefault();
        $('.overlay').toggle();
        $('.review__form').toggle();
    });

    $('.review__form-close').click(function (e) {
        e.preventDefault();
        $('.overlay').toggle();
        $('.review__form').toggle();
    })




});