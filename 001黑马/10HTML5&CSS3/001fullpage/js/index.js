$(function () {
    $('.container').fullpage({
        sectionsColor: ["#fadd67", "#84a2d4", "#ef674d", "#ffeedd", "#d04759", "#84d9ed", "#8ac060"],
        verticalCentered: false,
        navigation: true,
        afterLoad: function (link, index) {
            $('.section').eq(index - 1).addClass('now');
        },
        onLeave: function (index, nextIndex, dirtction) {
            var currentSection = $('.section').eq(index-1);
            if (index == 2 && nextIndex == 3) {
                currentSection.addClass('leaved');
            } else if (index == 3 && nextIndex == 4) {
                currentSection.addClass('leaved');
            } else if (index == 5 && nextIndex == 6) {
                /*当前是从第五页到第六页*/
                /*currentSection.removeClass('now').addClass('leaved');*/
                currentSection.addClass('leaved');
                $('.screen06 .box').addClass('show');
            }
        },
        afterRender: function () {
            $('.more').on('click', function () {
                $.fn.fullpage.moveSectionDown();
            });
            $('.screen04.now .cart').on('transitionend', function () {
                $('.screen04 .address').show().find('img:last').fadeIn(1000);
                $('.screen04 .text').addClass('show');
            })
        },
        scrollingSpeed: 1000
    });
});