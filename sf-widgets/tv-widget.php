<?php   
/* 
Plugin Name: Tv-widget
Description: Tv-widget-display latest news from video.
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'tv_widget_latest' );

function tv_widget_latest() {register_widget( 'tv_widget_exm1' );}

class tv_widget_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'tv_widget_exm1', // Widget ID
			__('TV-Widget', 'examiner'), // Name
			array( 'description' =>'', ) // Args
			);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
			/* Default widget settings. */
			$defaults = array( 'title' => 'New on Theme TV', 'widget_size' => 'one-part', 'number' => 3);
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			
			$title = $instance['title'];
			$widget_size = $instance['widget_size'];
			$number = $instance['number'];
			
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);	
			echo $args['before_widget'];
			?>

<div class="tv-featured">
	<?php if ( ! empty( $title ) )
				echo '<div class="tv-featured-title"><a href="' . esc_url(get_post_format_link( 'video' )) . '">' . esc_html($title) . '</a></div>'; ?>
	<ul class="tv-big">
		<?php $exm1_posts = new WP_Query(array( 'tax_query' => array(array('taxonomy' => 'post_format', 'field' => 'slug', 'terms' => array( 'post-format-video' ))), 'posts_per_page' => 1, 'ignore_sticky_posts' => 1 )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="tv-big-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if( $widget_size == 'one-part' ) {the_post_thumbnail('small-blog');} elseif( $widget_size == 'two-parts' ){the_post_thumbnail('slider-two');} elseif ( $widget_size == 'three-parts' ){the_post_thumbnail('slider-three');}elseif ( $widget_size == 'four-parts' ){the_post_thumbnail('slider-four');} ?>
				</a>
				<?php } ?>
			</div>
			<!---tv-widget-video-->
			<div class="featured-posts-text">
				<span class="category-icon">
				<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
				</span>
				<div class="tv-widget-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
					</a>
				</div>
				<!--tv-widget-title-->
				<div class="tv-widget-content">
					<?php if( $widget_size == 'one-part'){echo excerpt(20);}elseif( $widget_size == 'two-parts'){echo excerpt(40);}elseif( $widget_size == 'three-parts'){echo excerpt(60);}elseif( $widget_size == 'four-parts'){echo excerpt(80);} ?>
				</div>
				<!--tv-widget-content-->
			</div>
			<!--featured-posts-text-->
		</li>
		<?php endwhile; ?>
	</ul>
	<ul class="tv-small">
		<?php $exm1_posts = new WP_Query(array( 'tax_query' => array(array('taxonomy' => 'post_format', 'field' => 'slug', 'terms' => array( 'post-format-video' ))), 'ignore_sticky_posts' => 1, 'offset' => 1, 'posts_per_page' => $number )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li>
			<div class="tv-small-posts-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('tv-widget-thumb'); ?>
				</a>
				<?php } ?>
			</div>
			<!---featured-posts-image-->
			<div class="featured-posts-text">
				<span class="category-icon">
				<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
				</span>
				<div class="tv-small-post-title">
					<a href="<?php the_permalink(); ?>">
					<?php echo wp_trim_words( get_the_title(), 10 ); ?>
					</a>
				</div>
				<!--featured-posts-title-->
				<span class="post-date">
				<?php echo esc_html(get_the_date()); ?>
				</span>
			</div>
			<!--featured-posts-text-->
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--tv-featured-->

<?php

	/* After widget. */
	
	echo $args['after_widget'];
	}


	/* Widget settings. */


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
	/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['number'] = $new_instance['number'];	
		
		return $instance;
	}
	
	
	function form( $instance ) {
		
	/* Default widget settings. */
		
		$defaults = array( 'title' => 'New on Theme TV', 'widget_size' => 'one-part', 'number' => 3);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!-- widget_size -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'widget_size' )); ?>">
		<?php _e('Widget size:', 'examiner'); ?>
	</label>
	<br>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="one-part" <?php checked('one-part', $instance['widget_size']); ?> class="one-part"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="two-parts" <?php checked('two-parts', $instance['widget_size']); ?> class="two-parts" />
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="three-parts" <?php checked('three-parts', $instance['widget_size']); ?> class="three-parts"/>
	<input type="radio" name="<?php echo esc_attr($this->get_field_name( 'widget_size' )); ?>" value="four-parts" <?php checked('four-parts', $instance['widget_size']); ?> class="four-parts"/>
</p>

<!-- Maximum number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of posts to show:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<?php }} ?>