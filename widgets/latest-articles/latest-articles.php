<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'latest_articles_widget' );

function latest_articles_widget() {register_widget( 'latest_articles_widget_hlm_sports' );}

class latest_articles_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_latest_articles', // Widget ID
			esc_html__('Latest articles', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);}
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Latest Articles widget', 'number' => '3', 'offset' => '0', 'categories' => 'all', 'looks' => 'looks1' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$looks = $instance['looks'];
		
		$number = $instance['number'];
		$offset = $instance['offset'];
		$categories = $instance['categories'];

		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>


<div class="latest-articles <?php echo esc_attr($looks);?>">
	<ul class="latest-articles-thumbnails">
        	<?php $hlm_sports_posts = new WP_Query(array( 'cat' => $categories, 'posts_per_page' => $number, 'offset' => $offset )); while ( $hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post(); ?>
<?php 

if($looks == 'looks1'){
 	include( locate_template( 'widgets/latest-articles/looks-1.php', false, false ) );   
}elseif($looks == 'looks2'){
	include( locate_template( 'widgets/latest-articles/looks-2.php', false, false ) );   
}elseif($looks == 'looks3'){
	include( locate_template( 'widgets/latest-articles/looks-3.php', false, false ) );   
}



 endwhile; ?>
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
		$instance['looks'] = $new_instance['looks'];
		
		$instance['number'] = $new_instance['number'];
		$instance['offset'] = $new_instance['offset'];
		$instance['categories'] = $new_instance['categories'];



		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Latest Articles widget', 'number' => '3', 'offset' => '0', 'categories' => 'all', 'looks' => 'looks1' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

<!-- Looks -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('looks')); ?>"><?php _e('Looks:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('looks')); ?>" id="<?php echo esc_attr($this->get_field_id('looks')); ?>" class="widefat" >
		<?php 
		$options = array('looks1', 'looks2', 'looks3' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>


<!-- Number of posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
		<?php _e('Number of posts to show:', 'dawn-magazine'); ?>
	</label>
	<input type="number" min="1" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
</p>

<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php _e('Forward Posts(offset):', 'dawn-magazine'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>
<!-- Category -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>">
		<?php _e('(Optional)Select Category:', 'dawn-magazine'); ?>
	</label>
	<select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" style="width:100%;">
		<option value='all' <?php if ('all' == (isset($instance['categories']))) echo 'selected="selected"'; ?>>
		<?php _e('All Categories', 'dawn-magazine'); ?>
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