<?php   

/* 
Author: Stefan Naumovski 
*/    

add_action( 'widgets_init', 'related_widget' );

function related_widget() {register_widget( 'related_widget_hlm_sports' );}

class related_widget_hlm_sports extends WP_Widget {
	
	/* Register widget with WordPress. */
	
	function __construct() {
		parent::__construct(
			'hlm_sports_related', // Widget ID
			esc_html__('RELATED Widget', 'hlm-sports'), // Name
			array( 'description' => '', 'customize_selective_refresh' => true ) // Args
			);
					add_action('admin_enqueue_scripts', array( $this, 'services_widget_scripts' ));

		    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
		            add_action( 'wp_enqueue_scripts', array( $this, 'widget_enqueue_scripts' ) );
		        }
			}
			
				/* Front-end display of widget. */
			

	    public function widget_enqueue_scripts() {
			wp_enqueue_style('related_widget_widget', get_stylesheet_directory_uri() . '/widgets/related-widget/related-widget.css');
			wp_enqueue_script('related_widget_widget_script', get_stylesheet_directory_uri() . '/widgets/related-widget/related-widget.js');
			
	    }

		public function services_widget_scripts() {
			  wp_enqueue_script('jquery-ui-sortable');
			  wp_enqueue_script('related-widget-script-back', get_stylesheet_directory_uri() . '/widgets/related-widget/related-widget-back.js', array('jquery-ui-sortable'));
			  wp_enqueue_style( 'related-widget-style-back', get_stylesheet_directory_uri().'/widgets/related-widget/related-widget-back.css');	  	
		}

		/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'RELATED widget', 'related_title' => array('0' => ''));
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		
		$title = $instance['title'];
		$related_title = $instance['related_title'];

		echo $args['before_widget'];
				
		if ( ! empty( $title ) ){
			echo $args['before_title'] . esc_html($title) . $args['after_title'];
		}
			?>




<div class="related-widget">
<?php for($i = 0; $i < count($related_title); $i++){?>
	<div class="related-widget-item">
		<div class="related-widget-posts-text">
			<div class="related-widget-posts-title">
				<a href="<?php echo esc_attr(get_page_link($related_title[$i]));?>">
					<h3><?php echo esc_html(get_the_title($related_title[$i]));?></h3>
				</a>
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
		$instance['related_title'] = $new_instance['related_title'];

		return $instance;
	}
	

	function form( $instance ) {
		
		/* Default widget settings. */
		
		$defaults = array( 'title' => 'RELATED widget', 'related_title' => array('0' => ''));
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

        for($i = 0; $i < count($instance['related_title']); $i++){
        		$repeat_name = $instance['related_title'][$i];



			?>	
			
			<div class="row">
				<div class="image-part">				
					<div class="image-preview">Move &#9650;&#9660;</div>
				</div>

			<div class="text-part">

			<?php 
					$dropdown_args = array(
						'selected' => $repeat_name,
					        'name' => $this->get_field_name( 'related_title' ).'[]',
					    );

					wp_dropdown_pages( $dropdown_args );

			?>	
				

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