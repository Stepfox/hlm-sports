<?php

 
function hlm_sports_template_selection_save_postdata( $post_id ){
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;
		if ( ! isset( $_POST['template_title_nonce'] ) ) {
			return;
		}
      if ( !wp_verify_nonce( $_POST['template_title_nonce'], 'template_title_field_nonce' ) )
          return;
      if ( isset($_POST['saved_template_selection']) && $_POST['saved_template_selection'] != '' ){
            update_post_meta( $post_id, 'saved_template_selection', $_POST['saved_template_selection'] );
      } 
}
add_action( 'save_post', 'hlm_sports_template_selection_save_postdata' );



function hlm_sports_add_metabox_templates_selection(){
    add_meta_box(
        'wpse44966-meta-box', // id, used as the html id att
        __( 'Pick a Saved Template' ), // meta box title, like "Page Attributes"
        'hlm_sports_meta_box_cb_templates_selection', // callback function, spits out the content
        'page', // post type or page. We'll add this to pages only
        'side', // context (where on the screen
        'high' // priority, where should this go in the context?
    );
}
add_action( 'add_meta_boxes', 'hlm_sports_add_metabox_templates_selection' );



function hlm_sports_meta_box_cb_templates_selection( $post ){
      wp_nonce_field( 'template_title_field_nonce', 'template_title_nonce' );
    $saved = get_post_meta( $post->ID, 'saved_template_selection', true);  
    ?>
	<select name="saved_template_selection" style="width:100%;">
		<option value='none' selected="selected">
		<?php 
		_e('Fresh Start(no template)', 'hlm-sports'); ?>
		</option>
		<?php $template_title = get_option('template_title'); 
		$template_title = array_unique($template_title);
		 ?>
		<?php foreach ($template_title as $item_title) { ?>
		<option value='<?php echo esc_attr($item_title); ?>'>
				<?php echo esc_html($item_title); ?>
		</option>
		<?php } ?>
	</select>  

<?php 

}


function hlm_sports_setup_saved_template(){
    $saved = get_post_meta(get_the_ID(), 'saved_template_selection', true);  
	$template_saved_json = get_option('template_saved_json');
	if(empty($template_saved_json)){$template_saved_json = array();}
	$template_saved_json = array_unique($template_saved_json);
	$template_title = get_option('template_title');	
	if(empty($template_title)){$template_title = array();}
	$template_title = array_unique($template_title);

	if($saved != 'none'){
		foreach (array_combine($template_saved_json, $template_title) as $item => $item_title) {
			if($item_title === $saved){
					echo $item_title;
					echo '========';
					echo $item;
					echo '</br>';

					$data = json_decode( $item );
					//print_r ($data);
					$hlm_sports_demo_import_results = hlm_sports_demo_import_data_1( $data );
					//return to field to none
					update_post_meta( get_the_ID(), 'saved_template_selection', 'none' );  
			}
		}
	}		
}
add_action('wp_head', 'hlm_sports_setup_saved_template');


function hlm_sports_demo_import_data_1( $data ) {
	global $wp_registered_sidebars;
	do_action( 'hlm_sports_demo_before_import' );
	$data = apply_filters( 'hlm_sports_demo_import_data', $data );
	$available_widgets = hlm_sports_demo_available_widgets();
	$widget_instances = array();
	foreach ( $available_widgets as $widget_data ) {
		$widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
	}
	$results = array();
	foreach ( $data as $sidebar_id => $widgets ) {


if (strpos($sidebar_id, 'main-') !== false) {
   $sidebar_id = 'main-'.get_the_ID();
}

if (strpos($sidebar_id, 'sidebar-') !== false) {
   $sidebar_id = 'sidebar-'.get_the_ID();
}


		if ( 'wp_inactive_widgets' == $sidebar_id ) {
			continue;
		}
		if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
			$sidebar_available = true;
			$use_sidebar_id = $sidebar_id;
			$sidebar_message_type = 'success';
			$sidebar_message = '';
		} else {
			$sidebar_available = false;
			$use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
			$sidebar_message_type = 'error';
			$sidebar_message = esc_html__( 'Sidebar does not exist in theme (using Inactive)', 'hlm-sports' );
		}
		$results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
		$results[$sidebar_id]['message_type'] = $sidebar_message_type;
		$results[$sidebar_id]['message'] = $sidebar_message;
		$results[$sidebar_id]['widgets'] = array();
		foreach ( $widgets as $widget_instance_id => $widget ) {
			$fail = false;
			$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
			$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );
			if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
				$fail = true;
				$widget_message_type = 'error';
				$widget_message = esc_html__( 'Site does not support widget', 'hlm-sports' ); // explain why widget not imported
			}
			$widget = apply_filters( 'hlm_sports_demo_widget_settings', $widget );
			$widget = json_decode( json_encode( $widget ), true );
			$widget = apply_filters( 'hlm_sports_demo_widget_settings_array', $widget );
			if ( ! $fail && isset( $widget_instances[$id_base] ) ) {
				$sidebars_widgets = get_option( 'sidebars_widgets' );
				$sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array();
				$single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
			}
			if ( ! $fail ) {
				$single_widget_instances = get_option( 'widget_' . $id_base );
				$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 );
				$single_widget_instances[] = $widget;
					end( $single_widget_instances );
					$new_instance_id_number = key( $single_widget_instances );
					if ( '0' === strval( $new_instance_id_number ) ) {
						$new_instance_id_number = 1;
						$single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
						unset( $single_widget_instances[0] );
					}
					if ( isset( $single_widget_instances['_multiwidget'] ) ) {
						$multiwidget = $single_widget_instances['_multiwidget'];
						unset( $single_widget_instances['_multiwidget'] );
						$single_widget_instances['_multiwidget'] = $multiwidget;
					}
					update_option( 'widget_' . $id_base, $single_widget_instances );
				$sidebars_widgets = get_option( 'sidebars_widgets' ); 
				$new_instance_id = $id_base . '-' . $new_instance_id_number; 
				$sidebars_widgets[$use_sidebar_id][] = $new_instance_id; 
				update_option( 'sidebars_widgets', $sidebars_widgets );
			}
		}
	}
	do_action( 'hlm_sports_demo_after_import' );
	return apply_filters( 'hlm_sports_demo_import_results', $results );
}





















