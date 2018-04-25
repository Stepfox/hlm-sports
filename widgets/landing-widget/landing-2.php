	<li>

		<div class="landing-widget-review-image-wrap">
			<div class="landing-widget-review-image"> 

						<?php
						if( !empty($image[$i]) ) {?>
							<img src="<?php  
								if($widget_classname == 'three-parts'){
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($image[$i]), 'hlm_sports_900x260');
				                $imageURL = $imageObj[0];
									echo $imageURL;
								}elseif($widget_classname == 'four-parts'){
								$imageObj = wp_get_attachment_image_src(hlm_sports_get_image_id($image[$i]), 'hlm_sports_1200x260');
				                $imageURL = $imageObj[0];
									echo $imageURL;	
								}
							 ?>" alt="">  							 
						<?php } ?>	
			</div>
		
			<div class="landing-widget-review-content-wrap">
				<div class="landing-widget-logo-wrap">
					<a href="<?php echo get_permalink( $bookmaker_id); ?>">
					<div class="landing-widget-logo bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">		 
						 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
								if( $image ) {?>
									<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
								<?php } ?>											
					</div>
					</a>	
				</div>

				<div class="landing-widget-bonus">
					<?php echo $bonus[$i];	?>
				</div>
				<div class="landing-widget-review-bet-now-wrap">
				<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
					<div class="landing-widget-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>
            	</div>
			</div>
		</div>


				<div class="landing-widget-tooltip">
					<?php echo $tooltip[$i];	?>

				</div>

	</li>