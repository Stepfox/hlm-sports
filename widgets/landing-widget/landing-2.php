	<li>

		<div class="landing-widget-review-image-wrap">
			<div class="landing-widget-review-image"> 
						<a href="<?php echo $tracker[$i]; ?>">
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
						</a>
			</div>
		
			<div class="landing-widget-review-content-wrap">
				<div class="landing-widget-bonus">
					<?php echo $bonus[$i];	?>
				</div>
				<div class="landing-widget-review-bet-now-wrap">
				<a href="<?php echo $tracker[$i]; ?>" target="_blank">
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