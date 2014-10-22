$(document).ready(function($){

    $('#nav ul li a[href*=#]').click(function() {
        $url = $(this).attr('href');
        $.smoothScroll({
            scrollElement: $('.scroll-area'),
            scrollTarget: $url
        });
        return false;
    });

});