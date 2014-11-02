$(document).ready(function($){

    $('#nav ul li a[href*=#]').click(function() {
        $url = $(this).attr('href');
        $.smoothScroll({
            scrollElement: $('.scroll-area'),
            scrollTarget: $url
        });
        return false;
    });

    $('.about div.circle').height($('.about div.circle').width());
    console.log($('.workExperience div.medium-6:last-child').height());
    $('.workExperience div.medium-6:first-child').height($('.workExperience div.medium-6:last-child').height());
});