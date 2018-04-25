	<li>
		<div class="landing-widget-logo-wrap">
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="landing-widget-logo bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">		 
				 <?php $image_logo = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image_logo ) {?>
							<img src="<?php  echo $image_logo['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
			</a>	
		</div>
		<div class="landing-widget-review-image-wrap">
			<div class="landing-widget-review-image"> 
		<?php 
				
				$review_img_url = get_the_post_thumbnail_url( $bookmaker_id, 'hlm_sports_232x310' ); 
				
				 ?>
				 <img src="<?php   echo $review_img_url; ?>" alt="">
			</div>
		
			<div class="landing-widget-review-content-wrap">
				<div class="landing-widget-bookmaker-title">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">					
										 <?php if( !empty($image[$i]) ) {?>
							<img src="<?php  
								
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($image[$i]), 'hlm_sports_20x20');
				                $imageURL = $imageObj[0];
									echo $imageURL;
								
							 ?>" alt="">  							 
						<?php } ?>	<?php echo $bonus[$i];	?>
</a>
				</div>
				<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
					<div class="landing-widget-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>
				<div class="landing-widget-rules-link">
					<?php the_field('t&c_apply', 'option');  ?>
				</div>

				<div class="landing-widget-tooltip">
					<?php echo $tooltip[$i];	?>

				</div>

			</div>
		</div>
	</li>