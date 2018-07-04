jQuery(document).ready(
    function($) {
        "use strict";

var slide_picker = 'slide';
        $(window).load(function() {
        $('#main').fadeTo(1000, 1);
        });

        $('#secondary .home-widget').each(function() {
            $(this).removeClass('two-parts three-parts four-parts').addClass('one-part')
        });

        //wp-widgets width
        $('.widget_text, .widget_recent_comments, .widget_recent_entries, .widget_calendar, .widget_nav_menu, .widget_pages, .widget_archive, .widget_links, .widget_meta, .widget_tag_cloud, .widget_rss, .widget_search, .widget_categories, .woocommerce, .widget[id*=bbp_], .widget[id*=bp_]').each(function() {
            $(this).closest('.home-widget').addClass('one-part');
        });

            //Masonry script
            if ($('#fullwidth').length) {
                var fullwidthmas = $('#fullwidth').masonry({
                    columnWidth: function(containerWidth) {
                        return containerWidth / 4;
                    },
                    itemSelector: '.home-widget',
                    animationOptions: {
                        duration: 200
                    }
                });
                fullwidthmas.imagesLoaded(function() {
                    setTimeout(function() {
                        fullwidthmas.masonry();
                    }, 500);
                });
                $(window).load(function() {
                setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                });              
                $(window).resize(function() {
                    setTimeout(function() {
                        fullwidthmas.masonry();
                    }, 500);
                });
            }

            
        //responsive widgets layout
        function checkWidth() {
            if ($('#fullwidth').length) {
            var fullsize = $('#main').width();           

            if(fullsize < 984 && fullsize > 631){
                if ($('#fullwidth').hasClass('tablet-response')){                   
                }else{
                var divClone = $('#fullwidth .one-part').clone().addClass('clone-masonry-res');
                $('#fullwidth .one-part').hide();
                divClone.appendTo('#fullwidth');
                $('#fullwidth').addClass('tablet-response');
                  }         
                }
            else if(fullsize < 631){
                if ($('#fullwidth').hasClass('tablet-response')){
                    $( ".clone-masonry-res" ).remove();
                    $('#fullwidth .one-part').show();
                    $('#fullwidth').removeClass('tablet-response');
                }
                }   
            else if (fullsize > 984){ 
                if ($('#fullwidth').hasClass('tablet-response')){
                    $( ".clone-masonry-res" ).remove();
                    $('#fullwidth .one-part').show();
                    $('#fullwidth').removeClass('tablet-response');
                }
                }
                

                setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                
            }}
            checkWidth();
            $(window).resize(checkWidth);


        //tabber

        if ($('.tabber-container').length) {
            //tabs
            $('.tabber-container').each(function() {
                $(this).find(".tabber-content").hide();
                $(this).find("ul.tabs li:first").addClass("active").show();
                $(this).find(".tabber-content:first").show();
            });
            $("ul.tabs li").click(
                function(e) {
                    $(this).parents('.tabber-container').find("ul.tabs li")
                        .removeClass("active");
                    $(this).addClass("active");
                    $(this).parents('.tabber-container').find(
                        ".tabber-content").hide();
                    var activeTab = $(this).find("a").attr("href");
                    $(this).parents('.tabber-container').find(activeTab)
                        .fadeIn();
                    e.preventDefault();
                });
            $("ul.tabs li a").click(function(e) {
                e.preventDefault();
            });
        }
        //ticker

        function tick() {
            var first_tick = $("ul.ticker-list li:first").width();
            $("ul.ticker-list li:first").animate({
                marginLeft: -first_tick
            }, 800, function() {
                $(this).detach().appendTo("ul.ticker-list").removeAttr("style");
                var first_tick = $("ul.ticker-list li:first").width();
            });
        }

        function tak() {
            var last_tick = $("ul.ticker-list li:last-child").width();
            $("ul.ticker-list li:first").animate({
                marginLeft: last_tick
            }, 800, function() {
                $("ul.ticker-list li:last-child").detach().prependTo("ul.ticker-list");
                $("ul.ticker-list li").removeAttr("style");
                var last_tick = $("ul.ticker-list li:last-child").width();
            });
        }
        $('.ticker-right').click(function() {
            tick();
        });
        $('.ticker-left').click(function() {
            tak();
        });

        var interval = setInterval(tick, 5000);

        $('ul.ticker-list li, .ticker-left, .ticker-right').hover(function() {
            clearInterval(interval);
        }, function() {
            interval = setInterval(tick, 5000);
        });
		
 		$(window).load(function() {
        function ticket_width() {
            $('#ticker-list-box').css('width', $('#ticker').width() - $('.ticker-heading').outerWidth() - 20);
        }
        ticket_width();
        $(window).resize(ticket_width);
		});
		
        //share-icons

        function sharewidthresponsive() {
            var sharewidthfull = $('.share-post').outerWidth(true);
            var sharewidth = $('.share-title').outerWidth(true);
            $('.share-post ul').css('width', sharewidthfull - sharewidth - 2);
        };
        sharewidthresponsive();
        $(window).resize(sharewidthresponsive);

        //fixed-menu	
        var aboveHeight = $('#nav-wrapper').offset().top;
        $(window).scroll(function() {
            if ($(window).scrollTop() > aboveHeight) {
                $('.show-menu').addClass('fixed-menu');
            } else {
                $('.show-menu').removeClass('fixed-menu');
            }
        });


        //fixed-floating-share    
        if ($('.floating-share-icons').length) {
        $('.floating-share-icons').height($('#post-content').height());
        $(window).scroll(function() {
        $('.floating-share-icons').height($('#post-content').height());
        var above = ($('.floating-share-icons').offset().top) - ($('#wpadminbar').height() + $('#nav-wrapper .fixed-menu').height());
            if ($(window).scrollTop() - above > 0 && ($(window).scrollTop() - above) - ($('#post-content').height() - $('.floating-share-icons ul').height() - $('#wpadminbar').height() - 20) < 0){

                    $('.floating-share-icons ul').css('position','fixed').css('top', $('#nav-wrapper .fixed-menu').height()+ $('#wpadminbar').height() + 20).css('bottom', 'auto');

            } else if ($(window).scrollTop() - above > 0 && ($(window).scrollTop() - above) - ($('#post-content').height() - $('.floating-share-icons ul').height() - $('#wpadminbar').height() - 20) > 0) {

                    $('.floating-share-icons ul').css('position','absolute').css('top','auto').css('bottom', '0');
            }else{
                $('.floating-share-icons ul').css('position','absolute').css('top', 20).css('bottom', 'auto'); 
            }
        });
        }


        //sidebar height

        function sidebarheight() {
            $(window).load(function() {
                var fullsize = $('#wrapper').width();
                var primaryheight = $('#primary').height();
                if (fullsize > 1024) {
                    $('#secondary').css('min-height', primaryheight);
                } else {
                    $('#secondary').css('min-height', 0);
                }

            });
        }
		$(window).load(function() {
			setTimeout(function() {
                         sidebarheight();
                    }, 500);
       
		});
        $(window).resize(sidebarheight);

        //fixed-sidebar-last widget

        $(window).load(function() {
            if ($('#secondary.stickylastwidget .home-widget:last-child').length) {

                var widgetaboveHeight = $('#secondary .home-widget:last-child ').offset().top - ($('#wpadminbar').height() + $('#nav-wrapper .show-menu').height());
                if ($('#navigation').hasClass('show-menu')) {
                    $('#secondary .home-widget:last-child').addClass('navigation-has-menu');
                }

                var primaryheight = $('#primary').height();
                var secondaryheight = 0;
                $('#secondary .home-widget').each(function() {
                    secondaryheight = $(this).height();
                });


                //fixed widget in #secondary area			
                $(window).scroll(function() {

                    if (primaryheight - secondaryheight < 0) {
                        $('#secondary .fixed-widget').css('position', 'relative');
                        $('#secondary .home-widget:last-child ').css('top', '0');

                    } else {
                        if ($(window).scrollTop() > widgetaboveHeight) {
                            $('#secondary .home-widget:last-child').addClass('fixed-widget');
                        } else {
                            $('#secondary .home-widget:last-child ').removeClass('fixed-widget');
                        }

                        if ($('#footer').offset().top - ($(window).scrollTop() + $('.fullwidth ').not('.popular-part').height() + $('#secondary .home-widget:last-child').height() + $('#navigation.fixed-menu').height() + $('.footer-advert').outerHeight() + 80) < 0) {
                            $('#secondary .home-widget:last-child ').css('top', $('#footer').offset().top - ($(window).scrollTop() + $('.fullwidth ').not('.popular-part').height() + $('#secondary .home-widget:last-child').height() + $('.footer-advert').outerHeight() + 80));
                        } else {
                            $('#secondary .home-widget:last-child ').css('top', '')
                        }
                    }
                });
            };
        });

        function fixedwidgetwidth() {
            var secondarywidth = $('#secondary').width();
            $('#secondary .home-widget:last-child ').css('max-width', secondarywidth);
        }
        fixedwidgetwidth();
        $(window).resize(fixedwidgetwidth);




        //scroll effects

        $(window).scroll(function() {
            var exm1top = $(this).scrollTop();
            var exm1height = $(this).height();
            var exm1bottom = exm1top + exm1height;


            $('.score-line').each(function() {

                var geget = $(this).offset().top;
                if (exm1bottom > geget && geget > exm1height) {
                    $(this).find('.score-width').addClass('active');
                }
            });
        });

        //carousel
        if ($('.carousel').length) {
            $(window).load(function() {
                $('.carousel').each(function() {
                    function normalcarousel_grid() {
                        return (window.innerWidth < 700) ? 2 :
                            (window.innerWidth < 1024) ? 3 : carouselitems;
                    }
                    $(window).resize(function() {
                        var gridSize = normalcarousel_grid();
						$('.carousel').each(function() {
							$(this).data('flexslider').vars.minItems = gridSize;	
						});
						$('.carousel').each(function() {
							$(this).data('flexslider').vars.maxItems = gridSize;	
						});
						$('.carousel').each(function() {
							$(this).data('flexslider').vars.move = gridSize;	
						});
                    });
                    var widget_size = $(this).closest('.home-widget');

                    if ($(widget_size).hasClass('one-part')) {
                        var carouselitems = 2;
                    } else if ($(widget_size).hasClass('two-parts')) {
                        var carouselitems = 3;
                    } else if ($(widget_size).hasClass('three-parts')) {
                        var carouselitems = 4;
                    } else if ($(widget_size).hasClass('four-parts')) {
                        var carouselitems = 5;
                    }


                    $(this).flexslider({

                        animation: 'slide',
                        itemWidth: 210,
                        itemMargin: 10,
                        minItems: normalcarousel_grid(),
                        maxItems: normalcarousel_grid(),
                        move: normalcarousel_grid(),
                        slideshow: false,
                        controlNav: false,
                        directionNav: true,
                        start: function(slider) {
                            slider.fadeTo(1000, 1);
                            slider.removeClass('loading');
                        },
                        after: function(slider) {
                            slider.resize();
                        }
                    });
                });
            });
        }


        //tv-widget carousel
        if ($('.tv-ajax-carousel').length) {
            $(window).load(function() {
                $('.tv-ajax-carousel').each(function() {
                    function ajaxcarousel_grid() {
                        return (window.innerWidth < 700) ? 2 :
                            (window.innerWidth < 1024) ? 3 : carouselitems;
                    }
                    $(window).resize(function() {
                        var gridSize = ajaxcarousel_grid();
						$('.tv-ajax-carousel').each(function() {
							$(this).data('flexslider').vars.minItems = gridSize;	
						});
						$('.tv-ajax-carousel').each(function() {
							$(this).data('flexslider').vars.maxItems = gridSize;	
						});
						$('.tv-ajax-carousel').each(function() {
							$(this).data('flexslider').vars.move = gridSize;	
						});
                    });
                    var widget_size = $(this).closest('.home-widget');

                    if ($(widget_size).hasClass('one-part')) {
                        var carouselitems = 2;
                    } else if ($(widget_size).hasClass('two-parts')) {
                        var carouselitems = 3;
                    } else if ($(widget_size).hasClass('three-parts')) {
                        var carouselitems = 4;
                    } else if ($(widget_size).hasClass('four-parts')) {
                        var carouselitems = 6;
                    }


                    $(this).flexslider({

                        animation: 'slide',
                        itemWidth: 410,
                        itemMargin: 10,
                        minItems: ajaxcarousel_grid(),
                        maxItems: ajaxcarousel_grid(),
                        move: ajaxcarousel_grid(),
                        slideshow: false,
                        controlNav: false,
                        directionNav: true,
                        start: function(slider) {

                        },
                        after: function(slider) {
                            slider.resize();
                        }
                    });
                });
            });
        }


        //video type page carousel
        if ($('.tv-carousel').length) {
            var tv_carousel;



            $(window).load(function() {
                function tv_carousel_grid() {
                    return (window.innerWidth < 700) ? 2 :
                        (window.innerWidth < 1024) ? 3 : 5;
                }
                $('.tv-carousel').flexslider({
                    animation: 'slide',
                    itemWidth: 210,
                    itemMargin: 10,
					useCSS: false,
                    minItems: tv_carousel_grid(),
                    maxItems: tv_carousel_grid(),
                    move: tv_carousel_grid(),
                    slideshow: false,
                    controlNav: false,
                    directionNav: true,
                    start: function(slider) {
                        tv_carousel = slider;
                    },
                    after: function(slider) {
                        tv_carousel.resize();
                    }
                });

                $(window).resize(function() {
                    var gridSize = tv_carousel_grid();
                    tv_carousel.vars.minItems = gridSize;
                    tv_carousel.vars.maxItems = gridSize;
                });


            });
        }


        //type pages ajax
        $('.term-post-format-video').on('click', '.ajax', function(e) {
            e.preventDefault();
            var post_id = $(this).attr("data-number");

            jQuery.ajax({
                post: post_id,
                type: "POST",
                data: {
                    id: post_id
                },
                success: function(output) {
                    $(".tv-video-wrapper").replaceWith($('.tv-video-wrapper', output));
                    $(".tv-format-title").replaceWith($('.tv-format-title', output));
                    $(".tv-format-subtitle").replaceWith($('.tv-format-subtitle', output));
                }
            });
        });



        $(window).load(function() {
            $('.term-post-format-gallery').on('click', '.ajax', function(e) {
                e.preventDefault();
                var post_id = $(this).attr("data-number");

                jQuery.ajax({
                    post: post_id,
                    type: "POST",
                    data: {
                        id: post_id
                    },
                    success: function(output) {
                        $(".tv-video-wrapper").replaceWith($('.tv-video-wrapper', output));
                        $(".tv-format-title").replaceWith($('.tv-format-title', output));
                        $(".tv-format-subtitle").replaceWith($('.tv-format-subtitle', output));
                        $('.post-page-gallery-thumbnails').flexslider({
                            animation: 'slide',
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: 166,
                            itemMargin: 0,
                            minItems: 4,
                            maxItems: 4,
                            move: 4,
                            directionNav: true,
                            asNavFor: '.post-page-gallery-slider',
                            start: function(slider) {
                                slider.fadeTo(1000, 1);
                                slider.removeClass('loading');
                            }
                        });

                        $('.post-page-gallery-slider').flexslider({
                            animation: slide_picker,
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            sync: '.post-page-gallery-thumbnails',
                            start: function(slider) {
                                slider.fadeTo(1000, 1);
                                slider.removeClass('loading');
                            }
                        });
                    }
                });
            });
        });

        $('.term-post-format-video, .term-post-format-gallery').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            $('.tv-page-widget').append('<div class="more-posts"></div>');
            $('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $('.more-posts').load(link + ' .tv-page-widget li, .pagination', function() {
                $('.more-posts li').hide().detach().appendTo('.tv-page-widget ul').fadeIn(500);
                $('.more-posts .pagination').detach().appendTo('.tv-page-widget');
                $('.more-posts').remove();
                $('.load-content').remove();

            });
        });

        $('.archive #primary, .blog #primary').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            $('#blog-list').append('<div class="more-posts"></div>');
            $('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $('.more-posts').load(link + ' #blog-list li, .pagination', function() {
                $('.more-posts li').hide().detach().appendTo('#blog-list ul').fadeIn(500);
                $('.more-posts .pagination').detach().appendTo('#blog-list');
                $('.more-posts').remove();
                $('.load-content').remove();

            });
        });


        //keyboard navigation next prev 		
        $(document).keydown(function(e) {
            var url = false;
            if (e.which == 37) { // Left arrow key code
                url = $('.previous-title a').attr('href');
            } else if (e.which == 39) { // Right arrow key code
                url = $('.next-title a').attr('href');
            }
            if (url) {
                window.location = url;
            }
        });

        //menu button for responsive mobile


        $("#mob-menu .mob-menu-button").click(function() {
            $("#main-nav ul, #navigation").toggleClass("active");
            $('#mob-menu').toggleClass("active");
            $('body').toggleClass("mob-menu-active");

        });


        //super slider widget



        function superslidermargin() {
            $('.home-widget.fullwidth-super-slider, .fullwidth-ticker, .fullwidth-image').css('max-width', $(window).width());
            $('.home-widget.fullwidth-super-slider, .fullwidth-ticker, .fullwidth-image').css('margin-left', -($('#main').offset().left + 10));
        };
        superslidermargin();
		$(window).load(function() {superslidermargin();});
        $(window).resize(superslidermargin);

        if ($('.super-slider').length) {
            $(window).load(function() {
                function getGridSize() {
                    return (window.innerWidth < 700) ? 1 :
                        (window.innerWidth < 1024) ? 2 : 3;
                }
					$('.super-slider').flexslider({
                    animation: 'slide',
					useCSS: false,
                    animationLoop: true,
					slideshowSpeed: 8000,
                    itemWidth: 210,
                    itemMargin: 0,
                    move: getGridSize(),
                    minItems: getGridSize(), // use function to pull in initial value
                    maxItems: getGridSize(), // use function to pull in initial value
                    start: function(slider) {                   
                        $('.loading').fadeTo(1000, 1);
                        slider.removeClass('loading');
                    },
                    after: function(slider) {
                        slider.resize();
                    }
                });
			
                // check grid size on resize event
                $(window).resize(function() {
                    var gridSize = getGridSize();
					$('.super-slider').each(function() {
						$(this).data('flexslider').vars.minItems = gridSize;	
					});
					$('.super-slider').each(function() {
						$(this).data('flexslider').vars.maxItems = gridSize;	
					});
					$('.super-slider').each(function() {
						$(this).data('flexslider').vars.move = gridSize;	
					});
                 
                });

            });
        }
        //wide slider	


        $(window).load(function() {
            $('.wide-slider').each(function() {


                var widget_id = $(this).closest('.widget').attr('id');
                var widget_id_p = '#' + widget_id;
                var widget_id_x = '.' + widget_id;
                $(widget_id_p).find('.wide-slider-control li').addClass(widget_id);

                $(this).flexslider({
                    animation: slide_picker,
                    slideshowSpeed: 8000,
                    manualControls: $(widget_id_x),
                    controlNav: true,
                    directionNav: true,
                    pauseOnHover: true,
                    start: function(slider) {
                        $('.slider-container').fadeTo("fast", 1);
                        $('.wide-slider-control').fadeTo("fast", 1);
                    }
                });
            });
        });

        //Gallery slider
        $(window).load(function() {
            $('.post-page-gallery-thumbnails').flexslider({
                animation: 'slide',
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 166,
                itemMargin: 0,
                minItems: 4,
                maxItems: 4,
                move: 4,
                directionNav: true,
                asNavFor: '.post-page-gallery-slider',
                start: function(slider) {
                    slider.fadeTo(1000, 1);
                    slider.removeClass('loading');
                }
            });

            $('.post-page-gallery-slider').flexslider({
                animation: slide_picker,
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: '.post-page-gallery-thumbnails',
                start: function(slider) {
                    slider.fadeTo(1000, 1);
                    slider.removeClass('loading');
                }

            });
        });

        //super-menu scripts
        $('#header .menu-item-has-children').append('<span class="subsignmeni"></span>');
        function mobile_menu_sub(){
                    if ($(window).width() < 700) {             
                         $('.subsignmeni').off().on('click' , function() { 
                            $(this).prev('.sub-menu-wrapper, .sub-meni').toggleClass('mob-cat');
                        });
                }
        }
        mobile_menu_sub();
        $(window).resize(mobile_menu_sub);


    function hover_intent_menu(){       
		function mousein_triger(){
        if ($(window).width() > 700) {  	         
			$(".menu-item").removeClass("active");
			$(this).addClass("active");	
			$(this).find('.sub-menu-wrapper').css('visibility', 'hidden').show();			
			$(this).find('.sub-menu-wrapper').height($(this).find('.sub-menu').height());
            $(this).find('.sub-menu-wrapper').css('min-height', $(this).find('.menu-links.inside-menu').outerHeight());
			$(this).find('.sub-menu-wrapper').css('visibility', 'visible').hide();
			$(this).children('.sub-menu-wrapper, .sub-meni').fadeIn(150);
		}else{
            $('.menu-item').removeClass('active');
            $('.sub-menu-wrapper').removeAttr( 'style' );
        }}
		function mouseout_triger() {
        if ($(window).width() > 700){                    
            $(this).children('.sub-menu-wrapper, .sub-meni').fadeOut(150);
		}}
		var settings = {
			sensitivity: 4,
			interval: 150,
			timeout: 300,
			over: mousein_triger,
			out:mouseout_triger
		
		};
		$('.menu-item').not( '.inside-menu .menu-item' ).hoverIntent( settings );


        var settings1 = {
            sensitivity: 4,
            interval: 0,
            timeout: 300,
            over: mousein_triger,
            out:mouseout_triger
        
        };

        $( '.inside-menu .menu-item' ).hoverIntent( settings1 );
        }
    

        hover_intent_menu();
        $(window).resize(hover_intent_menu);


