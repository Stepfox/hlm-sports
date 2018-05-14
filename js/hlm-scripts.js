jQuery(document).ready(function($) {
    "use strict";
    $('#header .top-menu .menu-item-has-children').append('<span class="subsignmeni"></span>');
    function mobile_menu_sub() {
        if ($(window).width() < 850) {
            $('.subsignmeni').off().on('click', function() {
                $(this).prev('.sub-menu').slideToggle(100).toggleClass('mob-cat');
            });
        }
    }
    mobile_menu_sub();
    $(window).resize(mobile_menu_sub);


    //menu button for responsive mobile
    $("#header .mob-menu-button").click(function() {
        $(".top-menu").toggleClass("active");
        $(".mob-menu-button").toggleClass("active");
        $('body').toggleClass("mob-menu-active");
    });

// Header 
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       // downscroll codeconso

       $('#nav-wrapper').slideUp(100);
       $('.hlm-sports-widget.fixed-widget').addClass('upmenu');

   } else {
      // upscroll code

       $('#nav-wrapper').slideDown(100);
       $('.hlm-sports-widget.fixed-widget').removeClass('upmenu');

   }
   lastScrollTop = st;

});


    //sidebar height
 if ($('.one-part.post-page-area .widget').length) {  
    function sidebarheight() {
            var fullsize = $('#main').width();
            var primaryheight = $('.three-parts.post-page-area').height();
            if (fullsize > 964) {
                $('.one-part.post-page-area').css('min-height', primaryheight);
            } else {
                $('.one-part.post-page-area').css('min-height', 0);
            }
    }

    $(window).on('load', function() {
            setTimeout(function() { sidebarheight();}, 200);
    });
    
    var resizeTimer;
    $(window).on('resize', function(e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            sidebarheight();
        }, 200);
    });

    //fixed-sidebar-last widget
    $(window).load(function() {

            var widgetaboveHeight = $('.one-part.post-page-area .hlm-sports-widget:last-child ').offset().top - ($('#wpadminbar').height() + 113);

            var primaryheight = $('.three-parts.post-page-area').height();
            var secondaryheight = 0;
            $('.one-part.post-page-area .hlm-sports-widget').each(function() {
                secondaryheight = $(this).height();
            });
            //fixed widget in .one-part.post-page-area area           
            $(window).scroll(function() {       
                if (primaryheight - secondaryheight < 0 ) {
                    $('.one-part.post-page-area .fixed-widget').css('position', 'relative');
                    $('.one-part.post-page-area .hlm-sports-widget:last-child ').css('top', '0');
                } else {
                    if ($(window).scrollTop() > widgetaboveHeight ) {
                        $('.one-part.post-page-area .hlm-sports-widget:last-child').addClass('fixed-widget');
                    } else {
                        $('.one-part.post-page-area .hlm-sports-widget:last-child ').removeClass('fixed-widget');
                    }
                }
            });

    });

    function fixedwidgetwidth() {
        var secondarywidth = $('.one-part.post-page-area').width();
        $('.one-part.post-page-area .hlm-sports-widget:last-child ').css('max-width', secondarywidth);
    }
    fixedwidgetwidth();
    $(window).resize(fixedwidgetwidth);
}







        $('.parallax-background').each(function(){
            var parallax = $(this); 

            
        $(window).scroll(function() {       
            var scrollTop = $(window).scrollTop();  
            var scrollPercent = (scrollTop  / $(window).height()) * 40;
        
            // Move the image
            parallax.css({top: scrollPercent});
        });         
        
    }); 










    $('.category-page').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('.blog-post').append('<div class="more-posts"></div>');
        $('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
        $('.more-posts').load(link + ' .blog-post li, .pagination', function() {
            $('.more-posts li').hide().detach().appendTo('.blog-post ul').css('opacity', '0').fadeIn().fadeTo('slow', 1);
            $('.more-posts .pagination').css('opacity', '0').detach().appendTo('.blog-post').fadeTo('slow', 1);
            $('.more-posts').remove();
            $('.load-content').remove();
        });
    });








});