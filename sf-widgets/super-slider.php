<?php
/* 
Plugin Name: Super Slider 
Description: Slider by selecting categories.
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action( 'widgets_init', 'super_slider_widget' );

function super_slider_widget() {register_widget( 'super_slider_exm1' );}

class super_slider_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */

	function __construct() {
		parent::__construct(
				'super_slider_widget_exm1', 	//Widget ID
				__('Super Slider', 'examiner'), // Name
				array( 'description' => '', ) // Args
		);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
			
			$defaults = array( 'title' => 'Super Slider', 'number' => 7, 'widget_size' => 'fullwidth-super-slider', 'categories' => 'all', 'author' => 'on', 'date' => 'on');
			$instance = wp_parse_args( (array) $instance, $defaults );

			$number = $instance['number'];
			$categories = $instance['categories'];
			$widget_size = $instance['widget_size'];
			$author = $instance['author'];
			$date = $instance['date'];
		
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);		
				echo $args['before_widget'];
				if ( ! empty( $title ) ){
					echo $args['before_title'];		
						if($categories != 0){echo '<a href='.esc_url(get_category_link( $categories )).'>';}		
					echo esc_html($title); 			
						if($categories != 0){echo '</a>';}
					echo $args['after_title'];}
			?>

<div class="super-slider loading">
	<ul class="slides">
			<?php $exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' =>  (3 * $number))); while($exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
			<li <?php post_class((is_sticky()?'sticky':'')); ?>>
			<div class="super-slider-part">
				<div class="super-slider-post">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('super-slider-high'); ?>
					</a>
					<?php } ?>
					<div class="super-slider-text-box">
						<div class="super-slider-category">
							<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
						</div>
						<!--super-slider-category-->
						<div class="super-slider-title">
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
								</a>
							</h2>
						</div>
						<!--super-slide-title-->
						<?php if($author || $date ) { ?>
						<div class="author-date">
							<?php if($author) { ?>
							<div class="author">
								<?php the_author_posts_link(); ?>
							</div>
							<!--author-->
							<?php } ?>
							<?php if($date) { ?>
							<div class="date">
								<?php echo esc_html(get_the_date()); ?>
							</div>
							<!--date-->
							<?php } ?>
						</div>
						<!--author-date-->
						<?php } ?>
					</div>
					<!--super-slider-text-box-->				
				</div>
				<!--super-slider-post-->				
			</div>
			<!--super-slider-part-->
			</li>
			<?php endwhile;	?>
	</ul>
</div>
<!--super-slider-->

<?php	
	/* After widget. */	
				
		echo $args['after_widget'];
	}
	
	/* Widget settings. */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;	
		
		/* Strip tags. */
					
		$instance['number'] = $new_instance['number'];
		$instance['categories'] = $new_instance['categories'];
		$instance['widget_size'] = $new_instance['widget_size'];
		$instance['author'] = $new_instance['author'];
		$instance['date'] = $new_instance['date'];		
		return $instance;
	}		
	
		/* Default widget settings. */
		
	function form( $instance ) {	
		$defaults = array( 'title' => 'Super Slider', 'number' => 7, 'widget_size' => 'fullwidth-super-slider', 'categories' => 'all', 'author' => 'on', 'date' => 'on');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Width -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('widget_size')); ?>"><?php _e('Widget width:', 'examiner');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('widget_size')); ?>" id="<?php echo esc_attr($this->get_field_id('widget_size')); ?>" class="widefat" >
		<?php $options = array('body-super-slider', 'fullwidth-super-slider');
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['widget_size']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>

<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of slides:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
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

<!-- Author -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'author' )); ?>">
		<?php _e('Show Author:', 'examiner'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'author' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'author' )); ?>" <?php checked( (bool) $instance['author'], true ); ?> />
</p>
<!-- Date -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'date' )); ?>">
		<?php _e('Show Date:', 'examiner'); ?>
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date' )); ?>" <?php checked( (bool) $instance['date'], true ); ?> />
</p>
<?php }} ?>