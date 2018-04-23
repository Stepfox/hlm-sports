	<li>
		<div class="top-5-logo-wrap">
			<div class="top-5-position-number">
				<?php echo '#';echo ($i + 1);?>
			</div>
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="top-5-logo">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="" class="bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">  							 
						<?php } ?>											
			</div>
			</a>
		</div>
		<div class="top-5-review-image-wrap">
					<div class="top-5-tooltip">
					<?php echo $tooltip[$i];	?>
					
				</div>
			<div class="top-5-review-content-wrap">
				<div class="looks-5-content-wrap">
					<div class="top-5-bonus">
						<?php echo $bonus[$i];	?>
					</div>
				</div>

				<div class="looks-5-content-wrap">
					<div class="top-5-star-rating">
						<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
					</div>
					<div class="top-5-star-rating-grade">
						<?php hlm_sports_get_star_rating_grade(get_field('overall_rating', $bookmaker_id));?>
					</div>					
				</div>

				<div class="looks-5-content-wrap">
					<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
						<div class="top-5-review-bet-now">
                    		Bet Now
						</div>
               		</a>
					<div class="top-5-review-link">
						<a href="<?php echo get_permalink( $bookmaker_id); ?>">
							Read Review
						</a>
					</div>
				</div>

			</div>
		</div>
	</li>