//autoload for all
$(window).scroll(function() {
    $('.auto-load').each(function() {             
                var loadHeight = $(this).offset().top;
                if ($(window).scrollTop() > loadHeight - $(window).height() ) {
                   $(this).find('a').trigger( "click" );
                }
            });
    });



//load more for blogroll1
 if ($('.widget_blog_category_exm1 .pagination').length) {

        $('.widget_blog_category_exm1').off().on('click', '.pagination a', function(e) {
            e.preventDefault();

            var parent = $(this).parents('.widget_blog_category_exm1').attr('id');
            parent = '#' + parent;
            var link = $(this).attr('href');

            $(parent+'.widget_blog_category_exm1').append('<div class="more-posts"></div>');
            $(parent).find('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $(parent).find('.more-posts').load(link + ' '+ parent +' .blog-category li, '+ parent +' .pagination', function() {
                $(parent).find('.more-posts li').hide().detach().appendTo(parent+' .blog-category ul').fadeIn(500);
                $(parent).find('.more-posts .pagination').detach().appendTo(parent+' .blog-category');
                $(parent).find('.more-posts').remove();
                $(parent).find('.load-content').remove(); 
                if ($('#fullwidth').length) {          
                    $('#fullwidth').masonry().masonry('reloadItems');
                    setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                }
            });
        });
    }


