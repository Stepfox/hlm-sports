<?php   


add_action( 'widgets_init', 'hlm_landing_widget' );

function hlm_landing_widget() {register_widget( 'hlm_sports_landing_widget' );}

class hlm_sports_landing_widget extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'landing_widget_hlm_sports', // Widget ID
			esc_html__('Landing widget', 'hlm-sports'), // Name
			array( 'description' => '', ) // Args
			);

			add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('landing_widget_widget', get_stylesheet_directory_uri() . '/widgets/landing-widget/landing-widget.css');
			wp_enqueue_script('landing_widget_widget_script', get_stylesheet_directory_uri() . '/widgets/landing-widget/landing-widget.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('landing-widget-script-back', get_stylesheet_directory_uri() . '/widgets/landing-widget/landing-widget-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'landing-widget-style-back', get_stylesheet_directory_uri().'/widgets/landing-widget/landing-widget-back.css');	  	
		}

	
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		

		$widget_id = $this->id;
		//$title = get_field( 'title', 'widget_' . $widget_id );

		$defaults = array( 'title' => 'Landing widget', 'title_style' => 'title1', 'looks' => 'landing1', 'bonus' => array('0' => ''), 'bookmaker' => array('0' => ''), 'tooltip'=> array('0' => ''), 'image'=> array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults );



		$title = $instance['title'];
		$title_style = $instance['title_style'];
		$looks = $instance['looks'];
		$bonus = $instance['bonus'];
		$bookmaker = $instance['bookmaker'];
		$tooltip = $instance['tooltip'];
		$image = $instance['image'];

		$widget_classname = $instance['widget_size'];

		$args['before_title'] = str_replace('class="widget-title', 'class="widget-title '. esc_attr($title_style) , $args['before_title']);

        echo $args['before_widget'];

        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        ?>

<div class="landing-widget <?php echo esc_attr($looks);?>">



<ul>
<?php for($i = 0; $i < count($bonus); $i++){

    		$bookmaker_id = $bookmaker[$i];

if($looks == 'landing1'){
	include( locate_template( 'widgets/landing-widget/landing-1.php', false, false ) );  	
}elseif($looks == 'landing2'){
	include( locate_template( 'widgets/landing-widget/landing-2.php', false, false ) );  	
}elseif($looks == 'landing3'){
	include( locate_template( 'widgets/landing-widget/landing-3.php', false, false ) );  
}elseif($looks == 'landing4'){
	include( locate_template( 'widgets/landing-widget/landing-4.php', false, false ) );  
}elseif($looks == 'landing5'){
	include( locate_template( 'widgets/landing-widget/landing-5.php', false, false ) );  
}elseif($looks == 'landing6'){
	include( locate_template( 'widgets/landing-widget/landing-6.php', false, false ) );  
}

  } ?>


</ul>

</div>









<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['title_style'] = $new_instance['title_style'];
		$instance['looks'] = $new_instance['looks'];
		$instance['bonus'] = $new_instance['bonus'];
		$instance['bookmaker'] = $new_instance['bookmaker'];
		$instance['tooltip'] = $new_instance['tooltip'];
		$instance['image'] = $new_instance['image'];
		
	
		$instance['looks'] = $new_instance['looks'];
		return $instance;
	}


	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Landing widget', 'title_style' => 'title1', 'looks' => 'landing1', 'bonus' => array('0' => ''), 'bookmaker' => array('0' => ''), 'tooltip'=> array('0' => ''), 'image'=> array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>

	<!-- Title Style -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('title_style')); ?>"><?php _e('Title Style:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('title_style')); ?>" id="<?php echo esc_attr($this->get_field_id('title_style')); ?>" class="widefat" >
		<?php 
		$options = array('title1', 'title2' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['title_style']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>

<!-- Looks -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('looks')); ?>"><?php _e('Looks:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('looks')); ?>" id="<?php echo esc_attr($this->get_field_id('looks')); ?>" class="widefat" >
		<?php 
		$options = array('landing1', 'landing2', 'landing3', 'landing4', 'landing5', 'landing6'  );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>
	







<p>
	<div class="repeatable-rows">
<?php 		

        for($i = 0; $i < count($instance['bonus']); $i++){
        		$repeat_name = $instance['bonus'][$i];
        		$repeat_bookmaker = $instance['bookmaker'][$i];
        		$repeat_tooltip = $instance['tooltip'][$i];
        		$repeat_image = $instance['image'][$i];
			?>	
			
			<div class="row">

				
				<div class="image-part">				
					<div class="image-preview">Move &#9650;&#9660;</div>
				</div>
				<h3>
					Pick a Bookmaker
				</h3>
<div class="text-part">
	   			<?php 	$args = array('post_type' => 'bookmaker', 'posts_per_page' => -1, 'orderby' => 'title', 'order'   => 'ASC');
						$options = get_posts($args);?>
	 
	        		<select field="<?php echo $this->get_field_name( 'bookmaker' ); ?>" name="<?php echo $this->get_field_name( 'bookmaker' ); ?>[]">
	        			<option value="select_fighter">
	        				<?php _e('Choose Bookmaker:', 'hlm-sports'); ?>
						</option>
						<?php 
						foreach ($options as $option) {?>
						<option value='<?php echo esc_attr($option->ID); ?>' <?php if(isset($repeat_bookmaker)){ if ($option->ID == $repeat_bookmaker) echo 'selected="selected"';}?>><?php echo esc_html($option->post_title);?></option>
						<?php } ?>
					</select>
</div>




				<h3>
					Write the Bonus
				</h3>
				<div class="image-part">
					<input type="hidden" field="<?php echo $this->get_field_name( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>[]" value="<?php echo $repeat_image;?>" class="widefat image_save">
					<img class="image-preview" src="<?php echo $repeat_image;?>" width="100" />
					<input type= "button" class="button add_image_button" name="add_image_button" value="Image" />
				</div>
			<div class="text-part">
				<input type="text" field="<?php echo $this->get_field_name( 'bonus' ); ?>" name="<?php echo $this->get_field_name( 'bonus' ); ?>[]" value="<?php echo $repeat_name; ?>" placeholder="The bonus" class="repeater-title widefat text-field">

			</div>

			<div class="text-part">
				<input type="text" field="<?php echo $this->get_field_name( 'tooltip' ); ?>" name="<?php echo $this->get_field_name( 'tooltip' ); ?>[]" value="<?php echo $repeat_tooltip; ?>" placeholder="The tooltip" class="repeater-title widefat text-field">

			</div>


				<a class="button remove-row" href="#">
					<?php echo 'Delete'; ?>
				</a>
			</div><!-- row-->







	<?php	 }?>

			<a  class="add-row-repeater button" href="#">
				<?php echo '+ Add another'; ?>
				</a>

	
	</div>
	</p>

<?php }} ?>