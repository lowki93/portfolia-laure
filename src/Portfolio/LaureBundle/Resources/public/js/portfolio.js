$(document).ready(function($){
    var imputName;

    $('#nav ul li a[href*=#]').click(function() {
        scroll($(this).attr('href'));
        return false;
    });

    $('a.goToPorfolio[href*=#]').click(function() {
        scroll($(this).attr('href'));
        return false;
    });

    // for more button
    $('.open-cover').click( function() {
        $(this).parent("div").parent("div").find(".cover-close").height('auto');
    });

    // For Portfolio
    $('.portfolio ul li').height($('.portfolio ul li').width() * 0.96);
    $.each( $('.portfolio ul li.video'), function(){
        $(this).find('.image').height( $(this).height() - $(this).find('.information').height());
    });

    // For Illustration
    $('.illustration .large-6').height($('.illustration .large-6').width())
    $('.illustration .secondIllustration').height($('.illustration .large-6').height());
    $('.illustration .secondIllustration .imageIllustration').height($('.illustration .secondIllustration').height() - $('.illustration .secondIllustration .information').height() - 20 );
    $.each( $('.illustration .large-3.end'), function(){
        $(this).height($(this).width());
    });
    $('.illustration .large-3.last').css("margin-top", $('.illustration .large-6').height() -  ($('.illustration .large-3.end').height() * 2) );
    $('.illustration .cover-close').height($('.illustration .large-6').width() + 20);

    // For About
    $('.about div.circle').height($('.about div.circle').width() - 20);
    $('.workExperience div.medium-6:first-child').height($('.workExperience div.medium-6:last-child').height());

    // For Contact
    $('.contact .text .prefix').height($('textarea').height() + 16);
    $( ".contact input" ).focusin(function() {
        imputName = $(this).attr("class");
        $('.contact .'+imputName+' .prefix').addClass('border');
    });

    $( ".contact textarea" ).focusin(function() {
        imputName = $(this).attr("class");
        $('.contact .'+imputName+' .prefix').addClass('border');
    });

    $('.contact textarea').focusout(function() {
        $('.contact .'+imputName+' .prefix').removeClass("border");
    });

    $('.contact input').focusout(function() {
        $('.contact .'+imputName+' .prefix').removeClass("border");
    });

    $('textarea').bind('mouseup mousemove', function() {
        $('.contact .text .prefix').height($(this).height() + 16);
    });
});

var scroll = function(url) {

    $.smoothScroll({

        scrollElement: $('.scroll-area'),
        scrollTarget: url

    });

};