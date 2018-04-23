		<li>
			<div class="latest-articles-posts-image">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('hlm_sports_196x196'); ?>
			</a>
			<?php } ?>
			<div class="latest-articles-category-icon">
				<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
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
               

			</div>
			</div>
		</li>