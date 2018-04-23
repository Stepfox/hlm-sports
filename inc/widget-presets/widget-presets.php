<?php

add_action('admin_menu', 'hlm_sports_one_button_preset');

function hlm_sports_one_button_preset() {
	if(is_super_admin()){
	add_theme_page('hlm Sports one button install widgets', 'One Button Setup', 'read', 'hlm_sports_one_button','hlm_sports_prearange');
	}
}

function hlm_sports_demo_image_upload( $image_url  ){
    $upload_dir = wp_upload_dir();
    $image_data = wp_remote_get($image_url);
	$image_data = wp_remote_retrieve_body( $image_data );
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
	global $wp_filesystem;
	WP_Filesystem(); // Initial WP file system
	$wp_filesystem->put_contents( $file, $image_data );
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;
}

function hlm_sports_prearange(){
	$screen = get_current_screen();
	if ($screen->base === 'appearance_page_hlm_sports_one_button'){
	wp_enqueue_style( 'hlm_sports_style_prearange', get_template_directory_uri() . '/inc/hlm-sports-widget-presets.css' );
	wp_enqueue_script('hlm_sports_script_prearange', get_template_directory_uri() . '/js/hlm-sports-one-button-install.js', array('jquery'));
	$bloginfo = get_template_directory_uri(); ?>

<div class="theme-presets">


		<div class="widget-layouts-text">

			<h2>
				<?php esc_html_e( 'Theme Setup:', 'hlm-sports' ); ?>
			</h2>
		</div>
		<!-- widget-layouts-text -->
	<div class="color-presets">
		<div class="color-presets-radios">
			<ul class="theme-colors-presets">
				<li class="theme-colors-preset1 homepagebutton">				
					<form method="post">					
						<input  type="submit" class="button-secondary" name="homepage" value="<?php echo esc_attr('Create and Set Homepage as Front Page'); ?>"/>
					</form>
				</li>
			</ul>
		
		
			<ul class="theme-colors-presets">
				<li class="theme-colors-preset1">
					
					<form method="post">					
						<input  type="submit" class="button-secondary" name="preset1" value="<?php echo esc_attr('Add Demo Posts'); ?>"/>
					</form>
				</li>
				<li class="theme-colors-preset2">
					
					<form method="post">
						<input  type="submit" class="button-secondary" name="preset2" value="<?php echo esc_attr('Remove all Demo Posts and images'); ?>"/>
					</form>
				</li>
				<li class="theme-colors-preset3">
					
					<form method="post">
						<input  type="submit" class="button-secondary" name="preset3" value="<?php echo esc_attr('Add Demo Posts with Images'); ?>"/>
					</form>	
				</li>
			</ul>
		</div>
		<!-- color-presets-radios -->
	</div>
	<!-- color-presets -->
	<div class="widget-layouts">
	
		<div class="widget-layout-dropdown">
			<form method="post">
			<select name="demo-installer-widgets-layout" id="widget-layout-dropdown">

				<?php $options = array(
					'' => 'Pick a Widget Layout',
					'demo1' => 'Demo1',
					'demo2' => 'Demo2',
					'demo3' => 'Demo3',
					'demo4' => 'Demo4',				
					'reset_widgets' => 'Blank Demo',
					);

				foreach ($options as $option => $name) {?>
					<option value='<?php echo esc_attr($option); ?>'>
						<?php echo esc_html($name); ?>
					</option>
				<?php } ?>
			</select>
			<input type="submit" value="<?php echo esc_attr('Submit');?>"/>
			</form>
		<?php 
		if(isset($_POST['demo-installer-widgets-layout']) && !empty($_POST['demo-installer-widgets-layout']) && $_POST['demo-installer-widgets-layout'] != 'reset_widgets'){
			
			hlm_sports_demo_remove_inactive_widgets();
			update_option('sidebars_widgets', array ('wp_inactive_widgets' => array ( )));
			$demo_picked = $_POST['demo-installer-widgets-layout'];
			hlm_sports_demo_layout($demo_picked);
		}elseif(isset($_POST['demo-installer-widgets-layout']) && $_POST['demo-installer-widgets-layout'] == 'reset_widgets'){
			hlm_sports_demo_remove_inactive_widgets();
			update_option('sidebars_widgets', array ('wp_inactive_widgets' => array ( )));

		}

		?>
		</div>
	<!-- widget-layout-dropdown -->

		<ul class="layout-images">
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/select_layout.png"/>
			</li>
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/demo1.png"/>
			</li>
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/demo2.png"/>
			</li>
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/demo3.png"/>
			</li>
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/demo4.png"/>
			</li>
			<li>
				<img src="<?php echo esc_url($bloginfo); ?>/images/widget-presets/reset_layout.jpg"/>
			</li>

		</ul>
	</div>
	<!-- widget-layouts -->

<?php 
if (isset($_POST) && !empty($_POST['preset1'])){
			$img = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_0.jpg' );

			for ($i=0; $i < 3000; $i++) { 

			$post= array('post_title' => 'hlm Sports Basic demo used for layout setup'.$i, 'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a felis mollis, fringilla ipsum sit amet, pretium tellus. Donec dignissim augue non diam iaculis fringilla id nec ipsum. Praesent sollicitudin suscipit lectus, ut hendrerit nisi semper eu. Duis ut elementum ex, eget posuere libero. Proin eu faucibus risus. Fusce eu massa dui. Quisque sit amet sem sed eros scelerisque placerat eget vel sem. In ac dignissim massa, eu elementum lorem. Curabitur dapibus vestibulum placerat. Aliquam lacinia vel est quis euismod.

			Pellentesque rutrum vestibulum porta. Sed tempor, leo a tristique iaculis, eros eros accumsan libero, eu interdum ligula neque ac diam. Aenean non ligula eu elit pellentesque feugiat. Phasellus elementum vel lorem sed fermentum. Aliquam dignissim efficitur orci quis bibendum. Donec in tempor lectus. Curabitur ac placerat nulla, id scelerisque risus. Ut in nisi accumsan, maximus lacus vel, congue ante. Fusce porttitor nunc quis facilisis tristique. Ut vitae euismod sem. Donec facilisis condimentum lorem in convallis.', 'post_status' => 'publish' );
			$post_ID = wp_insert_post( $post );
			set_post_thumbnail( $post_ID, $img  );
			add_post_meta($post_ID, 'hlm_sports_post_views_count', '100000');

			$post2=$post;
			$post2['post_type']='page';
			$post2_ID = wp_insert_post( $post2 );
            set_post_thumbnail( $post2_ID, $img  );
            add_post_meta($post2_ID, 'hlm_sports_post_views_count', '100000');

            }


}elseif (isset($_POST) && !empty($_POST['preset2'])){

			//Delete Demo Posts
			$search_this = 'demo';
			$args = array(
			    'post_type' => array('page','cupbmk_bettingtips'),
			    'posts_per_page' => -1,  
			    's' => $search_this,
			    'post_status' => 'publish',   
			);
			$hlm_sports_posts = new WP_Query($args);
			while($hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post();
			  	$page_name_id = get_the_ID();
			 	wp_delete_post( $page_name_id, true );
			endwhile;	

			//Delete Demo Images
			$args1 = array(
			    'post_type' => 'attachment',
			    'post_mime_type' => 'image/jpeg,image/gif,image/jpg,image/png',  
			    'post_status' => 'all',  
			    'posts_per_page' => -1,  
			        );
			$hlm_sports_posts1 = new WP_Query($args1);
			while($hlm_sports_posts1->have_posts()) : $hlm_sports_posts1->the_post();
				$image_title = get_the_title();
				if (strpos($image_title, 'hlm_sports_demo_') !== false) {
				    $att_name_id = get_the_ID();
				    wp_delete_attachment( $att_name_id, true );
				}
			endwhile;

}elseif (isset($_POST) && !empty($_POST['preset3'])){
				$img1 = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_1.jpg' );
				$img2 = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_2.jpg' );
				$img3 = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_3.jpg' );
				$img4 = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_4.jpg' );
				$img5 = hlm_sports_demo_image_upload( $bloginfo.'/images/demo-posts/hlm_sports_demo_5.jpg' );
				for ($i=0; $i < 30; $i++) { 
				$post= array('post_title' => 'hlm Sports Basic demo used for layout setup'.$i, 'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a felis mollis, fringilla ipsum sit amet, pretium tellus. Donec dignissim augue non diam iaculis fringilla id nec ipsum. Praesent sollicitudin suscipit lectus, ut hendrerit nisi semper eu. Duis ut elementum ex, eget posuere libero. Proin eu faucibus risus. Fusce eu massa dui. Quisque sit amet sem sed eros scelerisque placerat eget vel sem. In ac dignissim massa, eu elementum lorem. Curabitur dapibus vestibulum placerat. Aliquam lacinia vel est quis euismod.

				Pellentesque rutrum vestibulum porta. Sed tempor, leo a tristique iaculis, eros eros accumsan libero, eu interdum ligula neque ac diam. Aenean non ligula eu elit pellentesque feugiat. Phasellus elementum vel lorem sed fermentum. Aliquam dignissim efficitur orci quis bibendum. Donec in tempor lectus. Curabitur ac placerat nulla, id scelerisque risus. Ut in nisi accumsan, maximus lacus vel, congue ante. Fusce porttitor nunc quis facilisis tristique. Ut vitae euismod sem. Donec facilisis condimentum lorem in convallis.', 'post_status' => 'publish' );
				$post_ID = wp_insert_post( $post );

				}
							$search_this = 'demo';
							$args = array(
							    'post_type' => 'post',
							    'posts_per_page' => -1,  
							    's' => $search_this,
							    'post_status' => 'publish',   
							);
							$hlm_sports_posts = new WP_Query($args);


							$count = 0;
							while($hlm_sports_posts->have_posts()) : $hlm_sports_posts->the_post();$count++;
							  	$page_name_id = get_the_ID();
							  	add_post_meta($page_name_id, 'hlm_sports_post_views_count', '100000'); 
							  	if($count == 1){
							  		set_post_thumbnail( $page_name_id, $img1 );
							  	}
							  		elseif($count == 2){
							  			set_post_thumbnail( $page_name_id, $img2 );
							  		}
							  		elseif($count == 3){
							  			set_post_thumbnail( $page_name_id, $img3 );
							  		}
							  		elseif($count == 4){
							  			set_post_thumbnail( $page_name_id, $img4 );
							  		}
							  		elseif($count == 5){
							  			set_post_thumbnail( $page_name_id, $img5 );$count = 0;
							  		}


							endwhile;	
}

	if (isset($_POST) && !empty($_POST['homepage'])){

				$post= array( 'post_title' => 'Homepage', 'post_content' => '', 'post_type' => 'page', 'post_status' => 'publish', 'page_template'  => 'home-page.php' );
				$post_ID = wp_insert_post( $post );
				update_option( 'page_on_front', $post_ID );
	    		update_option( 'show_on_front', 'page' );
	}


?>





</div>
<!-- theme-presets -->

<?php


}}


?>