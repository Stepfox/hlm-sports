<?php get_header(); ?>
<main id="main">
  <div class="four-parts hlm-sports-widget top-page-area">
    <div class="widget-title">
      <h2>
      Pros and Cons
      </h2>
    </div>

    <div class="widget pros-and-cons">
      <div class="three-parts hlm-sports-widget">
          <div class="pros-and-cons-left">
              

              <div class="pros-and-cons-logo"> 

          <?php $image = get_field('logo_136x44');                            
            if( $image ) {?>
              <div class="bookmaker-background-wrap-<?php echo get_the_ID(); ?>">
                <img src="<?php  echo $image['sizes']['hlm_sports_196x66']; ?>" alt="">     
              </div>           
            <?php } ?>  
                 
              </div>
              <div class="pros-and-cons-star-rating star-rating">
                    <?php hlm_sports_get_star_rating(get_field('overall_rating'));?>
              </div>
              <div class="pros-and-cons-rating-grade">
                <span>
                  <?php echo the_field( 'left_bonus' ); ?>
                </span>
              </div>  
              <div class="pros-and-cons-terms">
                Terms Apply to all bonus offers
                </br>
                Advertising disclosure
              </div>  
          </div>

          <div class="pros-and-cons-right">
              <div class="pros-and-cons-logo">     
                         <?php $image = get_field('right_logo');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_196x66']; ?>" alt="">                
            <?php } ?>                     
              </div>
              <div class="pros-and-cons-rating-grade">
                <span>
                  <?php echo the_field( 'right_bonus' ); ?>
                </span>
              </div>  
              <a href="<?php echo the_field( 'default_tracker' ); ?>" target="_blank">
                <div class="pros-and-cons-bet-now">
                    Bet Now
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

<?php 

$payment_options = get_field('payment_options');

if( $payment_options ): ?>

  <?php foreach( $payment_options as $p ): ?>
      <div class="payment-icon">
         <?php $image = get_field('payment_icon', $p->ID);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_70x30']; ?>" alt="">                
            <?php } ?>  
      </div>
  <?php endforeach; ?>

<?php endif; ?>

        </div>
      </div>
</div>
  </div>





  <div class="three-parts hlm-sports-widget post-page-area">
        <nav>
          <ul>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
          </ul>
        </nav>
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


      <div class="four-parts widget">
        <div class="widget-title">
          <h2>
          Bookmaker support details
          </h2>
        </div>
        <div class="widget support-details">
          <div class="support-content">
          Bonus $200 Free Bets  Bonus $200 Free BetsBonus $200 Free BetsBonus $200 Free BetsBonus $200 Free BetsBonus $200 Free Bets
          </div>
          <div class="support-customer-lang">
          Customer Service Languages
            <img src="http://via.placeholder.com/40x20">
            <img src="http://via.placeholder.com/40x20">
            <img src="http://via.placeholder.com/40x20">
            <img src="http://via.placeholder.com/40x20">
          </div>
          <div class="support-phone">
          Telephone NUMBER
          </div>
          <div class="support-email">
          <?php echo the_field( 'support_email' ); ?>
          </div>
          <div class="support-open-hours">
          Open Hours 
          </div>


        </div>
      </div>

  </div>



  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>


</main>
<?php get_footer(); ?>