//load more for blogroll3
 if ($('.widget_blog_category_three_exm1 .pagination').length) {

        $('.widget_blog_category_three_exm1').off().on('click', '.pagination a', function(e) {
            e.preventDefault();

            var parent = $(this).parents('.widget_blog_category_three_exm1').attr('id');
            parent = '#' + parent;
            var link = $(this).attr('href');

            $(parent+'.widget_blog_category_three_exm1').append('<div class="more-posts"></div>');
            $(parent).find('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $(parent).find('.more-posts').load(link + ' '+ parent +' .blogroll3 li, '+ parent +' .pagination', function() {
                $(parent).find('.more-posts li').hide().detach().appendTo(parent+' .blogroll3 ul').fadeIn(500);
                $(parent).find('.more-posts .pagination').detach().appendTo(parent+' .blogroll3');
                $(parent).find('.more-posts').remove();
                $(parent).find('.load-content').remove(); 
                if ($('#fullwidth').length) {          
                    $('#fullwidth').masonry().masonry('reloadItems');
                    setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                }
            });
        });
    }


//load more for featured big images
 if ($('.widget_img_featured_category_exm1 .pagination').length) {

        $('.widget_img_featured_category_exm1').off().on('click', '.pagination a', function(e) {
            e.preventDefault();

            var parent = $(this).parents('.widget_img_featured_category_exm1').attr('id');
            parent = '#' + parent;
            var link = $(this).attr('href');

            $(parent+'.widget_img_featured_category_exm1').append('<div class="more-posts"></div>');
            $(parent).find('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $(parent).find('.more-posts').load(link + ' '+ parent +' .img-featured-category.big li, '+ parent +' .pagination', function() {
                $(parent).find('.more-posts li').hide().detach().appendTo(parent+' .img-featured-category.big ul').fadeIn(500);
                $(parent).find('.more-posts .pagination').detach().appendTo(parent+' .img-featured-category.big');
                $(parent).find('.more-posts').remove();
                $(parent).find('.load-content').remove(); 
                if ($('#fullwidth').length) {          
                    $('#fullwidth').masonry().masonry('reloadItems');
                    setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                }
            });
        });
    }

