<?php   
/* 
Plugin Name: Most commented
Description: Most commented widget - display most commented posts.
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'most_commented_posts' );

function most_commented_posts() {register_widget( 'most_commented_widget_exm1' );}

class most_commented_widget_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'most_commented_widget_exm1', // Widget ID
			__('Most commented posts', 'examiner'), // Name
			array( 'description' =>'', ) // Args
			);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
		/* Default widget settings. */
		
			$defaults = array( 'title' => 'Most commented', 'number' => 2, 'comment_type' => 'most-commented');
			$instance = wp_parse_args( (array) $instance, $defaults );			

			$title = $instance['title'];
			$comment_type = $instance['comment_type'];
			$number = $instance['number'];
			
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget one-part' , $args['before_widget']);	
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . esc_html($title) . $args['after_title'];	
			?>

<div class="most-commented">
<?php if ($comment_type != 'recent'){ ?>

	<ul class="most-commented-posts">
		<?php $most_commented_query = new WP_Query('orderby=comment_count&posts_per_page='.esc_html($number).''); 
		while ($most_commented_query->have_posts()) : $most_commented_query->the_post(); ?>
		<li <?php post_class((is_sticky()?'sticky':'')); ?>>
			<div class="most-commented-cateogory">
			<?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
			</div>
			<!--most-commented-cateogory-->
			<div class="most-commented-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
				</a>
			</div>
			<!--most-commented-title-->
			<div class="most-commented-count">
				<?php comments_popup_link('0', '1', '%'); ?>
			</div>
			<!--comment-count-->
		</li>
		<?php endwhile; ?>
	</ul>
<?php }else{?>
	<ul class="most-commented-posts">
	<?php		$recent_comments = get_comments( array(
				'number'    => $number,
				'status'    => 'approve'
				) );

			foreach($recent_comments as $comment) :?>
			<li>
				<div class="most-commented-cateogory">
				<a href="<?php the_permalink(); ?>">
				<?php echo $comment->comment_author; ?>
				</a>
				</div>
				<!--most-commented-cateogory-->
				<div class="most-commented-title">
					<a href="<?php the_permalink(); ?>">
					<?php echo esc_html(wp_trim_words($comment->comment_content, 15)); ?>
					</a>
				</div>
				<!--most-commented-title-->
			</li>
			<?php endforeach; ?>
	</ul>
	<!-- most-commented-posts -->
<?php } ?>

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
		
		$instance['title'] = $new_instance['title'];
		$instance['comment_type'] = $new_instance['comment_type'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	
	function form( $instance ) {
		
	/* Default widget settings. */
		
		$defaults = array( 'title' => 'Most commented', 'number' => 2, 'comment_type' => 'most-commented');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!-- Comments type -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('comment_type')); ?>"><?php _e('Comment Type:', 'examiner');?> </label>
	<select name="<?php echo esc_attr($this->get_field_name('comment_type')); ?>" id="<?php echo esc_attr($this->get_field_id('comment_type')); ?>" class="widefat" >
		<?php $options = array('recent', 'most-commented');
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['comment_type']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
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