<?php get_header();?>






<main id="main" class="category-page">
  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget">

          <div class="post-title">
          <?php echo term_description(); ?>          
          <?php 
        
            $image = get_field('flag', $term);                            
            if( $image ) {?>
            <div class="team-flag">
              <img src="<?php  echo $image['sizes']['hlm_sports_166x92']; ?>" alt="" >  
            </div>               
            <?php }        

            $image = get_field('main_image', $term);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="" >                 
            <?php } ?>
            
          </div>

    <div class="widget-title">
      <h2>
         Upcoming Games
      </h2>
    </div>


                        <table class="matches-table">
                          <tbody>



        <?php
        $same_day_check = '414444444444444';
        $check=0;
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

                       
            $myDateTime = (int)get_field('start_time');
            experiment_7($check, $same_day_check); 
            $check++;
            $same_day_check =  $myDateTime;
            ?>


        <?php 
        endwhile;
                 
      endif;
    ?>

                          </tbody>
                        </table>





</div>
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
        <?php the_post_thumbnail('small-blog'); ?>
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