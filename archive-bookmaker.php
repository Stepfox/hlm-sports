<?php get_header();?>






<main id="main" class="category-page">

 <div class="three-parts post-page-area hlm-sports-widget">

          <div class="post-title">
            <h1>
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
            </h1>
          </div>

  </div>

  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget blog-post">




	<ul class="looks1">
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
			include( locate_template( 'widgets/top-5-reviews/looks-1.php', false, false ) );  
        endwhile;
        //pagination
        
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>
	</ul>
		<div class="pagination pagination-load-more auto-load">
			<?php next_posts_link('Load More', '' ); ?>
		</div>
		<!--pagination-->
	</div>

      </div>
  </div>

  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

</main>










<?php get_footer(); ?>