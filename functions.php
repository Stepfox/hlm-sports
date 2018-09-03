<?php
//Wgd0BrYrr6ss&zml

//stefan_hlm

//gpass Q%tEC3L75C/?eQhe
//github 0e71099a023f635ab068ea0f5b5b38c05a99e50b

//stg User: winningsportsb Password: e71f0a74

//github password makavelikl1kf484

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/acf.php' );


// 5. Acf style
function my_acf_admin_head() {
    ?>
    <style type="text/css">

   

    </style>
    <?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');




//6 acf options page

if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Hlm Sports Theme Options',
			'menu_title'	=> 'Hlm Sports Theme Options',
			'menu_slug' 	=> 'hlm_sports_theme_options',
			'capability'	=> 'edit_posts',
			'redirect'	=> false,
       		'icon_url' => 'dashicons-images-alt2',
        	'position' => 7
		));
		
		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Page 1',
		// 	'menu_title'	=> 'Page 1',
		// 	'parent_slug'	=> 'options',
		// ));
		
		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Page 2',
		// 	'menu_title'	=> 'Page 2',
		// 	'parent_slug'	=> 'options',
		// ));
	
	}


if (!class_exists('Widget_Shortcode')) {
	include( get_stylesheet_directory() . '/plugins/widget-shortcode/init.php' );
}

























//svg support
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');




//register images

if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );

add_image_size( 'hlm_sports_20x20', 20, 20, true );
add_image_size( 'hlm_sports_40x20', 40, 20, true );
add_image_size( 'hlm_sports_40x40', 40, 40, true );
add_image_size( 'hlm_sports_70x30', 70, 30, true );
add_image_size( 'hlm_sports_136x44', 136, 44, true );
add_image_size( 'hlm_sports_232x310', 232, 310, true );
add_image_size( 'hlm_sports_290x200', 290, 200, true );
add_image_size( 'hlm_sports_166x92', 166, 92, true );
add_image_size( 'hlm_sports_900x260', 900, 260, true );
add_image_size( 'hlm_sports_900x380', 900, 380, true );
add_image_size( 'hlm_sports_1200x260', 1200, 260, true );
add_image_size( 'hlm_sports_196x66', 196, 66, true );
add_image_size( 'hlm_sports_196x196', 196, 196, true );

}


add_filter( 'image_size_names_choose', 'hlm_sports_image_sizes_reg' );

function hlm_sports_image_sizes_reg( $sizes ) {
	$new_sizes = array();
	$added_sizes = get_intermediate_image_sizes();
	foreach( $added_sizes as $key => $value) {
		$new_sizes[$value] = $value;
	}
	$new_sizes = array_merge( $new_sizes, $sizes );
	return $new_sizes;


}


























function hlm_sports_form_widget_size( $widget, $return, $instance ) {


        $widget_size = isset( $instance['widget_size'] ) ? $instance['widget_size'] : '';
        if(empty($widget_size)){$widget_size = 'one-part';}
        if (strpos($widget->id_base, 'exm') === false) {

        ?>
            <p class="widget-size-radio">
			<input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="one-part" <?php checked('one-part',$widget_size); ?> class="one-part"/>
			<input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="two-parts" <?php checked('two-parts', $widget_size); ?> class="two-parts" />
			<input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="three-parts" <?php checked('three-parts',$widget_size); ?> class="three-parts"/>
			<input type="radio" name="<?php echo esc_attr($widget->get_field_name( 'widget_size' )); ?>" value="four-parts" <?php checked('four-parts',$widget_size); ?> class="four-parts"/>
            </p>
        <?php
    	}

}
add_filter('in_widget_form', 'hlm_sports_form_widget_size', 5, 3 );



function hlm_sports_update_widget_size( $instance, $new_instance ) {
	$instance['widget_size'] = $new_instance['widget_size'];
    return $new_instance;
}
add_filter( 'widget_update_callback', 'hlm_sports_update_widget_size', 10, 2 );


function hlm_sports_display_widget_size($instance, $widget, $args)  {
	$widget_size = isset( $instance['widget_size'] ) ? $instance['widget_size'] : '';

    $args['before_widget'] = preg_replace('/class="/', 'class="'. $widget_size . ' ',  $args['before_widget'], 1 );
    $widget->widget($args, $instance);
    return false;
}
add_filter( 'widget_display_callback', 'hlm_sports_display_widget_size', 10, 3 );



