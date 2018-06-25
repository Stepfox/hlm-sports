<?php get_header();

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>






<main id="main" class="category-page">
  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget blog-post">

          <div class="post-title">
            <h1>
        <?php
          the_archive_title( '<h1 class="page-title">', '</h1>' );
          the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
            </h1>
          
          <?php 
        
          $term = get_queried_object();

         $image = get_field('main_image', $term);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="" >                 
            <?php }     

          ?>
            
          </div>
  <ul>
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
             ?>               
        <li class="col-sm-6 widget">          

            <?php experiment_5(); ?>

        </li>
        <?php 
        endwhile;
                 
      endif;
    ?>
  </ul>
  		<div class="pagination pagination-load-more auto-load">
			<?php next_posts_link('Load More', '' ); ?>
		</div>
		<!--pagination-->
    </div>
  </div>
  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

</main>










<?php get_footer(); ?>