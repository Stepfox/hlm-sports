	<li>
		<div class="landing-widget-logo-wrap">
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="landing-widget-logo">		 
				 <?php $image_logo = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image_logo ) {?>
							<img src="<?php  echo $image_logo['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
			</a>	
		</div>
		<div class="landing-widget-review-image-wrap">


			<div class="landing-widget-review-content-wrap">
			<div class="landing-widget-review-image">
						<?php if( !empty($image[$i]) ) {?>
							<img src="<?php  
								
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($image[$i]), 'hlm_sports_40x40');
				                $imageURL = $imageObj[0];
									echo $imageURL;
								
							 ?>" alt="">  							 
						<?php } ?>	
			</div>
				<div class="landing-widget-bookmaker-title">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">					
					<?php echo $bonus[$i];	?>
</a>
				</div>
				<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
					<div class="landing-widget-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>

			</div>
		</div>
	</li>