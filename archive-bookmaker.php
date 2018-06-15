<?php get_header();?>






<main id="main" class="category-page">
   <?php 
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	if($page == 1){

 $hlm_sports_posts = new WP_Query(array( 
 	'post_type' => 'bookmaker',
 	'posts_per_page' => 1,
 	'meta_key'			=> 'overall_rating',
	'orderby'			=> 'meta_value',
	'order'				=> 'DESC',

 )); while ( $hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post(); ?>




  <div class="four-parts hlm-sports-widget top-page-area">
    <div class="widget-title">
      <h2>
      <span><?php the_field('pros_and_cons', 'option');  ?></span>
      <span style="float:left;text-align:left;">Best Bookmaker</span>

      </h2>
    </div>

    <div class="widget pros-and-cons">
      <div class="three-parts hlm-sports-widget">
          <div class="pros-and-cons-left">
              

              <div class="pros-and-cons-logo"> 

          <?php $image = get_field('logo_136x44');                            
            if( $image ) {?>
              <div class="bookmaker-background-wrap-<?php echo get_the_ID(); ?>">
                <a href="<?php echo get_permalink(); ?>">
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


 				<?php 
        endwhile;
        //pagination

      wp_reset_postdata();
  }
    ?>

  </div>







  <div class="three-parts post-page-area hlm-sports-widget">
    <div class="widget hlm-sports-widget post-content">
      <?php the_field('bookmaker_archive_page_text', 'options'); ?>
    </div>

        <div class="post-content widget blog-post">

	<ul class="looks1">
        <?php
        $i = 9 * ($page - 1);
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
$i++;
$bookmaker_id = $post->ID;

			?>


	<li>
		<div class="top-5-logo-wrap">
			<div class="top-5-position-number">
				<?php echo $i;?>
			</div>

			<div class="mobile-star-rating">
				<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
			</div>

			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="top-5-logo bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
			</a>	
		</div>
		<div class="top-5-review-image-wrap">
			<div class="top-5-review-image"> 
		<?php 
				
				$review_img_url = get_the_post_thumbnail_url( $bookmaker_id, 'hlm_sports_232x310' ); 
				
				 ?>
				 <img src="<?php   echo $review_img_url; ?>" alt="">
			</div>
		
			<div class="top-5-review-content-wrap">
				<div class="top-5-bookmaker-title">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">					
					<?php echo get_the_title( $bookmaker_id );?>
</a>
				</div>
				<div class="top-5-star-rating">
						<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
				</div>
				<div class="top-5-tooltip">
					<?php echo wp_trim_words($post->post_content, 50);	?>

				</div>


			</div>
	<div class="bookmakers-links-wrap">			
				<div class="top-5-review-link">
					<a href="<?php echo get_permalink( $bookmaker_id); ?>">
						<?php the_field('review', 'option');  ?>
					</a>
				</div>
				<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
					<div class="top-5-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>
				<div class="top-5-rules-link">
					<?php the_field('t&c_apply', 'option');  ?>
				</div>
	</div>
		</div>
	</li>



			<?php 
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