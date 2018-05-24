				<li>					

	    <div class="archive-payment-wrap">
	      <div class="archive-payment-icon">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="landing-widget-logo bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">		 
				 <?php $image_logo = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image_logo ) {?>
							<img src="<?php  echo $image_logo['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
</a>
	      </div>

		<div class="payment-icon-content">
			<?php echo $tooltip[$i]; ?>
		</div>
	</div>
<div class="payment-icon-bookmakers">
			<span>
				<?php echo $bonus[$i];	?>
			</span>

				<a href="<?php echo $tracker[$i]; ?>" target="_blank">
					<div class="landing-widget-review-bet-now">
                    	<?php the_field('bet_now', 'option');  ?>
					</div>
                </a>		

				<div class="payment-icon-read-review">
					<a href="<?php the_permalink($bookmaker_id); ?>" title="<?php the_title($bookmaker_id); ?>">
				         <?php the_field('read_review', 'option');  ?>
					</a>
			    </div>
</div>
				</li>