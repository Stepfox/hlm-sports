<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'betting_strategies_widget' );

function betting_strategies_widget() {register_widget( 'betting_strategies_widget_hlm_sports' );}

class betting_strategies_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_betting_strategies', // Widget ID
			esc_html__('Betting Strategies', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('hlm_sports_betting_strategies_widget_style', get_stylesheet_directory_uri() . '/widgets/betting-strategies/betting-strategies.css');
			wp_enqueue_script('hlm_sports_betting_strategies_widget', get_template_directory_uri() . '/widgets/betting-strategies/betting-strategies.js', array('jquery'));
			
	    }



		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Betting Strategies widget', 'nav_menu' => '', 'looks' => 'looks1');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$looks = $instance['looks'];
		$nav_menu = wp_get_nav_menu_object( $instance['nav_menu'] );
			if ( ! $nav_menu ) {
				return;
			}


		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
		?>

        <div class="betting-strategies <?php echo esc_attr($looks);?>">
            <ul class="betting-strategies-item">
                        <?php

$primaryNav = wp_get_nav_menu_items($nav_menu); // Get the array of wp obj

foreach ( $primaryNav as $navItem ) {


// set the image url
$image_url = get_post_meta( $navItem->ID, 'menu-item-field-01', true );
 
// store the image ID in a var
$image_id = hlm_sports_get_image_id($image_url);
 
// retrieve the thumbnail size of our image
$image_thumb = wp_get_attachment_image_src($image_id, 'hlm_sports_40x40');

// display the image



    echo '<li><div class="menu-icon"><img src="'.$image_thumb[0].'"/></div><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';

}
?>


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
		$instance['nav_menu'] = $new_instance['nav_menu'];
		$instance['looks'] = $new_instance['looks'];


		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Betting Strategies widget', 'looks' => 'looks1', 'nav_menu' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); // Get menus list
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		// If no menu exists, direct the user to create some.
		if ( ! $menus ) {
			echo '<p>' . sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'better-menu-widget' ), admin_url( 'nav-menus.php' ) ) . '</p>';
			return;
		}
		?>

    <!-- Widget Title-->
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
            <?php _e('Title:', 'hlm-sports'); ?>
        </label>
        <input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
    </p>
    <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>">
	<?php _e('Select Menu:', 'hlm-sports'); ?>
	</label>
		<select id="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>"
		        name="<?php echo esc_attr($this->get_field_name( 'nav_menu' )); ?>">
			<?php
			foreach ( $menus as $menu ) {
				$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
				echo '<option' . $selected . ' value="' . $menu->term_id . '">' . $menu->name . '</option>';
			}
			?>
		</select>
	</p>

<!-- Looks -->
<p>
	<label for="<?php echo esc_attr($this->get_field_id('looks')); ?>"><?php _e('Looks:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('looks')); ?>" id="<?php echo esc_attr($this->get_field_id('looks')); ?>" class="widefat" >
		<?php 
		$options = array('looks1', 'looks2' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>


<?php }
}

?>