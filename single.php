<?php get_header(); 


?>


	<main id="main" class="page-with-featured-image">


  <div class="three-parts hlm-sports-widget post-page-area">

  <div class="four-parts top-page-area">
    <?php 
      the_post_thumbnail('hlm_sports_900x380');
    ?>
  </div>

        <div class="post-content widget">
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
              the_content();
                wp_link_pages(array(  
                'before' => '<div class="pagination">' . 'Pages:',  
                 'after' => '</div>'  
                  )); 
        endwhile;
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>

      </div>

		</div>	

  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>


	</main>
<?php get_footer(); ?>