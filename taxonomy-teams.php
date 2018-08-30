<?php get_header();?>






<main id="main" class="category-page">
  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget">

          <div class="post-title">
            <h1>
              <?php  $term = get_queried_object(); echo $term->name;?>
            </h1>
          
          <?php 
        
            $image = get_field('flag', $term);                            
            if( $image ) {?>
            <div class="team-flag">
              <img src="<?php  echo $image['sizes']['hlm_sports_166x92']; ?>" alt="<?php echo $image['alt']; ?>" >  
            </div>               
            <?php }        

            $image = get_field('main_image', $term);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="<?php echo $image['alt']; ?>" >                 
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
            matches_taxonomy_with_date($check, $same_day_check); 
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

</main>










<?php get_footer(); ?>