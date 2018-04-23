	<li class="big-looks5">

<div class="top-5-terms">
	New customer offer 18+ please gamble resposibly T&C apply.
</div>
		<div class="top-5-logo-wrap">
			

			<div class="top-5-position-number">
				<span><?php echo '#';echo ($i + 1);?></span>
				<span>Best Offer</span>
			</div>
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="top-5-logo">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="" class="bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">  							 
						<?php } ?>											
			</div>
			</a>
					<div class="top-5-star-rating">
						<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
					</div>
					<div class="top-5-star-rating-grade">
						<?php hlm_sports_get_star_rating_grade(get_field('overall_rating', $bookmaker_id));?>
					</div>	

		</div>


		<div class="top-5-review-image-wrap">

			<div class="biglooks-5-title">
				<?php echo $biglooks_bonus_title;?>
			</div>
				<div class="top-5-tooltip">
					<?php echo $biglooks_tooltip;	?>				 
				</div>
		
<div class="looks-5-content-wrap bonus-with-check">
<?php echo $biglooks_bonus_one;?>	
</div>
<div class="looks-5-content-wrap bonus-with-check">
<?php echo $biglooks_bonus_two;?>	
</div>
<div class="looks-5-content-wrap bonus-with-check">
<?php echo $biglooks_bonus_three;?>	
</div>



			<div class="top-5-review-content-wrap">
				<div class="looks-5-content-wrap">
					<div class="top-5-big-bonus">
					Top payment options:
				</br>
						<?php 

$posts = get_field('payment_options', $bookmaker_id);

if( $posts ): ?>

  <?php foreach (array_slice($posts, 0, 4) as $p): // variable must NOT be called $post (IMPORTANT) ?>
      <div class="payment-icon">
         <?php $image = get_field('payment_icon', $p->ID);                            
            if( $image ) {?>
            	<a href="<?php echo get_permalink( $p->ID); ?>">
              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">  
              </a>              
            <?php } ?>  
      </div>
  <?php endforeach; ?>

<?php endif; ?>
					</div>
				</div>

				<div class="looks-5-content-wrap">
					<div class="top-5-review-link">
						<a href="<?php echo get_permalink( $bookmaker_id); ?>">
							Read Review
						</a>
					</div>				
				</div>

				<div class="looks-5-content-wrap">
					<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
						<div class="top-5-review-bet-now">
                    		Bet Now
						</div>
                  	</a>
				</div>

			</div>
		</div>

	</li>