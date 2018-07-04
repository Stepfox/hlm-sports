<?php   
/* 
Plugin Name: Trending Posts
Description: Trending posts - most popular
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'trending_posts' );

function trending_posts() {register_widget( 'trending_widget_exm1' );}

class trending_widget_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'trending_widget_exm1', // Widget ID
			__('Trending posts', 'examiner'), // Name
			array( 'description' =>'', ) // Args
			);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
		/* Default widget settings. */
		
			$defaults = array( 'title' => 'Trending posts', 'number' => 4, 'duration' => 'forever');
			$instance = wp_parse_args( (array) $instance, $defaults );			

			$title = $instance['title'];
			$duration = $instance['duration'];
			$number = $instance['number'];
			
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget one-part' , $args['before_widget']);	
			echo $args['before_widget'];
			?>

<div class="trending-posts">
	<?php 			
		if ( ! empty( $title ) )
		echo  '<div class="trending-title">'.esc_html($title).'</div>';
	?>
	<ul>
<?php 
if( $duration == 'week'){					
	$week = date('W');
		$pop = array(
			'posts_per_page'=> $number,
			'w' => $week,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);
			
} elseif ($duration == 'year'){
	$year = date('Y');
		$pop = array(
			'posts_per_page'=> $number,
			'year'     => $year,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);	
} elseif($duration == 'month'){	
	$month = date('m');
		$pop = array(
			'posts_per_page'=> $number,
			'monthnum'     => $month,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);
}elseif($duration == 'forever'){
		$pop = array(
			'posts_per_page'=> $number,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order'    => 'DESC'
			);	
}




$exm1_posts = new WP_Query($pop); while ( $exm1_posts->have_posts()) : $exm1_posts->the_post();
?>



		<li <?php post_class((is_sticky()?'sticky':'')); ?>>
		
			<div class="trending-posts-title">
			<div class="trending-posts-category">
			<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
			</div>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
				</a>
			</div>
			<!--trending-posts-title-->
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<!--most-commented-->

<?php

	/* After widget. */
	
	echo $args['after_widget'];
	}


	/* Widget settings. */


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
	/* Strip tags. */
		
		$instance['title'] =  $new_instance['title'];
		$instance['duration'] =  $new_instance['duration'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	
	function form( $instance ) {
		
	/* Default widget settings. */
		
		$defaults = array('title' => 'Trending posts', 'number' => 4, 'duration' => 'forever');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!--Duration-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('duration')); ?>"><?php _e('Popular time:', 'examiner'); ?></label>
	<select name="<?php echo esc_attr($this->get_field_name('duration')); ?>" id="<?php echo esc_attr($this->get_field_id('duration')); ?>" class="widefat" >
		<?php $options = array('week', 'month', 'year', 'forever');
		foreach ($options as $option) {?>
		<option value='<?php echo esc_html($option); ?>' <?php if ($option == $instance['duration']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>

<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of posts to show:', 'examiner'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>
<?php }} ?>