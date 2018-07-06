<?php   

/* 
Author: Stefan Naumovski 
*/    



add_action( 'widgets_init', 'odds_widget' );

function odds_widget() {register_widget( 'odds_widget_hlm_sports' );}

class odds_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_odds', // Widget ID
			esc_html__('Odds Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }

	}


	    public function widget_enqueue_scripts() {
			wp_enqueue_script('odds_widget_scripts', get_stylesheet_directory_uri() . '/widgets/odds-widget/odds-widget.js');
			
	    }

		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1', 'categories' => '0', 'number'=> '1', 'offset' => '0' );
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






		<?php 
	


		if($looks == 'looks1'){
		 	//include( locate_template( 'widgets/odds-widget/looks-1.php', false, false ) );   
		}elseif($looks == 'looks2'){
			//include( locate_template( 'widgets/odds-widget/looks-2.php', false, false ) );   
		}elseif($looks == 'looks3'){
			//include( locate_template( 'widgets/odds-widget/looks-3.php', false, false ) );   
		}elseif($looks == 'looks4'){
			include( locate_template( 'widgets/odds-widget/looks-4.php', false, false ) );   
		}elseif($looks == 'looks5'){
			include( locate_template( 'widgets/odds-widget/looks-5.php', false, false ) );   
		}

		?>


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
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1', 'categories' => '0', 'number'=> '1', 'offset' => '0' );
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
		$options = array('looks1', 'looks2', 'looks3', 'looks4', 'looks5' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
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


<!-- Offset posts -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>">
		<?php _e('Forward Posts(offset):', 'examiner'); ?>
	</label>
	<input type="number" min="0" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php echo esc_attr($instance['offset']); ?>" size="3" />
</p>

<!-- Sports -->
<?php $options = get_terms('sports', array('hide_empty' => '0'));


	?>





<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php _e('categories:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('categories')); ?>" id="<?php echo esc_attr($this->get_field_id('categories')); ?>" class="widefat" >
		<?php 
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option->slug); ?>' <?php if ($option == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html($option->name); ?></option>
		<?php } ?>
	</select>





</p>






<?php






 }} ?>