<?php 

add_action('admin_menu' , 'hlm_sports_saved_templates_page'); 
 


function hlm_sports_saved_templates_page() {
    add_menu_page('hlm Saved Pages Page', 'hlm Sports Saved Templates', 'manage_options', 'hlm_sports_templates_page', 'hlm_sports_saved_templates_setup', '', '100');
    //call register settings function
	add_action( 'admin_init', 'hlm_sports_saved_templates_settings' );
}



function hlm_sports_saved_templates_settings() {
	//register our settings
	register_setting( 'hlm_sports_saved_templates_group', 'template_title' );
	register_setting( 'hlm_sports_saved_templates_group', 'template_saved_json' );
}

function hlm_sports_saved_templates_setup(){        
	
		//wp_register_style( 'mma_sport_magazine_rankings_backend_css', plugins_url('/rankings-admin.css', __FILE__));
        //wp_enqueue_style( 'mma_sport_magazine_rankings_backend_css' );

	?>

<div class="wrap">
	<h2>
		<?php _e('hlm Sports Saved Templates ', 'hlm-sports'); ?>
	</h2>

<form method="post" action="options.php">

	
<?php 	
	settings_fields( 'hlm_sports_saved_templates_group' ); 
    do_settings_sections( 'hlm_sports_saved_templates_group' ); 


	$template_saved_json = get_option('template_saved_json');
	$template_title = get_option('template_title');
	$count = 0;
	?>
<div class="rankings-list-sortable">
	<?php if(!empty($template_saved_json)){
		foreach (array_combine($template_saved_json, $template_title) as $item => $item_title) {?>

        <div class="rankings-list">
        	<div class="row rankings-title">
        		    <label for="template_title[]">
	    				<?php echo esc_html__('Saved Template Title', 'hlm-sports'); ?>
	    			</label>
        		<input type="text" name="template_title[]" value="<?php echo esc_attr($item_title); ?>" />
        	</div>   

        	<div class="row rankings-title">
        		    <label for="template_saved_json[]">
	    				<?php echo esc_html__('Template Json', 'hlm-sports'); ?>
	    			</label>
        		<input type="text" name="template_saved_json[]" value="<?php echo esc_attr($item); ?>" readonly/>
        	</div>     	
 
			<a class="button remove-row-rankings" href="#">
				<?php echo esc_html__('Delete Template', 'hlm-sports'); ?>
			</a>
    </div>
    <!-- rankings-list -->
<?php $count++; }}else{?>
        <div class="rankings-list">
        		<h3>You Dont Have Any templates saved.</h3>
		</div>

    </div>
    <!-- rankings-list -->
<?php } ?>
	<div class="buttons-wrap">
		<?php submit_button(); ?>
	</div>
	<!-- buttons-wrap -->

</form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {           

	jQuery('.remove-row-rankings').on('click', function() {
		jQuery(this).parents('.rankings-list').remove();
	});



    });
</script>
<?php } ?>