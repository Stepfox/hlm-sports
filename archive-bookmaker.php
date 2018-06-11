<?php get_header();?>






<main id="main" class="category-page">

  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget blog-post">




	<ul class="looks1">
        <?php
        $i = 0;
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