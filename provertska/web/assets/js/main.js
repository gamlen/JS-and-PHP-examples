$(document).ready(function(){
    $('.link-navigation-item[href="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    $('.field.search').click(function() {
        $('.search-bar').toggle( "fast", function() {
            $('.field.search').toggleClass('active-search');
        });
    });

    $('.dropdown-header').click(function(e){
        if(!$(this).parent().hasClass('ready-to-link')) {
            $('.navigation-item-arrow').removeClass('ready-to-link');
            $(this).parent().addClass('ready-to-link');
            e.preventDefault();
        } else {
            return true;
        }
    });

    $('.nav-toggle').click(function() {
        $('.navigation-header-list').toggleClass('toggle');
        $('.header-content.slider .slick-slider-image').toggleClass('toggled-nav');
    });

    $('.dropdown-header').click(function() {
        $('.navigation-item-arrow').addClass('active-link');
        $('.triangle-top, .subnavigation').css('display', 'block');
    });

    $('.dropdown-header').on('click', function(e) {
        $('.dropdown-header').toggleClass('ready-to-link');
    });
    $( document ).on('click', function(e) {
        if ($(e.target).is('.dropdown-header') === false) {
            $(".navigation-item-arrow").removeClass('ready-to-link active-link');
            $('.triangle-top, .subnavigation').css('display', 'none');
        }
    });

    $('.navigation-item-arrow').hover(function(){
        $('.triangle-top, .subnavigation').show();
    },function(){
        $('.triangle-top, .subnavigation').hide();
    });

    $(".progress").each(function () {
        var $bar = $(this).find(".bar");
        var $val = $(this).find("span");
        var perc = parseInt($val.text(), 10);

        $({p: 0}).animate({p: perc}, {
            duration: 3000,
            easing: "swing",
            step: function (p) {
                $bar.css({
                    transform: "rotate(" + (45 + (p * 1.8)) + "deg)", // 100%=180° so: ° = % * 1.8
                });
                $val.text(p | 0);
            }
        });
    });
});
