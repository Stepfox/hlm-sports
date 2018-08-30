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
              <img src="<?php  echo $image['sizes']['hlm_sports_196x66']; ?>" alt="<?php echo $image['alt']; ?>">                
            <?php } ?>  
                 
              </div>
              <div class="pros-and-cons-rating-grade">
                <span>
                  <?php echo the_field( 'left_bonus' ); ?>
                </span>
              </div>  
              <a href="<?php the_field('best_bookmakers_link', 'option');  ?>">
                  <div class="pros-and-cons-bet-now">
                        <?php the_field('best_bookmakers', 'option');  ?>
                  </div>
              </a>
          </div>

                    <?php $image = get_field('main_image');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="<?php echo $image['alt']; ?>">                
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


</main>
<?php get_footer(); ?>