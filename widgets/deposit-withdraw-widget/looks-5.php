	<li>
		<div class="deposit-withdraw-logo-wrap">
			<div class="deposit-withdraw-position-number">
				<?php echo '#';echo ($i + 1);?>
			</div>
			<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="deposit-withdraw-logo">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $image['alt']; ?>" class="bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">  							 
						<?php } ?>											
			</div>
			</a>
		</div>
		<div class="deposit-withdraw-review-image-wrap">
			<div class="deposit-withdraw-review-content-wrap">
				<div class="looks-5-content-wrap">
					<div class="deposit-withdraw-bonus">
						<?php echo $bonus[$i];	?>
					</div>
				</div>

				<div class="looks-5-content-wrap">

						<div class="deposit-text">
							Deposit
							</br>
							<?php if($deposit[$i]){ ?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_up_widget.png'?>">
							<?php }else{?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_down_widget.png'?>">
							<?php } ?>
						</div>

						<div class="withdraw-text">
							Withdraw
							</br>
							<?php if($withdraw[$i]){ ?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_up_widget.png'?>">
							<?php }else{?>
								<img src="<?php echo get_template_directory_uri() . '/images/thumbs_down_widget.png'?>">
							<?php } ?>
						</div>
				
				</div>

				<div class="looks-5-content-wrap">
					<a href="<?php echo the_field( 'default_tracker', $bookmaker_id); ?>" target="_blank">
						<div class="deposit-withdraw-review-bet-now">
                    		<?php the_field('bet_now', 'option');  ?>
						</div>
               		</a>
					<div class="deposit-withdraw-review-link">
						<a href="<?php echo get_permalink( $bookmaker_id); ?>">
							<?php the_field('read_review', 'option');  ?>
						</a>
					</div>
				</div>

			</div>
		</div>
	</li>