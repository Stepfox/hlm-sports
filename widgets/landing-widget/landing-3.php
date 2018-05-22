	<li>
		<div class="landing-widget-logo-wrap">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="landing-widget-logo  <?php if( empty($custom_logo[$i]) ) 
			{echo 'bookmaker-background-wrap-'.esc_attr($bookmaker_id);} ?>">		 
						<?php if( !empty($custom_logo[$i]) ) {?>
							<img src="<?php  
								
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($custom_logo[$i]), 'hlm_sports_136x44');
				                $imageURL = $imageObj[0];
									echo $imageURL;
								
							 ?>" alt="">  							 
						<?php }else{

				 		$image_logo = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image_logo ) {?>
							<img src="<?php  echo $image_logo['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } 	



						} ?>										
			</div>
</a>			
		</div>
		<div class="landing-widget-review-image-wrap">
	
			<div class="landing-widget-review-content-wrap">
					<a href="<?php echo $tracker[$i]; ?>" target="_blank">
						<div class="landing-widget-review-bet-now">
							<?php the_field('bet_now', 'option');  ?>
						</div>
               		</a>
			</div>
		</div>
	</li>