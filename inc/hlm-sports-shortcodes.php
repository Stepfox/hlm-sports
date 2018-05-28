<?php 

function hlm_sports_ctm(){ 

    ?>
<a href="" target="_blank">
    <div class="hlm-cta-button">

            <?php the_field('bet_now', 'option');  ?>

    </div>
</a>

<?php 
} 
add_shortcode('hlm_sports_ctm','hlm_sports_ctm');









function hlm_sports_content_looks1( $atts, $content = null ) {
	return '<span class="content-looks1">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks1', 'hlm_sports_content_looks1' );


function hlm_sports_content_looks2( $atts, $content = null ) {
	return '<span class="content-looks2">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks2', 'hlm_sports_content_looks2' );


function hlm_sports_content_looks3( $atts, $content = null ) {
	return '<span class="content-looks3">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks3', 'hlm_sports_content_looks3' );



function hlm_sports_content_images($atts) {
	$images = shortcode_atts( array(
    'image1' => '',
    'image2' => '',
	), $atts );

	return '<div class="content-images-shortcode">
				<img src="' . $images['image1'] . '" />
				<img src="' . $images['image2'] . '" />
			</div>';
}
add_shortcode( 'hlm_sports_content_images', 'hlm_sports_content_images' );







?>