<?php   


add_action( 'widgets_init', 'hlm_sports_payment_options' );

function hlm_sports_payment_options() {register_widget( 'hlm_sports_payment_options_widget' );}

class hlm_sports_payment_options_widget extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'payment_options_hlm_sports', // Widget ID
			esc_html__('Payment Options widget', 'hlm-sports'), // Name
			array( 'description' => '', ) // Args
			);

			add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('payment_options_widget', get_stylesheet_directory_uri() . '/widgets/payment-options-widget/payment-options-widget.css');
			wp_enqueue_script('payment_options_widget_script', get_stylesheet_directory_uri() . '/widgets/payment-options-widget/payment-options-widget.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('payment-options-script-back', get_stylesheet_directory_uri() . '/widgets/payment-options-widget/payment-options-widget-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'payment-options-style-back', get_stylesheet_directory_uri().'/widgets/payment-options-widget/payment-options-widget-back.css');	  	
		}

	
		
		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		

		$widget_id = $this->id;
		//$title = get_field( 'title', 'widget_' . $widget_id );

		$defaults = array( 'title' => 'Payment Options widget', 'bookmaker' => array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults );



		$title = $instance['title'];
		$bookmaker = $instance['bookmaker'];



        echo $args['before_widget'];

        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        ?>

<div class="payment-options  post-content">



<ul>
<?php for($i = 0; $i < count($bookmaker); $i++){

    		$bookmaker_id = $bookmaker[$i];


 	include( locate_template( 'widgets/payment-options-widget/looks-1.php', false, false ) );   


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

		$instance['bookmaker'] = $new_instance['bookmaker'];

		return $instance;
	}


	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'Payment Options widget', 'bookmaker' => array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>



	





<p>
	<div class="repeatable-rows">
<?php 		

        for($i = 0; $i < count($instance['bookmaker']); $i++){

        		$repeat_bookmaker = $instance['bookmaker'][$i];

			?>	
			
			<div class="row">
				<div class="image-part">				
					<div class="image-preview">Move &#9650;&#9660;</div>
				</div>
				<h3>
					Pick a Payment Option
				</h3>
<div class="text-part">
	   			<?php 	$args = array('post_type' => 'payment_option', 'posts_per_page' => -1, 'orderby' => 'title', 'order'   => 'ASC');
						$options = get_posts($args);?>
	 
	        		<select field="<?php echo $this->get_field_name( 'bookmaker' ); ?>" name="<?php echo $this->get_field_name( 'bookmaker' ); ?>[]">
	        			<option value="select_fighter">
	        				<?php _e('Choose Payment Option:', 'hlm-sports'); ?>
						</option>
						<?php 
						foreach ($options as $option) {?>
						<option value='<?php echo esc_attr($option->ID); ?>' <?php if(isset($repeat_bookmaker)){ if ($option->ID == $repeat_bookmaker) echo 'selected="selected"';}?>><?php echo esc_html($option->post_title);?></option>
						<?php } ?>
					</select>
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