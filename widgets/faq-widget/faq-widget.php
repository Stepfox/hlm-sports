<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'faq_widget' );

function faq_widget() {register_widget( 'faq_widget_hlm_sports' );}

class faq_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_faq', // Widget ID
			esc_html__('FAQ Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);
					add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('faq_widget_widget', get_stylesheet_directory_uri() . '/widgets/faq-widget/faq-widget.css');
			wp_enqueue_script('faq_widget_widget_script', get_stylesheet_directory_uri() . '/widgets/faq-widget/faq-widget.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('faq-widget-script-back', get_stylesheet_directory_uri() . '/widgets/faq-widget/faq-widget-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'faq-widget-style-back', get_stylesheet_directory_uri().'/widgets/faq-widget/faq-widget-back.css');	  	
		}

		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'FAQ widget', 'question' => array('0' => ''), 'answer' => array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$question = $instance['question'];
		$answer = $instance['answer'];

		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>




<div class="faq-widget">
<?php for($i = 0; $i < count($question); $i++){?>
	<div class="faq-widget-item">
		<div class="faq-widget-posts-text">
			<div class="faq-widget-posts-title">
				<h3><?php echo esc_html($question[$i]);?></h3>
			</div>
			<div class="faq-widget-posts-content">
				<?php echo wpautop(esc_html($answer[$i]));?> 
			</div>
		</div>
	</div>
	<?php } ?>
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
		$instance['question'] = $new_instance['question'];
		$instance['answer'] = $new_instance['answer'];

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'FAQ widget', 'question' => array('0' => ''), 'answer' => array('0' => ''));
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

        for($i = 0; $i < count($instance['question']); $i++){
        		$repeat_name = $instance['question'][$i];
        		$repeat_answer = $instance['answer'][$i];
			?>	
			
			<div class="row">
				<div class="image-part">				
					<div class="image-preview">Move &#9650;&#9660;</div>
				</div>

			<div class="text-part">
				<input type="text" field="<?php echo $this->get_field_name( 'question' ); ?>" name="<?php echo $this->get_field_name( 'question' ); ?>[]" value="<?php echo $repeat_name; ?>" placeholder="The Question" class="repeater-title widefat text-field">
				
				
				<textarea rows="5" field="<?php echo $this->get_field_name( 'answer' ); ?>" name="<?php echo $this->get_field_name( 'answer' ); ?>[]" placeholder="The Answer" class="repeater-link widefat text-field"><?php echo $repeat_answer; ?></textarea>
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