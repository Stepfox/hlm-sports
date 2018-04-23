<?php 
/* Template Name: Alternative Homepage
 * Description :Alternative Homepage
 */
?>
<?php get_header(); ?>



<?php get_header(); ?>
	<main id="main">
		<div id="full-area">
		<?php $sidebarname = get_the_title(); if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('main-'.esc_html($sidebarname))): endif; ?>
		</div>	
	</main>
<?php get_footer(); ?>