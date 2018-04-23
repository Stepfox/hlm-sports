<?php   

/* 
Author: Stefan Naumovski 
*/    


include( get_template_directory().'/widgets/odds-widget/matches-cpt-registration.php' );
include( get_template_directory().'/widgets/odds-widget/testeri.php' );
include( get_template_directory().'/widgets/odds-widget/matches-crawl.php' );



add_action( 'widgets_init', 'odds_widget' );

function odds_widget() {register_widget( 'odds_widget_hlm_sports' );}

class odds_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_odds', // Widget ID
			esc_html__('Odds Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);}
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$looks = $instance['looks'];
		

		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>


<?php 
include( locate_template( 'widgets/odds-widget/simplehtmldom.php', false, false ) ); 


if($looks == 'looks1'){
 	include( locate_template( 'widgets/odds-widget/looks-1.php', false, false ) );   
}elseif($looks == 'looks2'){
	include( locate_template( 'widgets/odds-widget/looks-2.php', false, false ) );   
}elseif($looks == 'looks3'){
	include( locate_template( 'widgets/odds-widget/looks-3.php', false, false ) );   
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



		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1' );
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







<?php }} ?>