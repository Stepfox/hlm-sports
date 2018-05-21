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
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1', 'categories' => '0', 'sport888' => '0' , 'williamhill' => '0' , 'betathome' => '0' , 'bethard' => '0' , 'bet365'  => '0'  );
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$looks = $instance['looks'];
		$categories = $instance['categories'];
	
		$sport888_id = $instance['sport888'];
		$williamhill_id = $instance['williamhill'];
		$betathome_id = $instance['betathome'];
		$bethard_id = $instance['bethard'];
		$bet365_id = $instance['bet365'];


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
		$instance['categories'] = $new_instance['categories'];

		$instance['sport888'] = $new_instance['sport888'];
		$instance['williamhill'] = $new_instance['williamhill'];
		$instance['betathome'] = $new_instance['betathome'];
		$instance['bethard'] = $new_instance['bethard'];
		$instance['bet365'] = $new_instance['bet365'];

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Odds widget', 'looks' => 'looks1', 'categories' => '0', 'sport888' => '0' , 'williamhill' => '0' , 'betathome' => '0' , 'bethard' => '0' , 'bet365'  => '0' );
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
		$options = array('looks1', 'looks2', 'looks3', 'looks4' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>




<!-- Sports -->
<?php $options = array(
'54a22a0cd443afef088b46db' => 'World Cup',
'54a22a10d443afef088b4719' => 'Friendly Internationals',
'54a229f8d443afef088b45b4' => 'Premier League', 
'576243df1d142240108b471d' => 'Championship',
'54a229fad443afef088b45c9' => 'Bundesliga',
'54a229fcd443afef088b45f0' => 'Serie A',
'54a229f9d443afef088b45bc' => 'Ligue 1',
'576250f41d142264208b4795' => 'Primera Division',
);


	?>





<p>
	<label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php _e('categories:', 'hlm-sports');?></label>
	<select name="<?php echo esc_attr($this->get_field_name('categories')); ?>" id="<?php echo esc_attr($this->get_field_id('categories')); ?>" class="widefat" >
		<?php 
		foreach ($options as $option => $value) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html($value); ?></option>
		<?php } ?>
	</select>
</p>






<?php

$sport888 = 'sport888'; 
$williamhill = 'williamhill'; 
$betathome = 'betathome'; 
$bethard = 'bethard'; 
$bet365 = 'bet365'; 

$bookmakers_array = array(
						$sport888,
						$williamhill,
						$betathome,
						$bethard,
						$bet365
					);

foreach($bookmakers_array as $item){
?>

<p>
	   			<?php 	$args = array('post_type' => 'bookmaker', 'posts_per_page' => -1, 'orderby' => 'title', 'order'   => 'ASC');
						$options = get_posts($args);?>
	 
	        		<select field="<?php echo $this->get_field_name( $item ); ?>" name="<?php echo $this->get_field_name( $item ); ?>">
	        			<option value="select_fighter">
	        				<?php echo 'pick '. $item; ?>
						</option>
						<?php 
						foreach ($options as $option) {?>
						<option value='<?php echo esc_attr($option->ID); ?>' <?php if(isset($instance[$item])){ if ($option->ID == $instance[$item]) echo 'selected="selected"';}?>><?php echo esc_html($option->post_title);?></option>
						<?php } ?>
					</select>
</p>

<?php 
}



 }} ?>