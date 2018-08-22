<?php get_header(); ?>
<main id="main">
  <div class="four-parts hlm-sports-widget top-page-area">
    <div class="widget-title desktop-pros-and-cons-title">
      <h2>
      <span><?php the_field('pros_and_cons', 'option');  ?></span>
      </h2>
    </div>

    <div class="widget pros-and-cons">
      <div class="three-parts hlm-sports-widget">
          <div class="pros-and-cons-left">
              

              <div class="pros-and-cons-logo"> 

          <?php $image = get_field('logo_136x44');                            
            if( $image ) {?>
              <div class="bookmaker-background-wrap-<?php echo get_the_ID(); ?>">
                <a href="<?php echo the_field( 'default_tracker' ); ?>" target="_blank">
                <img src="<?php  echo $image['sizes']['hlm_sports_196x66']; ?>" alt="">  
                </a>   
              </div>           
            <?php } ?>  
                 
              </div>
              <div class="pros-and-cons-star-rating star-rating">
                    <?php hlm_sports_get_star_rating(get_field('overall_rating'));?>
              </div>
              <div class="pros-and-cons-site-address">
                  <a href="<?php echo the_field( 'default_tracker' ); ?>" target="_blank">
                      <?php echo the_field( 'domain_name' ); ?>
                  </a>
              </div>
              <div class="pros-and-cons-rating-grade">
                <span>
                  <?php echo the_field( 'left_bonus' ); ?>
                </span>
              </div>  
              <div class="pros-and-cons-terms">               
                <?php the_field('terms_apply_to_all_bonus_offers', 'option');  ?>
                </br>
                <?php the_field('advertising_disclosure', 'option');  ?>
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
                    <?php the_field('bet_now', 'option');  ?>
                </div>
              </a>
          </div>
                    <?php $image = get_field('main_image');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="">                
            <?php } ?>  
      </div>


      <div class="one-part hlm-sports-widget">

    <div class="widget-title mobile-pros-and-cons-title">
      <h2>
      <span><?php the_field('pros_and_cons', 'option');  ?></span>
      </h2>
    </div>

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

  <?php foreach( array_slice($payment_options, 0, 3) as $p ): ?>
      <div class="payment-icon">
         <?php $image = get_field('payment_icon', $p->ID);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">                
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
          <?php if(get_field('content_target_menu')): ?>
          <ul>
            <?php while(has_sub_field('content_target_menu')): 

              if(!empty(get_sub_field('menu_item_name'))){      ?>
            <li>
              <a href="<?php the_sub_field('target'); ?>">
                <?php the_sub_field('menu_item_name'); ?>
              </a>
            </li>
            <?php } endwhile; ?>
          </ul>
          <?php endif; ?>
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
          </div>
          <!--author-desc-->
        </div>
        <!--author-info-->
</div>


        <?php }

?>

      <div class="four-parts widget">
        <div class="widget-title">
          <h2>
            <?php echo the_field('bookmaker_support_details_title', 'option');  ?>
          </h2>
        </div>
        <div class="widget support-details">
          <div class="support-content">
            <?php echo the_field( 'support_content' ); ?>
          </div>
          <div class="support-customer-lang">
            <strong><?php echo the_field('customer_service_languages', 'option');?></strong> <?php 
          if( have_rows('support_languages') ): ?>
            <?php while( have_rows('support_languages') ): the_row(); 
              $flag = get_sub_field('flag');
              ?>
                  <img src="<?php echo $flag['sizes']['hlm_sports_40x20']; ?>" alt="<?php echo $flag['alt'] ?>" />
            <?php endwhile; ?>
          <?php endif; ?>
          </div>
          <div class="support-phone">
            <strong><?php echo the_field('telephone_number', 'option');?></strong> <?php   echo the_field( 'support_phone' ); ?>  
          </div>
          <div class="support-email">
            <strong><?php echo the_field('email', 'option');?></strong> 
              <a href="mailto:<?php echo the_field( 'support_email' ); ?>">
                <?php echo the_field( 'support_email' ); ?>
              </a>
          </div>
          <div class="support-open-hours">
            <strong><?php echo the_field('open_hours', 'option');?></strong> <?php echo the_field( 'support_open_hours' ); ?>
          </div>
        </div>
      </div>

  </div>



  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>


</main>
<?php get_footer(); ?>