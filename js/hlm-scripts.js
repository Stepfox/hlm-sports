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

    
    

  //scroll effects
    $(window).scroll(function() {
        var hlm_magazinetop = $(this).scrollTop();
        var hlm_magazineheight = $(this).height();
        var hlm_magazinebottom = hlm_magazinetop + hlm_magazineheight;
        $('#main .hlm-sports-widget').each(function() {
            var geget = $(this).offset().top;
            if (hlm_magazinebottom > geget && geget > hlm_magazineheight) {
                $(this).find('.widget').addClass('widgetfx-2');
            }
        });
    });

//all odds dropdown on match page
  $('.single-match .all-odds').not('#winner').hide();
  $('#dropDown').change(function(){
   $(this).find("option").each(function(){
      $('#' + this.value).hide();
    });
    $('#' + this.value).show();
});

// Header 


$(".top-menu ul li").mouseover(function(){
   $(this).find(".sub-menu").not(".sub-menu .sub-menu").stop(true, true).delay(200).slideDown(200);
});

$(".top-menu ul li .sub-menu li").mouseover(function(){
   $(this).find(".sub-menu").stop(true, true).delay(200).slideDown(200);
});

$(".top-menu ul > li").mouseout(function(){
   $(this).find(".sub-menu").stop(true, true).delay(200).slideUp(200);
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

    $(".post-page-area nav a").click(function(e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top - 200},'slow');
    });

$('.tax-sports a.read-more').click(function(e) {
     e.preventDefault();
    $('.tax-sports .post-title').css('max-height', '8800px');
    $(this).remove();
});

    //fixed-sidebar-last widget
    $(window).load(function() {

            var widgetaboveHeight = $('.one-part.post-page-area .hlm-sports-widget:last-child ').offset().top - ($('#wpadminbar').height() - 25);

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
                    if ($(window).scrollTop() > widgetaboveHeight - 125 ) {
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




//svg inline script

// jQuery('img').each(function(){

//     var $img = jQuery(this);
//     var imgID = $img.attr('id');
//     var imgClass = $img.attr('class');
//     var imgURL = $img.attr('src');

//     jQuery.get(imgURL, function(data) {
//         // Get the SVG tag, ignore the rest
//         var $svg = jQuery(data).find('svg');
//         console.dir($svg);

//         // Add replaced image's ID to the new SVG
//         if(typeof imgID !== 'undefined') {
//             $svg = $svg.attr('id', imgID);
//         }
//         // Add replaced image's classes to the new SVG
//         if(typeof imgClass !== 'undefined') {
//             $svg = $svg.attr('class', imgClass+' replaced-svg');
//         }

//         // Remove any invalid XML tags as per http://validator.w3.org
//         $svg = $svg.removeAttr('xmlns:a');

//         // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
//         if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
//             $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
//         }

//         // Replace image with new SVG
//         $img.replaceWith($svg);

//     }, 'xml');

// });






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




            $('.odds-prev').on('click', function(){
                $('.odds-widget-bookmakers').flexslider('prev');
                $('.odds-list').each(function() {
                    $(this).flexslider('prev');
                 });

                //return false;
            });
            
            $('.odds-next').on('click', function(){
                $('.odds-widget-bookmakers').flexslider('next');
                $('.odds-list').each(function() {
                    $(this).flexslider('next');
                 });
                return false;
            });

    //Gallery slider
    $(window).load(function() {
        $('.odds-widget-bookmakers').each(function() {

            function bookmakers_grid() {

                                return (window.innerWidth < 500) ? 2 : (window.innerWidth < 1024) ? 3 : 5;
                                
                            }

            $(this).flexslider({
                animation : 'slide',
                itemWidth: 166,
                itemMargin: 0,
                minItems: bookmakers_grid(),
                maxItems: bookmakers_grid(),
                move: 1,
                slideshow : false,
                controlNav: false,
                directionNav: false,
            });
            


        });
    });


    $(window).load(function() {
        $('.odds-list').each(function() {

            function odds_grid() {

                                return (window.innerWidth < 500) ? 2 : (window.innerWidth < 1024) ? 3 : 5;
                                
                            }

            $(this).flexslider({
                animation : 'slide',
                itemWidth: 166,
                itemMargin: 0,
                minItems: odds_grid(),
                maxItems: odds_grid(),
                move: 1,
                slideshow : false,
                controlNav: false,
                directionNav: false,
            });

        });
    });



});