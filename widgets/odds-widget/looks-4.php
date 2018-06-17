	<div class="odds-widget">

		<div class="odds-prev"> < </div> 
		<div class="odds-next"> > </div>

		<div class="odds-widget-bookmakers">

			<div class="odds-sports-wrap">
				<div class="odds-widget-sports">
<!-- 				<select>
				    <?php
				       $tax_terms = get_terms('leagues', array('hide_empty' => '0'));      
				       foreach ( $tax_terms as $tax_term ):  
				          echo '<option value="'.$tax_term->name.'">'.$tax_term->name.'</option>';   
				       endforeach;
				    ?>
				</select>  -->
				<img src="<?php echo get_template_directory_uri() . '/widgets/odds-widget/logos/world-cup.png'?>"/>
				</div>
			</div>
			<ul class="odds-widget-bookmakers-links slides">
				<?php 

		            $args1 = array(
		                'post_type' => 'bookmaker',
		                'posts_per_page' => -1, 
		                'post_status' => 'publish',   
		            );
		            $bookmakers_query = new WP_Query($args1);
		            while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
		            	if(!empty(get_field('bookmaker_crawl_order'))){ ?>

				<li>
					<div class="odds-widget-bookmakers-links-logo bookmaker-background-wrap-<?php the_ID(); ?>">
						<a href="<?php the_permalink() ?>">
				 		<?php $image = get_field('logo_136x44');					                  
						if( $image ) {?>
							<img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $photo['alt']; ?>" >  							 
						<?php } ?>	

						</a>
					</div>
					<div class="odds-widget-bookmakers-links-button top-5-review-bet-now">
						<a href="<?php echo the_field( 'default_tracker'); ?>" target="_blank">
                    		<?php the_field('bet_now', 'option');  ?>
                		</a>
					</div>
				</li>
			<?php  } endwhile; wp_reset_postdata();?>

			</ul>
		</div>
		<ul class="odds-widget-matches">
			<?php 
			$now_date = current_time('timestamp');
			$args = array(
			    'posts_per_page' => 5,
			    'post_type' => 'match',
			    'post_status' => 'publish', 
				'meta_key'			=> 'start_time',
				'orderby'			=> 'meta_value',
				'order'				=> 'ASC',
				'meta_query' => array(
						array('key' => 'start_time',
							'value'   => $now_date,
							'compare' => '>'),
				   			 ),
			
		      // 'tax_query' => array(
        //         array(
        //             'taxonomy' => 'leagues',
        //             'field' => 'slug',
        //             'terms' => $categories
        //      	   )
        //     	)
			);

		            $matches_query = new WP_Query($args);
		            while($matches_query->have_posts()) : $matches_query->the_post();
			?>			
			<li>
				<div class="odds-date">
					<?php 

						$myDateTime = get_field('start_time');
						echo date('l F d',$myDateTime);
			

					 ?>
				</div>
				<div class="odds-game-wrap">
					<div class="odds-game-time">
						<?php echo date ('H i A',$myDateTime); ?>
					</div>
					<div class="odds-game-teams">
						<div class="odds-game-home-team">
							<div class="odds-game-home-team-name">
								<?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
								<a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
									<?php echo $home_team->slug;?>
								</a>
							</div>
						</div>
						<div class="odds-game-away-team">
							<div class="odds-game-away-team-name">
								draw
							</div>
						</div>
						<div class="odds-game-away-team">
							<div class="odds-game-away-team-name">
								<?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
								<a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
									<?php echo $away_team->slug;?>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="odds-list" >
					<?php if(get_field('winner_table')): ?>
					<ul class="odds-widget-odds-list slides">
						<?php while(has_sub_field('winner_table')): 
							$deezs = get_sub_field('bookmaker'); if(!empty(get_field('bookmaker_crawl_order', $deezs->ID))) { ?>
						<li>
							<?php ?>
							<div class="odds-game-home-team-odd">
								<?php if(!empty(get_sub_field('win_odds'))){the_sub_field('win_odds');}else{echo '*';} ?>
							</div>
							<div class="odds-game-away-team-odd">
								<?php if(!empty(get_sub_field('draw_odds'))){the_sub_field('draw_odds');}else{echo '*';} ?>
							</div>
							<div class="odds-game-away-team-odd">
								<?php if(!empty(get_sub_field('loss_odds'))){the_sub_field('loss_odds');}else{echo '*';}?>
							</div>
						</li>
						<?php } endwhile; ?>
					</ul>
					<?php endif; ?>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>

<!-- close but dont know -->
</div></div>