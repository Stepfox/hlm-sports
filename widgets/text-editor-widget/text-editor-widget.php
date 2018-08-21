<?php


function hlm_sports_editor_widget_register() {register_widget( 'hlm_sports_editor_widget' );}
add_action( 'widgets_init', 'hlm_sports_editor_widget_register' );


class hlm_sports_editor_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		add_action( 'widgets_admin_page', array( $this, 'output_wp_editor_widget_html' ), 100 );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'output_wp_editor_widget_html' ), 1 );
		add_filter( 'wp_editor_widget_content', 'wptexturize' );
		add_filter( 'wp_editor_widget_content', 'convert_smilies' );
		add_filter( 'wp_editor_widget_content', 'convert_chars' );
		add_filter( 'wp_editor_widget_content', 'wpautop' );
		add_filter( 'wp_editor_widget_content', 'shortcode_unautop' );
		add_filter( 'wp_editor_widget_content', 'do_shortcode', 11 ); 
		$widget_ops = apply_filters(
			'hlm_sports_editor_widget_ops',
			array(
				'classname' 	=> 'hlm_sports_editor_widget',
				'description' 	=> __( 'Arbitrary text, HTML or rich text through the standard WordPress visual editor.', 'hlm-sports' ),
			)
		);

		parent::__construct(
			'text_editor_hlm_sports',
			__( 'Text Editor Widget', 'hlm-sports' ),
			$widget_ops
		);

	}




	public function widget( $args, $instance ) {
		$defaults = array( 'title' => '', 'content' => '', 'connect' => 'dont-connect');
		$instance = wp_parse_args( (array) $instance, $defaults );

        $title = $instance['title'];
        $content = $instance['content'];
        $connect = $instance['connect'];


		$args['before_widget'] = preg_replace('/class="/', 'class="'. $connect . ' ',  $args['before_widget'], 1 );



        echo $args['before_widget'];


        if ( ! empty( $title ) ){
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }
        echo '<div class="text-editor-widget-content">';
        echo apply_filters('the_content', $content);
        echo '</div>';
        echo $args['after_widget'];
	}


	public function form( $instance ) {

		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'New title', 'hlm-sports' );
		}

		if ( isset($instance['content']) ) {
			$content = $instance['content'];
		}
		else {
			$content = "";
		}

		if ( isset($instance['connect']) ) {
			$connect = $instance['connect'];
		}
		else {
			$connect = "dont-connect";
		}



		$output_title = ( isset($instance['output_title']) && $instance['output_title'] == "1" ? true : false );
		?>
        <!-- Widget Title-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php _e('Title:', 'hlm-sports'); ?>
            </label>
            <input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_textarea($instance['title']); ?>" style="width:90%;" />
        </p>


		<input type="hidden" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" value="<?php echo esc_attr($content); ?>">
		<p>
			<a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'content' ); ?>');" class="button"><?php _e( 'Edit content', 'hlm-sports' ) ?></a>
		</p>

	<!-- connect -->
	<p>
		<label for="<?php echo $this->get_field_id('connect'); ?>">Connect To next or previous widget</label>
		<select name="<?php echo $this->get_field_name('connect'); ?>" id="<?php echo $this->get_field_id('connect'); ?>" class="widefat" >
			<?php $options = array('dont-connect', 'connect-top', 'connect-bottom', 'connect-both');
			foreach ($options as $option) {?>
			<option value='<?php echo $option; ?>' <?php if ($option == $instance['connect']) echo 'selected="selected"'; ?>><?php echo $option; ?></option>
					<?php } ?>
		</select>
	</p>

		<?php

	}

	public function output_wp_editor_widget_html() {
		
		?>
		<div id="wp-editor-widget-container" style="display: none;">
			<a class="close" href="javascript:WPEditorWidget.hideEditor();" title="<?php esc_attr_e( 'Close', 'hlm-sports' ); ?>"><span class="icon"></span></a>
			<div class="editor">
				<?php
				$settings = array(
					'textarea_rows' => 20,
				);
				wp_editor( '', 'wpeditorwidget', $settings );
				?>
				<p>
					<a href="javascript:WPEditorWidget.updateWidgetAndCloseEditor(true);" class="button button-primary"><?php _e( 'Save and close', 'hlm-sports' ); ?></a>
				</p>
			</div>
		</div>
		<div id="wp-editor-widget-backdrop" style="display: none;"></div>
		<?php
		
	} 


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['content']		= ( !empty($new_instance['content']) ? $new_instance['content'] : '' );
		do_action( 'wp_editor_widget_update', $new_instance, $instance );
 	 	return apply_filters( 'wp_editor_widget_update_instance', $instance, $new_instance );
	} 
}

