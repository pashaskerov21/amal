function custom_count() {
    var flag = true;
    $('.number-counter-section').each(function() {
        if ($(this).isInViewport()) {
            if (flag) {
                var $odometers = $(this).find('.odometer');
                $odometers.each(function() {
                    var count = $(this).data('count');
                    $(this).text(count);
                });
                flag = false;
            }
        } else {}
    });
}

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(document).ready(function() {
    custom_count();

    $(window).on("resize", function() {
        custom_count();
    });

    $(window).on("scroll", function() {
        custom_count();
    });
});