function hlm_sports_widgets_style(){
	echo 
"<style type='text/css'>
.widget-inside{padding-top:50px !important;}
	.widget-size-radio .widget-title h3:before {content: '';background: url(".esc_url(get_template_directory_uri())."/images/hlm-logo.png)no-repeat;width: 16px;height: 16px;float: left;margin-right: 5px;background-size: 100%;}
	.widget-size-radio .widget-title h3{color: #0F7BB8;}
	.widget-size-radio input[type=radio]{height:30px;border-radius:0;width:23%;margin: 0 1% 0 0;text-indent:0;font-size:12px;line-height:30px;color:#747474;font-weight:700;background-color: #D1D1D1;text-shadow: 1px 1px 0px #FFF;box-shadow: inset 1px 1px 1px #AAA;}
	.widget-size-radio input[type=radio]:checked:before{border-radius:0;padding:0;margin:0;height:100%;width:100%;background-color: #0DA000;text-indent:0;font-size:12px;line-height:30px;color:#FFF;font-weight:700;text-shadow: 1px 1px 0px #000;box-shadow: none;content:'selected';}
	.widget-size-radio input[type=radio].full-parts{width:96%;margin:10px 0;}
	.widget-size-radio .one-part:before{content: '1/4';}
	.widget-size-radio .two-parts:before{content: '2/4';}
	.widget-size-radio .three-parts:before{content: '3/4';}
	.widget-size-radio .four-parts:before{content: '4/4';}
	.widget-size-radio{
    left: 5px;
    position: absolute;
    top: 50px;
    width: 100%;
}
</style>"
;}
add_action('admin_print_styles-widgets.php', 'hlm_sports_widgets_style');




















//register styles and scripts

function hlm_sports_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		if (is_home() || is_page_template('alternative homepage.php') || is_front_page()) {	
			wp_enqueue_script('jquery-masonry');
			wp_enqueue_script('hlm_sports_layout', get_template_directory_uri() . '/js/layout.js', array('jquery'));
		}
		wp_enqueue_script('hlm_sports_smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array('jquery'));

		wp_enqueue_script('flexslider-min', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'));
		wp_enqueue_script('hlm_sports_scripts', get_template_directory_uri() . '/js/hlm-scripts.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'hlm_sports_scripts');

// Theme Options
include( get_template_directory().'/inc/live-style.php' );
include( get_template_directory().'/inc/menu-image-upload-fields.php' );
include( get_template_directory().'/inc/menu-image-upload-fields-menu-walker.php' );
include( get_template_directory().'/inc/bookmakers-cpt-registration.php' );
include( get_template_directory().'/inc/hlm-sports-custom-fields.php' );
include( get_template_directory().'/inc/hlm-sports-shortcodes.php' );
include( get_template_directory().'/inc/matches-parts.php' );



//Odds Widget
 include( get_template_directory().'/widgets/odds-widget/matches-cpt-registration.php' );
 include( get_template_directory().'/widgets/odds-widget/matches-crawl.php' );
 include( get_template_directory().'/widgets/odds-widget/simplehtmldom.php' );
 include( get_template_directory().'/inc/match-header.php' );
 include(get_template_directory()."/widgets/odds-widget/odds-widget.php");
 include(get_template_directory()."/widgets/odds-widget/new-odds-widget.php");

//Widgets
include(get_template_directory()."/widgets/text-editor-widget/text-editor-widget.php");
include(get_template_directory()."/widgets/top-5-reviews/top-5-reviews.php");
include(get_template_directory()."/widgets/faq-widget/faq-widget.php");
include(get_template_directory()."/widgets/related-widget/related-widget.php");
include(get_template_directory()."/widgets/landing-widget/landing-widget.php");
include(get_template_directory()."/widgets/latest-articles/latest-articles.php");
include(get_template_directory()."/widgets/betting-strategies/betting-strategies.php");
include(get_template_directory()."/widgets/linking-image-widget/linking-image-widget.php");
include(get_template_directory()."/widgets/content-block-widget/content-block-widget.php");
include(get_template_directory()."/widgets/deposit-withdraw-widget/deposit-withdraw-widget.php");
include(get_template_directory()."/widgets/shortcode-widget/shortcode-widget.php");
include(get_template_directory()."/widgets/payment-options-widget/payment-options-widget.php");








// category archive and search number of posts
function hlm_sports_archive_page_queries( $query ) {
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
    if(is_category() && $query->is_main_query() && $page == 1){
			$query->set('posts_per_page', '9');
	}

    if(is_tag() && $query->is_main_query() && $page == 1){
			$query->set('posts_per_page', '9');
			$query->set('offset', '1' );	
	}


 if ( is_post_type_archive( 'bookmaker' ) && $query->is_main_query() ) {
 	if($page == 1){
 		$query->set('offset', '1' );	
 	}

        $query->set('meta_key', 'overall_rating');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'DESC');
			$query->set('posts_per_page', '9');
			
	}


 if ( is_post_type_archive( 'match' ) && $query->is_main_query() ) {
$now_date = current_time('timestamp');
        $query->set('meta_key', 'start_time');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
		$query->set('posts_per_page', '10');

		$query->set('meta_query', array(
						array('key' => 'start_time',
							'value'   => $now_date,
							'compare' => '>'),
				   			 ));

			
	}
 
 if ( is_tax( 'sports' ) && $query->is_main_query()) {

$now_date = current_time('timestamp');
        $query->set('meta_key', 'start_time');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
		$query->set('posts_per_page', '20');

		$query->set('meta_query', array(
						array('key' => 'start_time',
							'value'   => $now_date,
							'compare' => '>'),
				   			 ));
			
	}





}
add_action( 'pre_get_posts', 'hlm_sports_archive_page_queries' );




function widget_scripts($hook) {

		if( $hook != 'widgets.php' ){
			return;
		}else{
			wp_enqueue_style('hlm_editor_style', get_template_directory_uri() . '/css/hlm-text-editor.css');
			wp_enqueue_script('hlm_editor_script', get_template_directory_uri().'/js/hlm-text-editor.js', null, null, true);
			wp_enqueue_script('menu-image-upload-fields', get_stylesheet_directory_uri() . '/js/menu-image-upload-fields.js', array('jquery')); 
		} 	
}
add_action('admin_enqueue_scripts', 'widget_scripts');



//Font sizes needed for text editor

function wp_editor_fontsize_filter( $buttons ) {
        array_shift( $buttons );
        array_unshift( $buttons, 'fontsizeselect');
        return $buttons;
}    
add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');


function customize_text_sizes($initArray){
$initArray['fontsize_formats'] = "6px 8px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px";
return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');





// register Custom Menus

function hlm_sports_reg_menus() {
	register_nav_menus(
		array(

			'top-menu' => esc_html__('Top Menu', 'hlm-sports'),

			'main-menu' => esc_html__('Main Menu', 'hlm-sports'),

			'bottom-menu' => esc_html__('Bottom Menu', 'hlm-sports')
			)
	  	);
	  }

add_action( 'init', 'hlm_sports_reg_menus' );




//Background enable

$args = array(
	'default-color' => '000000',
);
add_theme_support( 'custom-background', $args );


//Header-image enable

$args = array( 
	'width'         => 301,
	'height'        => 36,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'header-text'   => false,
	'random-default' => false,
	'flex-height'            => true,
	'flex-width'             => true,

);
add_theme_support( 'custom-header', $args );


//Widgets and Areas

		//Areas


if ( function_exists('register_sidebar') ) {
	register_sidebar(array(	
		'name' => esc_html__('Full Widgetarea', 'hlm-sports'),
		'id' => 'full',
		'description'   =>  esc_html__('Full Widget Area', 'hlm-sports'),
		'before_widget' => '<div class="hlm-sports-widget"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget-title"><h2>',
		'after_title' => '</h2></div>',
	));

	register_sidebar(array(	
		'name' => esc_html__('Post Sidebar', 'hlm-sports'),
		'id' => 'sidebar',
		'description'   =>  esc_html__('Post Sidebar', 'hlm-sports'),
		'before_widget' => '<div class="hlm-sports-widget"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget-title"><h2>',
		'after_title' => '</h2></div>',
	));


}



//Header-image enable

$args = array( 
	'width'         => 301,
	'height'        => 39,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'header-text'   => false,
	'random-default' => false,
	'flex-height'            => false,
	'flex-width'             => false,

);
add_theme_support( 'custom-header', $args );






    if ( ! function_exists( 'get_breadcrumb' ) ) {
        function get_breadcrumb() {
            echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
            if (is_category() || is_single()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                the_category(' &bull; ');
                    if (is_single()) {
                        echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                        the_title();
                    }
            } elseif (is_page()) {
                global $post;
                
                $gs_breadcrumb_title  = get_post_meta( $post->ID, '_gs_breadcrumb_title', true );

                if ( $post->post_parent ) {
                    $parents = get_post_ancestors( $post->ID );
                    $count = count( $parents );
                    if($count > 1){
                        $breadcrumb_title = $gs_breadcrumb_title ? $gs_breadcrumb_title : get_the_title( end ( $parents ) );
                        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                        echo '<a href="'.get_the_permalink(end ( $parents )).'">';
                        echo apply_filters( "the_title", $breadcrumb_title );
                        echo '</a>';
                    }
                    $breadcrumb_title = $gs_breadcrumb_title ? $gs_breadcrumb_title : get_the_title($post->post_parent);
                    echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                    echo '<a href="'.get_the_permalink($post->post_parent).'">';
                    echo $breadcrumb_title;
                    echo '</a>';
                }
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
                $breadcrumb_title = $gs_breadcrumb_title ? $gs_breadcrumb_title : get_the_title($post->ID);
                echo $breadcrumb_title;

            } elseif (is_search()) {
                echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
                echo '"<em>';
                echo the_search_query();
                echo '</em>"';
            }
        }
    }


function hlm_sports_get_star_rating($rating){

//$rating = 4.5;
if(empty($rating)){ $rating = 0;}
$rating = intval($rating);
	?>


<div class="star-rating">
	<?php 

			for ($star = 0; $star < 5; $star++) { 
				if($rating - $star >= 1)
					{  echo '<div class="full-star"></div>';}
				elseif($rating - $star > -0.9 && $rating - $star < 1)
					{ echo '<div class="half-star"></div>';}
				elseif($rating - $star <= 1 )
					{ echo '<div class="empty-star"></div>';}
			}
	?>

</div>

<?php 

}


function hlm_sports_get_star_rating_grade($rating){

if(empty($rating)){ $rating = 0;}

				if($rating <= 1)
					{  echo the_field('star_rating_bad', 'option');}
				elseif($rating > 1 && $rating < 2)
					{ echo the_field('star_rating_normal', 'option');}
				elseif($rating >= 2 && $rating < 3)
					{ echo the_field('star_rating_alright', 'option');}
				elseif($rating >= 3 && $rating < 4)
					{ echo the_field('star_rating_good', 'option');}
				elseif($rating >= 4 && $rating < 4.5)
					{ echo the_field('star_rating_very_good', 'option');}
				elseif($rating >= 4.5 && $rating < 5)
					{ echo the_field('star_rating_great', 'option');}
				elseif($rating >= 5)
					{ echo the_field('star_rating_excellent', 'option');}
}



// Dynamic Widget area for alternative homepage	
function hlm_sports_alternative_homepage(){
if ( function_exists('register_sidebar') ) {
	$pageposts = get_posts(array('posts_per_page' => -1, 'post_type' => 'page', 'post_status' => 'publish', 'meta_query' => array(array('key' => '_wp_page_template', 'value' => 'alternative homepage.php')),));
	foreach ( $pageposts as $q ){

	$id = 'main-'.esc_html($q->ID);
	$page_title = 'main-'.esc_html($q->post_title);

	if ($page_title && function_exists('register_sidebar')){
	register_sidebar(array(
		'id' => $id, 
		'name' => $page_title ,
		'description'   => esc_html($q->post_title).' Widget Area.',
		'before_widget' => '<div class="hlm-sports-widget"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget-title"><h2>',
		'after_title' => '</h2></div>',
	));


	}
	}
}
}
add_action( 'after_setup_theme', 'hlm_sports_alternative_homepage' );










// Get the page number

function hlm_sports_pagination() {
  global $wp_query;
  $big = 999999999; 
  echo paginate_links ( array (
		  'base' => str_replace ( $big, '%#%', get_pagenum_link ( $big ) ),
		  'format' => '?paged=%#%',
		  'current' => max ( 1, get_query_var ( 'paged' ) ),
		  'total' => $wp_query->max_num_pages,
  ) );	
}








// Excerpt Limit

function hlm_sports_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
		if(!empty($excerpt)) {
			$excerpt = implode(' ',$excerpt).'...';
		}else{
			$excerpt = '';
		}
  } elseif ( strpos( get_the_excerpt(), 'more-link' ) === false ) {
  	$excerpt = implode(' ',$excerpt).'...';  
  } else {
    $excerpt = implode(' ',$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;

}









function hlm_sports_get_image_id($image_url) {
		global $wpdb;
		$query = $wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE guid=%s", $image_url );
		$id = $wpdb->get_var($query);
		return $id;
}


function in_array_r($item , $array){
    return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
}


?>