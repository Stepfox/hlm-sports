	<div class="odds-widget">
		<div class="odds-widget-bookmakers">
			<div class="odds-sports-wrap">
				<div class="odds-widget-sports">
					<select>
					<option value="54a22a0cd443afef088b46db">
						World Cup
					</option>
					<option value="54a22a10d443afef088b4719">
						Friendly Internationals
					</option>
					<option value="54a229f8d443afef088b45b4">
						Premier League
					</option>
					<option value="576243df1d142240108b471d">
						Championship
					</option>
					<option value="54a229fad443afef088b45c9">
						Bundesliga
					</option>
					<option value="54a229fcd443afef088b45f0">
						Serie A
					</option>
					<option value="54a229f9d443afef088b45bc">
						Ligue 1
					</option>
					<option value="576250f41d142264208b4795">
						Primera Division
					</option>
					</select> 
					<img src="http://hlm-sports-betting.local/wp-content/themes/hlm/widgets/odds-widget/logos/world-cup.png">
				</div>
			</div>
			<ul class="odds-widget-bookmakers-links">
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
			$args = array(
			    'posts_per_page' => 5,
			    'post_type' => 'match',
			    'post_status' => 'publish',   
			);

		            $matches_query = new WP_Query($args);
		            while($matches_query->have_posts()) : $matches_query->the_post();
			?>			
			<li>
				<div class="odds-date">
					<?php 

						$myDateTime = strtotime(get_field('start_time'));
						echo date ('l F d',$myDateTime);
			

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
				<div class="odds-widget-bookmakers">
					<?php if(get_field('winner_table')): ?>
					<ul class="odds-widget-odds-list">
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