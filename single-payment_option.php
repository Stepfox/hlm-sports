<?php get_header(); ?>
<main id="main">
  <div class="four-parts hlm-sports-widget top-page-area">
    <div class="widget-title">
      <h2>
      <?php the_field('pros_and_cons', 'option');  ?>
      </h2>
    </div>
    <div class="widget pros-and-cons">
      <div class="three-parts hlm-sports-widget">
          <div class="pros-and-cons-left">
              

              <div class="pros-and-cons-logo"> 

          <?php $image = get_field('left_logo');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_196x66']; ?>" alt="">                
            <?php } ?>  
                 
              </div>
              <div class="pros-and-cons-rating-grade">
                <span>
                  <?php echo the_field( 'left_bonus' ); ?>
                </span>
              </div>  
              <a href="https://www.winningsportsbets.co.uk/deposit-bookmakers">
                  <div class="pros-and-cons-bet-now">
                        Best Bookmakers
                  </div>
              </a>
          </div>

                    <?php $image = get_field('main_image');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="">                
            <?php } ?>  
      </div>


      <div class="one-part hlm-sports-widget">
          <ul>

<?php

// check if the repeater field has rows of data
if( have_rows('pros_and_cons') ):

  // loop through the rows of data
    while ( have_rows('pros_and_cons') ) : the_row();?>

<?php 
$pros_and_cons_text = get_sub_field('pros_and_cons_text');
$thumb = get_sub_field('pros_and_cons_thumb');

?>
            <li class="thumb-<?php echo esc_attr($thumb);?>">
              <img src="<?php echo get_template_directory_uri() . '/images/thumb_'.$thumb.'.png'?>">
              <span>
                <?php echo esc_html($pros_and_cons_text);?>
              </span>
            </li>
<?php
 endwhile;

else :

    echo 'add pros and cons';

endif;

?>

          </ul>
      </div>
    </div>
<div class="four-parts hlm-sports-widget top-page-area payment-section">
      <div class="four-parts hlm-sports-widget">
        <div class="widget">
          <div class="bonus-with-check">
          <?php echo the_field( 'payment_options_bonus_1' ); ?>
          </div>
          <div class="bonus-with-check">
          <?php echo the_field( 'payment_options_bonus_2' ); ?>
          </div>
          <div class="bonus-with-check">
          <?php echo the_field( 'payment_options_bonus_3' ); ?>
          </div>
          <div class="bonus-with-check">
          <?php echo the_field( 'payment_options_bonus_4' ); ?>
          </div>

        </div>
      </div>
</div>
  </div>





  <div class="three-parts hlm-sports-widget post-page-area">
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