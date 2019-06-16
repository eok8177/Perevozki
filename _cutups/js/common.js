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

    $(document).ready(function(){

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            }
            else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(msg);

        });


    });


    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }


    var more = $('.info__link');

    more.click(function (e) {
        e.preventDefault();
        var r = $(this).prev();
        if (r.hasClass('info__hide')) {
            r.toggle();
        }

    })


});