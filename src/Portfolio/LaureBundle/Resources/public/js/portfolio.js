$(document).ready(function($){

    var portfolioList = $('.portfolio ul li');
    var illustration = {
        item : $('.illustration-content ul li'),
        large6 : $('.illustration .large-6'),
        second : $('.illustration .secondIllustration'),
        large3End : $('.illustration .large-3.end'),
        carousel : $('.carousel'),
        list : $('  .illustration-content')
    };
    var aboutCircle = $('.about div.circle');
    var contact = {
        textarea : $('.contact textarea'),
        input : $( ".contact input" ),
        textPrefix : $('.contact .text .prefix'),
        imputName : ''
    };
    var carousel = {
        item : $('.carousel .item'),
        content : $('.carousel-inner')
    };

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
    illustration.large6.height(illustration.large6.width());
    illustration.second.height(illustration.large6.height());
    $('.illustration .secondIllustration .imageIllustration').height(illustration.second.height() - $('.illustration .secondIllustration .information').height() - 20 );
    $.each( illustration.large3End, function(){
        $(this).height($(this).width());
    });
    $('.illustration .large-3.last').css("margin-top", illustration.large6.height() - (illustration.large3End.height() * 2) );
    var heightIllustration;
    if(illustration.large6){
        heightIllustration = illustration.large6.width();
    } else {
        heightIllustration = $('.illustration .large-3').width()
    }
    $('.illustration .cover-close').height( heightIllustration + 20);

    illustration.carousel.carousel({
        interval: false
    }).on('slide.bs.carousel', function () {

    });

    // For About
    aboutCircle.height(aboutCircle.width() - 20);
    $('.workExperience div.medium-6:first-child').height($('.workExperience div.medium-6:last-child').height());

    // For Contact
    contact.textPrefix.height(contact.textarea.height() + 16);
    contact.input.focusin(function() {
        contact.imputName = $(this).attr("class");
        $('.contact .'+contact.imputName+' .prefix').addClass('border');
    });

    contact.textarea.focusin(function() {
        contact.imputName = $(this).attr("class");
        $('.contact .'+contact.imputName+' .prefix').addClass('border');
    });

    contact.textarea.focusout(function() {
        $('.contact .'+contact.imputName+' .prefix').removeClass("border");
    });

    contact.input.focusout(function() {
        $('.contact .'+contact.imputName+' .prefix').removeClass("border");
    });

    contact.textarea.bind('mouseup mousemove', function() {
        contact.textPrefix.height($(this).height() + 16);
    });

    illustration.item.click( function() {

        carousel.content.find('[data-slide="'+$(this).index()+'"]').addClass('active');
        illustration.carousel.show();
        illustration.list.hide();

        carousel.item.width(carousel.item.width());
        $('.carousel img').magnify();

    });

    // function
    var scroll = function(url) {

        $.smoothScroll({

            scrollElement: $('.scroll-area'),
            scrollTarget: url

        });

    };

});