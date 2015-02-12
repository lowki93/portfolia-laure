$(document).ready(function($){

    var
        imputName,
        portfolioList,
        illustrationLarge6,
        illustrationLarge3End,
        illustrationSecond,
        aboutCircle,
        contactTextarea,
        contactInput,
        contactTextPrefix;

    portfolioList = $('.portfolio ul li');
    illustrationLarge6 = $('.illustration .large-6');
    illustrationSecond = $('.illustration .secondIllustration');
    illustrationLarge3End = $('.illustration .large-3.end');
    aboutCircle = $('.about div.circle');
    contactTextarea = $('.contact textarea');
    contactInput = $( ".contact input" );
    contactTextPrefix = $('.contact .text .prefix');

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
    portfolioList.height(portfolioList.width() * 0.96);
    $.each( $('.portfolio ul li.video'), function(){
        $(this).find('.image').height( $(this).height() - $(this).find('.information').height());
    });

    // For Illustration
    illustrationLarge6.height(illustrationLarge6.width());
    illustrationSecond.height(illustrationLarge6.height());
    $('.illustration .secondIllustration .imageIllustration').height(illustrationSecond.height() - $('.illustration .secondIllustration .information').height() - 20 );
    $.each( illustrationLarge3End, function(){
        $(this).height($(this).width());
    });
    $('.illustration .large-3.last').css("margin-top", illustrationLarge6.height() - (illustrationLarge3End.height() * 2) );
    var heightIllustration;
    if(illustrationLarge6){
        heightIllustration = illustrationLarge6.width();
    } else {
        heightIllustration = $('.illustration .large-3').width()
    }
    $('.illustration .cover-close').height( heightIllustration + 20);

    // For About
    aboutCircle.height(aboutCircle.width() - 20);
    $('.workExperience div.medium-6:first-child').height($('.workExperience div.medium-6:last-child').height());

    // For Contact
    contactTextPrefix.height(contactTextarea.height() + 16);
    contactInput.focusin(function() {
        imputName = $(this).attr("class");
        $('.contact .'+imputName+' .prefix').addClass('border');
    });

    contactTextarea.focusin(function() {
        imputName = $(this).attr("class");
        $('.contact .'+imputName+' .prefix').addClass('border');
    });

    contactTextarea.focusout(function() {
        $('.contact .'+imputName+' .prefix').removeClass("border");
    });

    contactInput.focusout(function() {
        $('.contact .'+imputName+' .prefix').removeClass("border");
    });

    contactTextarea.bind('mouseup mousemove', function() {
        contactTextPrefix.height($(this).height() + 16);
    });

    $('.carousel').carousel({
        interval: false
    });
    $('.carousel img').magnify();

});

var scroll = function(url) {

    $.smoothScroll({

        scrollElement: $('.scroll-area'),
        scrollTarget: url

    });

};