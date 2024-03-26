function custom_count(){
    var flag = true;
    $('.number-counter-section').each(function() {
        if ($(this).isInViewport()) {  
            if (flag) {
                var arr = [],
                i = 0;
                $('.progress_1 .odometer').each(function() {
                    arr[i++] = $(this).attr('data-count');;
                    odometer.innerText = arr[0]; 
                    odometer1.innerText = arr[1];
                    odometer2.innerText = arr[2]; 
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
    console.log(elementBottom > viewportTop && elementTop < viewportBottom);
};

$(document).ready(function() {

    custom_count();
    $(window).resize(function() {
        custom_count();
    });
    
    $(window).on("scroll",function(){
      custom_count();
    });
});
