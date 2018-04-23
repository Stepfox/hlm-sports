jQuery(document).ready(function($) {
    "use strict";

    //Masonry script
    if ($('#full-area').length) {
        var fullwidthmas = $('#full-area').masonry({
            columnWidth: function(containerWidth) {
                return containerWidth / 4;
            },
            itemSelector: '.hlm-sports-widget',
            animationOptions: {
                duration: 30
            }
        });
        fullwidthmas.imagesLoaded(function() {
            setTimeout(function() {
                fullwidthmas.masonry();
                setTimeout(function() {
                    fullwidthmas.masonry();
                }, 1500);
            }, 10);
        });
        $(window).load(function() {
            setTimeout(function() {
                $('#full-area').masonry().masonry('reloadItems');
            }, 10);
        });
        $(window).resize(function() {
            setTimeout(function() {
                fullwidthmas.masonry();
                setTimeout(function() {
                    fullwidthmas.masonry();
                }, 1500);
            }, 10);
        });
    }



});