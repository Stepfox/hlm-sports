	<li class="big-looks5">

<div class="deposit-withdraw-terms">
	<?php the_field('new_customer_offer', 'option');  ?>
</div>
		<div class="deposit-withdraw-logo-wrap">
			

			<div class="deposit-withdraw-position-number">
				<span><?php echo '#';echo ($i + 1);?></span>
				<span><?php the_field('best_offer', 'option');  ?></span>
			</div>
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="deposit-withdraw-logo">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $image['alt']; ?>" class="bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">  							 
						<?php } ?>											
			</div>
			</a>
					<div class="deposit-withdraw-star-rating">
						<?php hlm_sports_get_star_rating(get_field('overall_rating', $bookmaker_id));?>
					</div>
					<div class="deposit-withdraw-star-rating-grade">
						<?php hlm_sports_get_star_rating_grade(get_field('overall_rating', $bookmaker_id));?>
					</div>	

		</div>


		<div class="deposit-withdraw-review-image-wrap">

			<div class="biglooks-5-title">
				<?php echo $biglooks_bonus_title;?>
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



			<div class="deposit-withdraw-review-content-wrap">
				<div class="looks-5-content-wrap">
					<div class="deposit-withdraw-big-bonus">
					<?php the_field('deposit_and_withdraw', 'option');  ?>
							<?php if($biglooks_deposit){ ?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_up_widget.png'?>">
							<?php }else{?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_down_widget.png'?>">
							<?php } ?>
					</div>
				</div>
				<div class="looks-5-content-wrap">
					<div class="deposit-withdraw-review-link">
						<a href="<?php echo get_permalink( $bookmaker_id); ?>">
							<?php the_field('read_review', 'option');  ?>
						</a>
					</div>				
				</div>

				<div class="looks-5-content-wrap">
					<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
						<div class="deposit-withdraw-review-bet-now">
                    		<?php the_field('bet_now', 'option');  ?>
						</div>
                  	</a>
				</div>

			</div>
		</div>

	</li>