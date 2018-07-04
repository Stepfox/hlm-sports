<?php   
/* 
Plugin Name: Jumping posts
Description: Jumping posts widget. 
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'jumping_posts_widget' );

function jumping_posts_widget() {register_widget( 'jumping_posts_exm1' );}

class jumping_posts_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'jumping_posts_exm1', //Widget ID
			__('Jumping posts', 'examiner'), //Name
			array( 'description' => '', ) //Args
		);}

		/* Front-end display of widget. */

	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Jumping posts', 'number' => 4, 'widget_size' => 'one-part', 'categories' => 0, 'offset' => 0);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = $instance['title'];
		$number = $instance['number'];
		$offset = $instance['offset'];
		$categories = $instance['categories'];
		$widget_size = $instance['widget_size'];
						
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);						
		echo $args['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'];		
				if($categories != 0){echo '<a href='.esc_url(get_category_link( $categories )).'>';}		
			echo esc_html($title); 			
				if($categories != 0){echo '</a>';}
			echo $args['after_title'];}
			?>

<div class="jumping-posts">
	<ul>
		<?php $exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => $offset )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
		<li <?php post_class((is_sticky()?'sticky':'')); ?>>
			<div class="jumping-posts-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('jumping-posts-thumb'); if ( 'video' == get_post_format() ): echo '<span class="play-icon"></span>'; endif; ?>
				</a>
				<?php } ?>
			</div>
			<!---jumping-posts-image-->
			<div class="jumping-posts-text">
				<div class="jumping-posts-category">
					<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
				</div>
				<!--carousel-category-->
				<div class="jumping-posts-title">
					<a href="<?php the_permalink(); ?>">
					<?php echo wp_trim_words( esc_html(get_the_title()), 7 ); ?>
					</a>
				</div>
				<!--jumping-posts-title-->
				<div class="jumping-posts-excerpt">
					<?php echo excerpt(30); ?>
				</div>
				<!--jumping-posts-excerpt-->
			</div>
			<!--jumping-posts-text-->
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--jumping-posts-->

<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}
	
		/* Widget settings. */
		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['offset'] = $new_instance['offset'];
		$instance['categories'] = $new_instance['categories'];	
		$instance['widget_size'] = $new_instance['widget_size'];	
		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Jumping posts', 'number' => 4, 'widget_size' => 'one-part', 'categories' => 0, 'offset' => 0);
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

<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of posts to show:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php _e('Forward Posts(offset):', 'examiner'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>

<!-- Category -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>">
		<?php _e('(Optional)Select Category:', 'examiner'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['categories']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'examiner'); ?>
		</option>
		<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
		<?php foreach($categories as $category) { ?>
		<option value='<?php echo esc_attr($category->term_id); ?>' <?php if(isset($instance['categories'])){ if ($category->term_id == $instance['categories']) echo 'selected="selected"';}?>>
		<?php echo esc_html($category->cat_name); ?>
		</option>
		<?php } ?>
	</select>
</p>
<?php }} ?>