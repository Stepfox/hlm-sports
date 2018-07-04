<?php 
/**
 * Examiner image sizes
**/ 
?>
<?php

// Register Thumbnails


$ratio = 1210;


$width28thumb = round(((($ratio - 20) / 4 ) - 20 ) / 3.571);
$width25 = round((($ratio - 20) * 0.25 ) - 20 );
$jumping_thumb = round(($ratio - 20) * 0.25 );
$width40 = round(((($ratio - 20) * 0.25 ) - 40) * 0.40);
$width50 = round((($ratio - 20) * 0.5 ) - 20 );
$width75 = round((($ratio - 20) * 0.75 ) - 20 );
$width100 = round( $ratio - 40 );




// Register Thumbnails

if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
//post-page
add_image_size( 'fullwidth-singlepost-image', 1920, 1080, true );

//thumbnails
add_image_size( 'small-thumb', $width28thumb, $width28thumb, true );
//huge-featured-images
add_image_size( 'huge-image-featured', $width50, round($width25 / 1.03), true );

//big-featured-images
add_image_size( 'image-featured', $width25, round($width25 / 1.03), true );
//small-featured-images
add_image_size( 'small-image-featured', $width25, round(($width25 / 2 / 1.03 ) - 10), true );
//blogroll1
add_image_size( 'small-blog', $width25, round($width25 / 1.602), true );
//blogroll2
add_image_size( 'big-blog-one', $width25, round($width25 / 2.776), true );
add_image_size( 'big-blog-two', $width50, round($width50 / 2.776) , true );
add_image_size( 'big-blog-three', $width75, round($width75 / 2.776), true );
add_image_size( 'big-blog-four', $width100, round($width100 / 2.776), true );
//super-slider
add_image_size( 'super-slider-high', 634, 460, true );
//slider
add_image_size( 'slider-two', $width50, round($width25 / 1.03) , true );
add_image_size( 'slider-three', $width75, round($width75 / 2.0966), true );
add_image_size( 'slider-four', $width100, round($width100 / 2.096), true );
//carousel
add_image_size( 'big-carousel-thumb', $width25, round($width25 / 0.6125), true );
//tw-widget
add_image_size( 'tv-widget-thumb', $width40, $width40, true );

//jumping-posts
add_image_size( 'jumping-posts-thumb', $jumping_thumb, round($jumping_thumb / 1.45), true );

//review
add_image_size( 'review-img', round(((($ratio - 20) * 1.03 ) - 20)* 0.25), round(((($ratio - 20) * 1.03 ) - 20)* 0.25) / 1.33, true );

}




?>