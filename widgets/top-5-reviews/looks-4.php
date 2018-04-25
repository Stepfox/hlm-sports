	<li>
		<div class="top-5-logo-wrap">
<a href="<?php echo get_permalink( $bookmaker_id); ?>">
			<div class="top-5-logo bookmaker-background-wrap-<?php echo $bookmaker_id; ?>">		 
				 <?php $image = get_field('logo_136x44', $bookmaker_id);					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">  							 
						<?php } ?>											
			</div>
</a>			
		</div>
		<div class="top-5-review-image-wrap">
	
			<div class="top-5-review-content-wrap">
				<div class="top-5-review-link">
					<a href="<?php echo get_permalink( $bookmaker_id); ?>">
						<?php the_field('read_review', 'option');  ?>
					</a>
				</div>
			</div>
		</div>
	</li>