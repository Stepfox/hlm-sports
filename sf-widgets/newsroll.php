<?php   
/* 
Plugin Name: Newsroll
Description: Posts widget displayed in newsroll. 
Version: 1.0 
Author: Stefan Naumovski 
*/    
add_action ( 'widgets_init', 'exm1_newsroll_widget' );

function exm1_newsroll_widget() {register_widget ( 'exm1_newsroll_exm1' );}

class exm1_newsroll_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */

	function __construct() {
		parent::__construct ( 
		'exm1_newsroll_exm1',	//Widget ID
		__('Newsroll', 'examiner'),	// Name
		array( 'description' => '', ) // Args
	);}
	
		/* Front-end display of widget. */
	
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Newsroll', 'number' => 3, 'categories' => 0, 'offset' => 0);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$number = $instance['number'];
		$offset = $instance['offset'];
		$categories = $instance['categories'];

						
		$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget one-part', $args['before_widget']);							
		echo $args['before_widget'];?>
<div class="newsroll">
		<?php 
		if ( ! empty( $title ) ){
				if($categories != 0){echo '<a href='.esc_url(get_category_link( $categories )).'>';}		
				echo '<div class="newsroll-title">'.esc_html($title).'</div>'; 			
				if($categories != 0){echo '</a>';}
			}
			?>

<ul>
	<?php $exm1_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => $offset )); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
	<li <?php post_class((is_sticky()?'sticky':'')); ?>>
		<div class="newsroll-posts-text">
			<span class="newsroll-date">
			<?php echo esc_html(get_the_date()); ?>
			</span>
			<div class="newsroll-posts-title">
				<a href="<?php the_permalink(); ?>">
				<?php echo wp_trim_words( get_the_title(), 10 ); ?>
				</a>
			</div>
			<!--newsroll-posts-title-->
		</div>
		<!--newsroll-posts-text-->
	</li>
	<?php endwhile; ?>
</ul>
</div>
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
		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Newsroll', 'number' => 3, 'categories' => 0, 'offset' => 0);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
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