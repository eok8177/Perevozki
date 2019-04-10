$(document).ready(function () {
    //close mobile menu when click on link
    $('body').on('click','.header__navigation',function (e) {
        $('body .header__wrapper').toggleClass('open_menu');
        $('body .open').toggleClass('close_menu');
        $('body .header__block').toggleClass('flex');
        $('body .page-header').toggleClass('zindex');
    });
    //toggle mobile menu
    $('body').on('click','.open',function (e) {
        e.preventDefault();
        $('body .header__wrapper').toggleClass('open_menu');
        $('body .open').toggleClass('close_menu');
        $('body .header__block').toggleClass('flex');
        $('body .page-header').toggleClass('zindex');
    });

    //mobile services menu
    $('body').on('click','.main__nav--active.only-mobile',function (e) {
        e.preventDefault();
        $('body .mobile_wrap').toggle();
        $('body .main__nav--active').toggleClass('main__nav--open');
    });

    if ($(window).width() <= '800'){
        $('body .reviews__items').slick({
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

    $('body').on('click','#review-btn',function (e) {
        e.preventDefault();
        $('body .overlay').toggle();
        $('body .review__form').toggle();
    });

    $('body').on('click','.review__form-close',function (e) {
        e.preventDefault();
        $('body .overlay').toggle();
        $('body .review__form').toggle();
    })



    /* 1. Visualizing things on Hover - See next part for action on click */
    $('body #stars li').on('mouseover', function(){
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
    $('body #stars li').on('click', function(){
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





    function responseMessage(msg) {
        $('body .success-box').fadeIn(200);
        $('body .success-box div.text-message').html("<span>" + msg + "</span>");
    }


    $('body').on('click','.info__link',function (e) {
        e.preventDefault();
        var r = $(this).prev();
        if (r.hasClass('info__hide')) {
            r.toggle();
        }

    })


});