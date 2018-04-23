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
	
			<div class="landing-widget-review-content-wrap">
					<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
						<div class="landing-widget-review-bet-now">
							Bet Now
						</div>
               		</a>
			</div>
		</div>
	</li>