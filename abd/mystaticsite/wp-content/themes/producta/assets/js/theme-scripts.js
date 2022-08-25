(function($){
	"use strict";	
    $(document).ready(function(){

        if ($('body').length ) { $('body').fitVids(); }
        $('select').chosen();
        //SLide
        init_carousel();

        $('.menu-touch').on('click',function(){
            $(this).toggleClass('active');
            $('.header-mainmenu .producta-main-nav').slideToggle();
        });

        $('.producta-main-menu').children().last().focusout( function() {
            $('.producta-main-nav').removeAttr('style');
            $('.menu-touch').removeClass('active');
        } );

        // Function Producta
        producta_main_menu();


        $(document).scroll(function () {
            var scroll = $(this).scrollTop();
            var topFixed = $('.header').outerHeight();
            if (scroll > topFixed) {
                $('.header').addClass("header-fade");
            } else {
                $('.header').removeClass("header-fade");
            }

        });
});
    /* ---------------------------------------------
     Owl carousel
    --------------------------------------------- */
    function init_carousel()
    {
        $('.owl-carousel').each(function(){
            var config = $(this).data();
            config.navText = ['<i class="arrow-left">&larr;</i>','<i class="arrow-right">&rarr;</i>'];
        
            var animateOut = $(this).data('animateout');
            var animateIn = $(this).data('animatein');
            if(typeof animateOut != 'undefined' ){
              config.animateOut = animateOut;
            }
            if(typeof animateIn != 'undefined' ){
              config.animateIn = animateIn;
            }
            
            config.smartSpeed = 1000;

            var owl = $(this);
            owl.owlCarousel(config);

        });
    }
    //SHOW SUB MENU
    function producta_main_menu()
    {
        //Add caret 
        $('.producta-main-menu li.menu-item-has-children > a,.producta-main-menu li.page_item_has_children > a').wrap('<div class="wrap-linkmenu"></div>')
        $('.producta-main-menu li.menu-item-has-children .wrap-linkmenu,.producta-main-menu li.page_item_has_children .wrap-linkmenu').append( '<div class="icon-dropdown"><i class="fas fa-caret-down"></i></div>' );

        //Click
        $('.producta-main-menu li.menu-item-has-children > .wrap-linkmenu > .icon-dropdown,.producta-main-menu li.page_item_has_children > .wrap-linkmenu > .icon-dropdown').on('click',function(e){
            if( $(this).closest('li').hasClass('show-submenu') ){
                $(this).closest('li').removeClass('show-submenu');
                $(this).parent().removeClass('active');
            } else {
                $(this).closest('ul').children('li').removeClass('show-submenu');
                $(this).closest('ul').children('li').children('.active').removeClass('active');
                $(this).closest('li').toggleClass('show-submenu');
                $(this).parent().addClass('active');
            }
            return false;
        });
    }
    
})(jQuery);