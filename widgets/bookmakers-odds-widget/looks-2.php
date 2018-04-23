		<li>
			<div class="latest-articles-posts-image">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('hlm_sports_900x260'); ?>
			</a>
			<?php } ?>
			</div>
			<div class="latest-articles-posts-text">
				<div class="latest-articles-posts-date">
					<?php echo esc_html(get_the_date()); ?>
				</div>
				<div class="latest-articles-posts-title">
					<a href="<?php the_permalink(); ?>">
						<?php echo wp_trim_words( esc_html(get_the_title()), 10 ); ?>
					</a>
				</div>
               
				<div class="latest-articles-read-more">
					<a href="<?php the_permalink(); ?>">
						READ MORE
					</a>
				</div>
				<?php echo hlm_sports_excerpt(20); ?>
			</div>
		</li>