add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );

function toolbar_link_to_mypage( $wp_admin_bar ) {
	$args = array(
		'id'    => 'hlm_sports_save_template',
		'title' => 'hlm Sports Save this page as template',
		'href'  => '?hlm_saving=wie_generate_export_data'
	);
	$wp_admin_bar->add_node( $args );




	$template_saved_json = get_option('template_saved_json');
	if(empty($template_saved_json)){$template_saved_json = array();}
	$template_saved_json = array_unique($template_saved_json);
	$template_title = get_option('template_title');	
	if(empty($template_title)){$template_title = array();}
	$template_title = array_unique($template_title);

foreach (array_combine($template_saved_json, $template_title) as $item => $item_title) {
	$wp_admin_bar->add_menu(array(
		'parent' => 'hlm_sports_save_template',
		'id'    => $item_title.'_id',
		'title' => $item_title,
		'href'  => '?pick_a_template='.$item_title,
		)
	);
}

	if(isset($_GET['pick_a_template'])){
		foreach (array_combine($template_saved_json, $template_title) as $item => $item_title) {
			if($item_title === $_GET['pick_a_template']){

					update_option('sidebars_widgets', array ($item_title.'_id' => array ( )));
					$data = json_decode( $item );
					$hlm_sports_demo_import_results = hlm_sports_demo_import_data_1( $data );
					//return to field to none
					update_post_meta( get_the_ID(), 'saved_template_selection', 'none' ); 

		$baseUri=$_SERVER['HTTP_REFERER'];
        $string = '<script type="text/javascript">';
        $string .= 'window.location = "' . $baseUri. '"';
        $string .= '</script>';

        echo $string;


			}
		}
	}


	if(isset($_GET['hlm_saving'])){
		if ($_GET['hlm_saving'] == 'wie_generate_export_data'){
			//echo wie_generate_export_data();

			$template_saved_json = get_option('template_saved_json');
			if(empty($template_saved_json)){$template_saved_json = array();}
			array_push($template_saved_json, wie_generate_export_data());

			$template_title = get_option('template_title');
			if(empty($template_title)){$template_title = array();}
			array_push($template_title, get_the_title());

			update_option( 'template_saved_json', $template_saved_json );		
			update_option( 'template_title', $template_title );

		$baseUri = $_SERVER['HTTP_REFERER'];
        $string = '<script type="text/javascript">';
        $string .= 'window.location = "' . $baseUri. '"';
        $string .= '</script>';

        echo $string;


		}
	}


}



function wie_available_widgets() {
	global $wp_registered_widget_controls;
	$widget_controls = $wp_registered_widget_controls;
	$available_widgets = array();

	foreach ( $widget_controls as $widget ) {
		if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[ $widget['id_base'] ] ) ) {
			$available_widgets[ $widget['id_base'] ]['id_base'] = $widget['id_base'];
			$available_widgets[ $widget['id_base'] ]['name']    = $widget['name'];
		}
	}

	return apply_filters( 'wie_available_widgets', $available_widgets );

}

function wie_generate_export_data() {
	$available_widgets = wie_available_widgets();
	$widget_instances = array();

	foreach ( $available_widgets as $widget_data ) {
		$instances = get_option( 'widget_' . $widget_data['id_base'] );
		if ( ! empty( $instances ) ) {

			foreach ( $instances as $instance_id => $instance_data ) {
				if ( is_numeric( $instance_id ) ) {
					$unique_instance_id = $widget_data['id_base'] . '-' . $instance_id;
					$widget_instances[ $unique_instance_id ] = $instance_data;
				}
			}
		}
	}

	$sidebars_widgets = get_option( 'sidebars_widgets' );
	$sidebars_widget_instances = array();
	foreach ( $sidebars_widgets as $sidebar_id => $widget_ids ) {

	$main_sidebar = 'main-'.get_the_ID();
	$secondary_sidebar = 'sidebar-'.get_the_ID();


if($sidebar_id == $main_sidebar || $sidebar_id == $secondary_sidebar){
		foreach ( $widget_ids as $widget_id ) {
			if ( isset( $widget_instances[ $widget_id ] ) ) {
				$sidebars_widget_instances[ $sidebar_id ][ $widget_id ] = $widget_instances[ $widget_id ];
			}
		}
	}
}
	$data = apply_filters( 'wie_unencoded_export_data', $sidebars_widget_instances );
	$encoded_data = wp_json_encode( $data );
	return apply_filters( 'wie_generate_export_data', $encoded_data );

}
?>