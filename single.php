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



<?php 
          $authordesc = get_the_author_meta( 'description' );
          if ( ! empty ( $authordesc ) ){ ?>
<div class="four-parts widget">

    <div class="widget-title">
      <h2>
         Author Info
      </h2>
    </div>
        <div id="author-info">
          <div id="author-image">
            <?php echo wp_kses_post(get_avatar( get_the_author_meta('email'), '96' )); ?>
          </div>
          <!--author-image-->
          <div id="author-desc">
            <h2>
              <?php the_author_posts_link(); ?>
            </h2>
            <div class="description-author">
              <?php the_author_meta('description'); ?>
            </div>
            <!--description-author-->
<ul>
<?php

  if( have_rows("social_media", "user_".get_the_author_meta('ID') ) ):
   while ( have_rows("social_media", "user_".get_the_author_meta('ID') ) ) : the_row();?>

<li>
  <?php $image = get_sub_field('icon', "user_" .get_the_author_meta('ID'));                                      
  if( $image ) {?>
    <a href="<?php echo get_sub_field('profile_link', "user_" .get_the_author_meta('ID')); ?>" target="_blank">
      <img src="<?php  echo $image['sizes']['hlm_sports_20x20']; ?>" alt="<?php echo $image['alt']; ?>">
    </a>                        
  <?php } ?>
</li>

<?php

  endwhile;
endif;

?>

</ul>
          </div>
          <!--author-desc-->
        </div>
        <!--author-info-->
</div>


        <?php }

?>

		</div>	

  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

  <div class="four-parts post-page-area hlm-sports-widget odds-latest-news">

    <div class="widget-title">
      <h2>
         Latest News
      </h2>
    </div>

<div class="blog-category">
  <ul>
    <?php 
    

      $exm1_posts = new WP_Query(array( 'posts_per_page' => '4'));

     while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
    <li <?php post_class((is_sticky()?'sticky':'')); ?>>    
      <div class="blog-post-image">
        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('hlm_sports_290x200'); ?>
        </a>
        <?php } ?>
      </div>
      <!--blog-post-image-->

      <div class="category-icon">
        <?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
      </div>
      <!--featured-category-->

      <div class="blog-post-title-box">
        <div class="blog-post-title">
          <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
            </a>
          </h2>
        </div>
        <!--blog-post-title-->
      </div>
      <!--blog-post-title-box-->
    </li>
    <?php endwhile; ?>
  </ul>

</div>
<!--blog-category-->
</div>




	</main>
<?php get_footer(); ?>