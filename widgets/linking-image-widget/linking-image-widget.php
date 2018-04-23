<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'linking_image_widget' );

function linking_image_widget() {register_widget( 'linking_image_widget_hlm_sports' );}

class linking_image_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_linking_image', // Widget ID
			esc_html__('Linking Image Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);

			add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

            if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
                add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
            }
	}

        public function widget_enqueue_scripts() {
            wp_enqueue_style('linking-image-front', get_stylesheet_directory_uri() . '/widgets/linking-image-widget/linking-image-front.css');
            
        }


		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('linking-image-script-back', get_stylesheet_directory_uri() . '/widgets/linking-image-widget/linking-image-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'linking-image-style-back', get_stylesheet_directory_uri().'/widgets/linking-image-widget/linking-image-back.css');	  	
		}



		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Linking Image Widget', 'color' => 'green', 'position' => 'bottom', 'name' => '', 'image' => '', 'link' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$image = $instance['image'];
		$name = $instance['name'];
		$link = $instance['link'];
		$color = $instance['color'];
		$position = $instance['position'];

		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>



<div class="linking-image <?php echo esc_attr($color);?> <?php echo esc_attr($position);?> <?php if(empty($image)){ echo 'button-only';}?> ">
	<ul class="linking-image-thumbnails">
		<li>
			<div class="linking-image-posts-image">
				<a href="<?php echo esc_attr($link);?>" title="<?php echo esc_attr($name);?>">
                   
                    <img src="<?php echo esc_html($image);?>">
                   
				</a>
			</div>
			<div class="linking-image-posts-text">
				<a href="<?php echo esc_attr($link);?>" title="<?php echo esc_attr($name);?>">
					<div class="linking-image-bet-now">
						<?php echo esc_html($name);?>
					</div>
				</a>
			</div>
		</li>
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
		$instance['image'] = $new_instance['image'];
		$instance['name'] = $new_instance['name'];
		$instance['link'] = $new_instance['link'];
		$instance['color'] = $new_instance['color'];
		$instance['position'] = $new_instance['position'];


		return $instance;
	}
	

	function form( $instance ) {

		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Linking Image Widget', 'color' => 'green', 'position' => 'bottom', 'name' => '', 'image' => '', 'link' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 

		/* Default widget settings. */

		?>




<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>


<!-- Position -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('position')); ?>"><?php _e('Position of the button:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('position')); ?>" id="<?php echo esc_attr($this->get_field_id('position')); ?>" class="widefat" >
		<?php 
		$options = array('top', 'bottom'  );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['position']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>


<!-- Color -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('color')); ?>"><?php _e('Color of the button:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('color')); ?>" id="<?php echo esc_attr($this->get_field_id('color')); ?>" class="widefat" >
		<?php 
		$options = array('orange', 'green'  );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['color']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>




<p>
	<div class="row">
		<div class="image-part">
			<input type="hidden" field="<?php echo $this->get_field_name( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image'];?>" class="widefat image_save">
			<img class="image-preview" src="<?php echo $instance['image'];?>" width="100" />
			<input type= "button" class="button add_image_button" name="add_image_button" value="Image" />
		</div>

	<div class="text-part">
		<input type="text" field="<?php echo $this->get_field_name( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name'];?>" placeholder="Title of the Button" class="repeater-title widefat text-field">
		
		
		<input type="text" field="<?php echo $this->get_field_name( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link'];?>" placeholder="Link to the Page" class="repeater-link widefat text-field">
	</div>
		<a class="button remove-row" href="#">
			<?php echo 'Delete'; ?>
		</a>
	</div><!-- row-->
</p>



<?php
	}
}


function linking_image_widget_hlm_sports_shortcode_scripts() {
    global $post;
    if( has_shortcode( $post->post_content, 'linking_image_widget_hlm_sports_shortcode') ) {

    wp_enqueue_style('linking-image-front', get_stylesheet_directory_uri() . '/widgets/linking-image/linking-image-front.css'); 
    }
}
add_action( 'wp_enqueue_scripts', 'linking_image_widget_hlm_sports_shortcode_scripts');

?>