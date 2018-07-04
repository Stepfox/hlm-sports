<?php   

/* 
Plugin Name: Ad widget
Description: Ad widget with different sizes
Version: 1.0 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'ad_widget' );

function ad_widget() {register_widget( 'ad_widget_exm1' );}

class ad_widget_exm1 extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'ad_widget_sizes_exm1', // Widget ID
			__('Ad Widget', 'examiner'), // Name
			array( 'description' => '', ) // Args
			);}
		
		/* Front-end display of widget. */
		
		public function widget( $args, $instance ) {
			
			/* Default widget settings. */
			
			$defaults = array( 'title' =>'advertisment', 'text' =>'', 'widget_size' => 'one-part', 'link' => '', 'image' => '');
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			/* Widget settings. */
			
			$title = $instance['title'];
			$widget_size = $instance['widget_size'];
			$text = $instance['text'];
			$image = $instance['image'];
			$link = $instance['link'];

			
			
			$args['before_widget'] = str_replace('class="home-widget', 'class="home-widget '. esc_attr($widget_size) , $args['before_widget']);	
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . esc_html($title) . $args['after_title'];
			?>

<div class="ad-widget-sizes">
	<?php if (!empty($link)){echo '<a href="'.esc_url($link).'" target="_blank">';}?>
		<div class="ad-widget-box">
			<?php if (!empty($image)){echo '<img src="'.esc_url($image).'" alt=""/>';} ?>
			<?php echo $text;?>
		</div>	
	<?php if (!empty($link)){echo '</a>';}?>	
</div>
<!--ad-widget-sizes-->

<?php

			/* After widget. */

			echo $args['after_widget'];
		}
		
			/* Widget settings. */
			
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			/* Strip tags. */
			
			$instance['title'] = $new_instance['title'];
			$instance['text'] = $new_instance['text'];
			$instance['link'] = $new_instance['link'];
			$instance['image'] = $new_instance['image'];
			$instance['widget_size'] = $new_instance['widget_size'];
			
			return $instance;
		}
				
		function form( $instance ) {
			
			/* Default widget settings. */
			
			$defaults = array( 'title' =>'advertisment', 'text' =>'', 'widget_size' => 'one-part', 'link' => '', 'image' => '');
			$instance = wp_parse_args( (array) $instance, $defaults );
			$text = $instance['text'];
			 ?>

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

<!--image-->

<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>">
		<?php _e('Image url:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" value="<?php echo esc_url($instance['image']); ?>" style="width:100%;" />
</p>

<!--link-->

<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'link' )); ?>">
		<?php _e('Link to:', 'examiner'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>" value="<?php echo esc_url($instance['link']); ?>" style="width:100%;" />
</p>

<!-- Ad code-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>">
		<?php _e('Code text(alternative way, just leave image and link empty and paste the code here):', 'examiner'); ?>
	</label>
	<textarea class="widefat" rows="6" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>">
<?php echo $text; ?>
</textarea>
</p>

<?php }} ?>