$(document).ready(function($){

    var portfolio = {
        list : $('.portfolio ul li'),
        imageFirstLarge12 : $('.image-content .large-12:first-child .large-6'),
        carouselFirstMotion : $('.image-content.motion .large-12:first-child .large-3'),
        carouselSecondMotion : $('.image-content.motion .large-12:last-child .large-3'),
        carouselFirstPrint : $('.image-content.print .large-12:first-child .large-3'),
        carousel : $('#carousel-portfolio.carousel'),
        carouselItem : $('#carousel-portfolio .item'),
        carouselContent : $('#carousel-portfolio .carousel-inner'),
        descriptionContent :  $('.description-detail-content'),
        descriptionContentImage : $('.description-detail-content .large-6'),
        vimeoPlayerHeader : $('.vimeo-player'),
        webVimeoPlayer : $('.web-video-player')
    };
    var illustration = {
        item : $('.illustration-content ul li'),
        large6 : $('.illustration .large-6'),
        second : $('.illustration .secondIllustration'),
        large3inside : $('.illustration .large-3.end .second'),
        large3End : $('.illustration .large-3.end'),
        carousel : $('#carousel-illustration.carousel'),
        list : $('.illustration-content'),
        image : $('.imageIllustration'),
        carouselItem : $('#carousel-illustration .item'),
        carouselContent : $('#carousel-illustration .carousel-inner')
    };
    var aboutCircle = $('.about div.circle');
    var contact = {
        textarea : $('.contact textarea'),
        input : $( ".contact input" ),
        textPrefix : $('.contact .text .prefix'),
        imputName : ''
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
    portfolio.list.height(portfolio.list.width() * 0.96);
    $.each( portfolio.list, function(){
        $(this).find('.image').height( $(this).height() - $(this).find('.information').height());
    });
    $.each( $('.image-vimeo'), function(){

        var id = $(this).attr("data-id");var url = "http://vimeo.com/api/v2/video/" + id + ".json?callback=showThumb";
        var $content = $(this).find('.image');

        $.ajax({
            type:'GET',
            url: 'http://vimeo.com/api/v2/video/' + id + '.json',
            jsonp: 'callback',
            dataType: 'jsonp',
            success: function(data){

                var thumbnail_src = data[0].thumbnail_large;
                $content.css('background-image', 'url("' + thumbnail_src + '")');

            }
        });

    });

    // carousel portfolio
    $.each( $('.carousel-works .image'), function(){
        $(this).height( $(this).width() );
    });
    $.each( $('.carousel-works .second-image'), function(){
        $(this).height( $(this).parent().find('.large-3').width() );
    });
    portfolio.carouselFirstMotion
        .css("margin-top", portfolio.imageFirstLarge12.height() - portfolio.carouselFirstMotion.height() );
    portfolio.carouselSecondMotion
        .css("margin-top",
            $('.image-content .large-12:last-child .large-6').height() - portfolio.carouselSecondMotion.height() );

    portfolio.carouselFirstPrint
        .css("margin-top", portfolio.imageFirstLarge12.height() - portfolio.carouselFirstPrint.height() );

    portfolio.descriptionContentImage
        .css( 'margin-right', portfolio.descriptionContent.width() - portfolio.descriptionContentImage.width() - 5 );

    portfolio.descriptionContentImage
        .css( 'margin-top',
            portfolio.descriptionContent.height() -
            portfolio.descriptionContentImage.height() -
            $('.description-detail').height() );

    portfolio.vimeoPlayerHeader.height(  portfolio.vimeoPlayerHeader.width() / 1.79 );
    portfolio.webVimeoPlayer.height(  portfolio.webVimeoPlayer.width() / 1.79 );

    var countCarousel = 0;
    $.each( $('.carousel-works'), function(){
        $(this).detach().appendTo(portfolio.carouselContent.find('[data-slide="'+countCarousel+'"]'));
        ++countCarousel;
    });

    portfolio.carousel.carousel({
        interval: false
    }).on('slide.bs.carousel', function () {

    });

    // For Illustration
    illustration.large3inside.height(illustration.large3inside.width());
    illustration.large6.height(illustration.large6.width());
    illustration.large3End.height(illustration.large6.width());
    illustration.second.height(illustration.large6.height());
    $('.illustration .secondIllustration .imageIllustration')
        .height(illustration.second.height() - $('.illustration .secondIllustration .information').height() - 20 );
    $('.illustration .second:last-child')
        .css("margin-top", illustration.large6.height() - (illustration.large3inside.height() * 2) );
    $('.illustration .cover-close').height( illustration.large6.height() + 20);

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

    illustration.image.click( function() {

        var id = $(this).attr('data-id');
        illustration.carouselContent.find('[data-slide="'+id+'"]').addClass('active');
        illustration.carousel.show();
        illustration.list.hide();

        illustration.carouselItem.width(illustration.carouselItem.width());
        $('.carousel img').magnify();

    });

    portfolio.list.click( function() {

        var id = $(this).index();
        portfolio.carouselContent.find('[data-slide="'+id+'"]').addClass('active');
        portfolio.carousel.show();
        portfolio.list.hide();

    });

    // function
    var scroll = function(url) {

        $.smoothScroll({

            scrollElement: $('.scroll-area'),
            scrollTarget: url

        });

    };

});