				<li>					

	    <div class="archive-payment-wrap">
	      <div class="archive-payment-icon">
	         <?php $image = get_field('payment_icon', $bookmaker_id);                        
	            if( $image ) {?>
	            <a href="<?php the_permalink($bookmaker_id); ?>" title="<?php the_title($bookmaker_id); ?>">
	              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="">    
	          	</a>            
	            <?php } ?>  
	      </div>

		<div class="payment-icon-content">
			<?php echo wp_trim_words( get_post_field('post_content', $bookmaker_id), 30 ); ?>
		</div>
		<div class="payment-icon-read-review">
			<a href="<?php the_permalink($bookmaker_id); ?>" title="<?php the_title($bookmaker_id); ?>">
		         <?php the_field('read_review', 'option');  ?>
			</a>
	    </div>
	</div>
<div class="payment-icon-bookmakers">
			<span>
				<?php the_field('recomended_sportsbook', 'option');  ?>
			</span>


						<?php

						$bookmakers = new WP_Query(array(
							'post_type' => 'bookmaker',
							'meta_query' => array(
								array(
									'key' => 'payment_options', // name of custom field
									'value' => '"' . $bookmaker_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

						?>

							<ul>

								<?php 
						while ( $bookmakers->have_posts()) : $bookmakers->the_post();
								$photo = get_field('logo_136x44');?>
									

								
								<li>
									<a href="<?php echo get_permalink(); ?>">
							<div class="bookmaker-background-wrap-<?php echo get_the_ID(); ?>">		 
								<img src="<?php echo $photo['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $photo['alt']; ?>" />		
							</div>

										
									</a>
								</li>
							<?php  endwhile;wp_reset_postdata(); ?>
							</ul>

</div>
				</li>