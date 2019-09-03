require(['jquery'], function($) {
    $(document).ready(function() {
        let alphabeticalHeadings= $('.hero-categories__alphabetical-heading');
        let paginationList = $('.hero-categories__pagination');
        let headingForList = $('.heading');
        let triggers = $('.hero-categories__pagination a');
        let headingFilters = $('.hero-categories__alphabetical-heading h3');
        let filters = $('.hero-category__content a');

        headingForList.append('<div class="hero-categories__content"></div>');

        var width = $(window).width();
        $(window).on('resize', function() {
            if ($(this).width() !== width) {
                width = $(this).width();
            }

            paginationList.removeClass('collapsed');

            if (width > 721) {
                alphabeticalHeadings.appendTo('.hero-categories');
                alphabeticalHeadings.show();
            } else {
                alphabeticalHeadings.hide();
            }
        });

        if (width < 721) {
            alphabeticalHeadings.hide();
        }

        triggers.each(function() {
            let currentLetter = $(this).text().substr(0,1);
            let currentObject = $(this);
            filters.each(function() {
                if ($(this).text().substr(0,1) === currentLetter) {
                    currentObject.removeClass('empty-list');
                    return false;
                } else {
                    currentObject.addClass('empty-list');
                }
            });
        });

        headingFilters.each(function() {
            let headingBlock = $(this).parent().find('.hero-categories__content');
            let headingLetter = $(this).text().substr(0,1);
            filters.each(function() {
                let compareFirstLetters = $(this).text().substr(0,1);
                if (headingLetter === compareFirstLetters) {
                    $(this).parent().parent().appendTo(headingBlock);
                }
                if($.isNumeric(headingLetter) && $.isNumeric(compareFirstLetters)) {
                    $(this).parent().appendTo($('.heading.numbers-point'));
                }
            });
        });

        paginationList.click(function () {
            if (width < 721) {
                $(this).find('a:not(.empty-list)')[0].click();
            }
        });

        triggers.click(function() {
            let takeLetter = $(this).text().substr(0,1);
            headingFilters.parent().hide();
            filters.parent().hide();
            paginationList.removeClass('active-pagination');
            $(this).parent().parent().addClass('active-pagination');
            if (width < 721) {
                alphabeticalHeadings.appendTo('.active-pagination.collapsed');
            }

            headingFilters.each(function() {
                let headingLetter = $(this).text().substr(0,1);
                let className = $(this).parent().attr('class').split(' ')[1];
                let compareFirstLetter = $(this).text().substr(0,1);
                if (compareFirstLetter ===  takeLetter) {
                    $('.' + className).each(function () {
                        if (compareFirstLetter === takeLetter && $(this).find('.hero-category__content').length !== 0) {
                            $(this).show();
                        }
                    });
                }

                filters.each(function() {
                    let compareFirstLetters = $(this).text().substr(0,1);
                    if (headingLetter === compareFirstLetters) {
                        $('.heading .hero-category__content').show();
                    }
                });
            });
        });

        paginationList.click(function () {
            if (width < 721) {
                $(this).parent().find('ul').removeClass('collapsed');
                $(this).addClass('collapsed');
                alphabeticalHeadings.show();
                alphabeticalHeadings.insertAfter($(this));
            }
        });

        $('.hero-categories__pagination > li > a').click(function (e) {
            e.preventDefault();
            var anchorid = $(this.hash);

            if (anchorid.length === 0) {
                anchorid = $('a[name="' + this.hash.substr(1) + '"]');
            } else {
                anchorid = $('html');
            }

            if (anchorid.is(":visible") && $(window).width() > 721) {
                $('html, body').animate({scrollTop: -80 + anchorid.offset().top}, 450);
            }
        });

        headingForList.hide().slice(0, 3).show();
    });
});