//load more for featured huge images
 if ($('.widget_huge_img_featured_category_exm1 .pagination').length) {

        $('.widget_huge_img_featured_category_exm1').off().on('click', '.pagination a', function(e) {
            e.preventDefault();

            var parent = $(this).parents('.widget_huge_img_featured_category_exm1').attr('id');
            parent = '#' + parent;
            var link = $(this).attr('href');

            $(parent+'.widget_huge_img_featured_category_exm1').append('<div class="more-posts"></div>');
            $(parent).find('.pagination').replaceWith('<div class="load-content"><div class="load-circle"></div></div>');
            $(parent).find('.more-posts').load(link + ' '+ parent +' .img-featured-category.huge li, '+ parent +' .pagination', function() {
                $(parent).find('.more-posts li').hide().detach().appendTo(parent+' .img-featured-category.huge ul').fadeIn(500);
                $(parent).find('.more-posts .pagination').detach().appendTo(parent+' .img-featured-category.huge');
                $(parent).find('.more-posts').remove();
                $(parent).find('.load-content').remove(); 
                if ($('#fullwidth').length) {          
                    $('#fullwidth').masonry().masonry('reloadItems');
                    setTimeout(function() {$('#fullwidth').masonry().masonry('reloadItems');}, 500);
                }
            });
        });
    }



        $(window).load(function() {
            $('.popular-slider').flexslider({
                    animation: 'fade',
                    slideshowSpeed: 8000,
                    animationSpeed: 300,
                    manualControls: '.popular-slider-control li',
                    controlNav: true,
                    directionNav: false,
                    pauseOnHover: true,
            });
        });
        $('.popular-slider-control li').on('mouseover',function(){
             $(this).trigger('click');
        });
        $('.popular-slider-control li a').on('click',function(){
            window.location = $(this).attr('href');
        });

    //header ad fix for fullwidth image
    if ($('.fullwidth-post-image').length) {
        if ($('.header-advert').length) {
            $('.header-advert').css('margin-bottom', '40px');
        }
    }       

});