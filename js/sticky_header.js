require(['jquery'], function($) {
    $(document).ready(function() {

        let upperHeader = $('.panel-wrapper');
        let upperHeaderHeight =  upperHeader.height();
        let notStickyMenu = '.header-menu-wrapper';
        let stickyMenu =  $('.header.content');
        let stickyClasses = '.logo, .header-buttons, .block-search, .header-menu-wrapper, .panel-wrapper, .page-header, .header-content-wrapper, .header-content-wrapper .sticky, .header.content';
        let fullPage = $('.page-wrapper');
        let main = $('.page-main');

        if((fullPage).find('.page-title-wrapper').length > 0) {
            main.css('margin-top', 0);
        }

        $(window).scroll(function(){
            let scroll = $(window).scrollTop();

            if(scroll > upperHeaderHeight + 40) {
                $(notStickyMenu).appendTo(stickyMenu);
                $(stickyClasses).addClass('is-sticky');
            } else {
                $(notStickyMenu).appendTo($('.page-header'));
                $(stickyClasses).removeClass('is-sticky');
            }
        });
    });
});
