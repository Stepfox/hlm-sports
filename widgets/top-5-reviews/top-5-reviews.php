<?php   


add_action( 'widgets_init', 'hlm_sports_232x310' );

function hlm_sports_232x310() {register_widget( 'hlm_sports_232x310_widget' );}

class hlm_sports_232x310_widget extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'top_5_reviews_hlm_sports', // Widget ID
			esc_html__('Top 5 Reviews widget', 'hlm-sports'), // Name
			array( 'description' => '', ) // Args
			);

			add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ), 0 );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('top_5_reviews_widget', get_stylesheet_directory_uri() . '/widgets/top-5-reviews/top-5-reviews.css');
			wp_enqueue_script('top_5_reviews_widget_script', get_stylesheet_directory_uri() . '/widgets/top-5-reviews/top-5-reviews.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('top-5-reviews-script-back', get_stylesheet_directory_uri() . '/widgets/top-5-reviews/top-5-reviews-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'top-5-reviews-style-back', get_stylesheet_directory_uri().'/widgets/top-5-reviews/top-5-reviews-back.css');	  	
		}

	
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		

		$widget_id = $this->id;
		//$title = get_field( 'title', 'widget_' . $widget_id );

		$defaults = array( 'title' => 'Top 5 Reviews widget', 'biglooks_bonus_title' => '', 'biglooks_bonus_one' => '', 'biglooks_bonus_two' => '', 'biglooks_bonus_three' => '',  'looks' => 'looks1', 'bonus' => array('0' => ''), 'bookmaker' => array('0' => ''), 'tooltip'=> array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults );



		$title = $instance['title'];
		$looks = $instance['looks'];
		$bonus = $instance['bonus'];
		$bookmaker = $instance['bookmaker'];
		$tooltip = $instance['tooltip'];

		
		$biglooks_bonus_title = $instance['biglooks_bonus_title'];
		$biglooks_bonus_one = $instance['biglooks_bonus_one'];
		$biglooks_bonus_two = $instance['biglooks_bonus_two'];
		$biglooks_bonus_three = $instance['biglooks_bonus_three'];
		$biglooks_tooltip = $instance['biglooks_tooltip'];


        echo $args['before_widget'];

        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        ?>

<div class="top-5-reviews <?php if($looks != 'looks6'){echo esc_attr($looks);}else{echo 'looks5 looks6';}?>">



<ul>
<?php for($i = 0; $i < count($bonus); $i++){

    		$bookmaker_id = $bookmaker[$i];

if($looks == 'looks1'){
 	include( locate_template( 'widgets/top-5-reviews/looks-1.php', false, false ) );   
}elseif($looks == 'looks2'){
	include( locate_template( 'widgets/top-5-reviews/looks-2.php', false, false ) );   
}elseif($looks == 'looks3'){
	include( locate_template( 'widgets/top-5-reviews/looks-3.php', false, false ) );   
}elseif($looks == 'looks4'){
	include( locate_template( 'widgets/top-5-reviews/looks-4.php', false, false ) );  
}elseif($looks == 'looks5'){
	if($i == 0){
	include( locate_template( 'widgets/top-5-reviews/biglooks-5.php', false, false ) );  
	}else{
	include( locate_template( 'widgets/top-5-reviews/looks-5.php', false, false ) );  
	}
}elseif($looks == 'looks6'){
	include( locate_template( 'widgets/top-5-reviews/looks-5.php', false, false ) );  
}

  } ?>


</ul>

<?php if($looks == 'looks1'){ ?>
<div class="see-all-bookmakers-wrap">
	<a href="<?php echo get_post_type_archive_link( 'bookmaker' ); ?>">
	<div class="see-all-bookmakers-button">
		<?php the_field('see_the_best_betting_site_reviews', 'option');  ?>  &nbsp; <span>&#8594;</span>
	</div>
	</a>
</div>
<?php } ?>


</div>









<?php
		/* After widget. */
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags. */
		
		$instance['title'] = $new_instance['title'];
		$instance['looks'] = $new_instance['looks'];
		$instance['bonus'] = $new_instance['bonus'];
		$instance['bookmaker'] = $new_instance['bookmaker'];
		$instance['tooltip'] = $new_instance['tooltip'];
		
		


		$instance['biglooks_tooltip'] = $new_instance['biglooks_tooltip'];
		$instance['biglooks_bonus_title'] = $new_instance['biglooks_bonus_title'];
		$instance['biglooks_bonus_one'] = $new_instance['biglooks_bonus_one'];
		$instance['biglooks_bonus_two'] = $new_instance['biglooks_bonus_two'];
		$instance['biglooks_bonus_three'] = $new_instance['biglooks_bonus_three'];
		$instance['looks'] = $new_instance['looks'];
		return $instance;
	}


	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Top 5 Reviews widget', 'biglooks_bonus_title'=>'', 'biglooks_bonus_one' => '', 'biglooks_bonus_two' => '', 'biglooks_bonus_three' => '', 'biglooks_tooltip' => '', 'looks' => 'looks1', 'bonus' => array('0' => ''), 'bookmaker' => array('0' => ''), 'tooltip'=> array('0' => ''));
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
		$options = array('looks1', 'looks2', 'looks3', 'looks4', 'looks5', 'looks6' );
		foreach ($options as $option) {?>
		<option value='<?php echo esc_attr($option); ?>' <?php if ($option == $instance['looks']) echo 'selected="selected"'; ?>><?php echo esc_html($option); ?></option>
		<?php } ?>
	</select>
</p>
	
<div class="big-looks">

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_title' )); ?>">
			<?php _e('biglooks bonus title:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_bonus_title' )); ?>" value="<?php echo esc_textarea($instance['biglooks_bonus_title']); ?>"  />
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_one' )); ?>">
			<?php _e('biglooks bonus one:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_one' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_bonus_one' )); ?>" value="<?php echo esc_textarea($instance['biglooks_bonus_one']); ?>"  />
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_two' )); ?>">
			<?php _e('biglooks bonus two:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_two' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_bonus_two' )); ?>" value="<?php echo esc_textarea($instance['biglooks_bonus_two']); ?>"  />
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_three' )); ?>">
			<?php _e('biglooks bonus three:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_three' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_bonus_three' )); ?>" value="<?php echo esc_textarea($instance['biglooks_bonus_three']); ?>"  />
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_tooltip' )); ?>">
			<?php _e('biglooks tooltip:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_tooltip' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_tooltip' )); ?>" value="<?php echo esc_textarea($instance['biglooks_tooltip']); ?>"  />
	</p>


</div>














<p>
	<div class="repeatable-rows">
<?php 		

        for($i = 0; $i < count($instance['bonus']); $i++){
        		$repeat_name = $instance['bonus'][$i];
        		$repeat_bookmaker = $instance['bookmaker'][$i];
        		$repeat_tooltip = $instance['tooltip'][$i];
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