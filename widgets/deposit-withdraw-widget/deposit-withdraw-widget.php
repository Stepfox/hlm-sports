<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'deposit_withdraw_widget' );

function deposit_withdraw_widget() {register_widget( 'deposit_withdraw_widget_hlm_sports' );}

class deposit_withdraw_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_deposit_withdraw', // Widget ID
			esc_html__('DEPOSIT-WITHDRAW Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);
					add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('deposit_withdraw_widget', get_stylesheet_directory_uri() . '/widgets/deposit-withdraw-widget/deposit-withdraw-widget.css');
			wp_enqueue_script('deposit_withdraw_widget_script', get_stylesheet_directory_uri() . '/widgets/deposit-withdraw-widget/deposit-withdraw-widget.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('deposit-withdraw-widget-script-back', get_stylesheet_directory_uri() . '/widgets/deposit-withdraw-widget/deposit-withdraw-widget-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'deposit-withdraw-widget-style-back', get_stylesheet_directory_uri().'/widgets/deposit-withdraw-widget/deposit-withdraw-widget-back.css');	  	
		}

		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
			$defaults = array( 
			 'title' => 'Deposit Withdraw widget',
			 'biglooks_deposit' => '0',
			 'biglooks_bonus_title' => '',
			 'biglooks_bonus_one' => '',
			 'biglooks_bonus_two' => '',
			 'biglooks_bonus_three' => '',
			 'bonus' => array('0' => ''),
			 'deposit' => array('0' => ''),
			 'withdraw' => array('0' => ''),
			 'bookmaker' => array('0' => ''),
			);

		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];

		$bonus = $instance['bonus'];
		$deposit = $instance['deposit'];
		$withdraw = $instance['withdraw'];
		$bookmaker = $instance['bookmaker'];
		$biglooks_deposit = $instance['biglooks_deposit'];



		
		$biglooks_bonus_title = $instance['biglooks_bonus_title'];
		$biglooks_bonus_one = $instance['biglooks_bonus_one'];
		$biglooks_bonus_two = $instance['biglooks_bonus_two'];
		$biglooks_bonus_three = $instance['biglooks_bonus_three'];


		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>






<div class="deposit-withdraw-reviews looks5">
<ul>

<?php for($i = 0; $i < count($bonus); $i++){

    		$bookmaker_id = $bookmaker[$i];

	if($i == 0){
	include( locate_template( 'widgets/deposit-withdraw-widget/biglooks-5.php', false, false ) );  
	}else{
	include( locate_template( 'widgets/deposit-withdraw-widget/looks-5.php', false, false ) );  
	}

  } ?>
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
		$instance['bonus'] = $new_instance['bonus'];
		$instance['deposit'] = $new_instance['deposit'];
		$instance['withdraw'] = $new_instance['withdraw'];
		$instance['bookmaker'] = $new_instance['bookmaker'];

		
		
		
		$instance['biglooks_bonus_title'] = $new_instance['biglooks_bonus_title'];
		$instance['biglooks_deposit'] = $new_instance['biglooks_deposit'];
		$instance['biglooks_bonus_one'] = $new_instance['biglooks_bonus_one'];
		$instance['biglooks_bonus_two'] = $new_instance['biglooks_bonus_two'];
		$instance['biglooks_bonus_three'] = $new_instance['biglooks_bonus_three'];

		return $instance;
	}


	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 			 
			 'title' => 'Deposit Withdraw widget',
			 'biglooks_deposit' => '0',
			 'biglooks_bonus_title' => '',
			 'biglooks_bonus_one' => '',
			 'biglooks_bonus_two' => '',
			 'biglooks_bonus_three' => '',
			 'bonus' => array('0' => ''),
			 'deposit' => array('0' => ''),
			 'withdraw' => array('0' => ''),
			 'bookmaker' => array('0' => ''),
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title-->
<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
		<?php _e('Title:', 'hlm-sports'); ?>
	</label>
	<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
</p>



	


	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_title' )); ?>">
			<?php _e('Deposit and Withdraw text and checkbox:', 'hlm-sports'); ?>
		</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_bonus_title' )); ?>" value="<?php echo esc_textarea($instance['biglooks_bonus_title']); ?>"  />
		<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'biglooks_deposit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'biglooks_deposit' )); ?>[]" <?php checked( (bool) $instance['biglooks_deposit'], true ); ?> />		
	</p>

	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'biglooks_bonus_one' )); ?>">
			<?php _e('Big bonus one:', 'hlm-sports'); ?>
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
	<div class="repeatable-rows">
<?php 		

        for($i = 0; $i < count($instance['bonus']); $i++){
        		$repeat_name = $instance['bonus'][$i];
        		$repeat_bookmaker = $instance['bookmaker'][$i];
        		$repeat_deposit = $instance['deposit'][$i];
        		$repeat_withdraw = $instance['withdraw'][$i];
			?>	
			
			<div class="row">
				<div class="image-part">				
					<div class="image-preview">Move &#9650;&#9660;</div>
				</div>

<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'deposit' )); ?>">
		Deposit
	</label>
	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'deposit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'deposit' )); ?>[]" <?php checked( (bool) $repeat_deposit, true ); ?> />


	<label for="<?php echo esc_attr($this->get_field_id( 'withdraw' )); ?>">
		Withdraw
	</label>

	<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'withdraw' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'withdraw' )); ?>[]" <?php checked( (bool) $repeat_withdraw, true ); ?> />

</p>

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