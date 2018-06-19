<?php get_header(); ?>
	<main id="main">
		<?php 

experiment_1();

experiment_2();


		?>


		<div id="full-area">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Full Widgetarea')): endif; ?>
		</div>	
	</main>
<?php get_footer(); ?>