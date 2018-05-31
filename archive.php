<?php get_header(); ?>
	<main id="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				<a href="<?php the_permalink(); ?>">
					<?php echo esc_html(get_the_title()); ?> 
				</a>
				<?php
			// End the loop.
			endwhile;

	// If no content, include the "No posts found" template.
		else :
			echo 'Nothing Found';

		endif;
		?>

</main><!-- .site-main -->
<?php get_footer(); ?>