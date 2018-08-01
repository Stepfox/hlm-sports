<?php 
/**
 * Examiner live-style
**/ 
?>
<?php 

function exm1_head() {

	$slide_style = get_option('exm1_slider_picker');
	if($slide_style == 'slider_fx1'){$slide_picker='slide';}else{$slide_picker='fade';}
	$top_posts_background = get_option('exm1_top_posts_background');
	$exm1_popular_background_color = get_option('exm1_popular_background_color');
	$exm1_popular_text_color = get_option('exm1_popular_text_color');
	$exm1_popular_read_more_color = get_option('exm1_popular_read_more_color');
	$exm1_footer_background_color = get_option('exm1_footer_background_color');
	$exm1_footer_border_color = get_option('exm1_footer_border_color');
	$exm1_footer_text_color = get_option('exm1_footer_text_color');
	$exm1_footer_hover_color = get_option('exm1_footer_hover_color');
	$top_posts_cat_color = get_option('exm1_top_posts_cat_color');
	$top_posts_title_color = get_option('exm1_top_posts_title_color');
	$exm1_site_width = get_option('exm1_site_width').'px';
	$bloginfo = get_template_directory_uri();
	$menu_background = get_option('exm1_menu_background');
	$logo_background = get_option('exm1_logo_background');
	$menucolor = get_option('exm1_menu_color');
	$menu_font_weight = get_option('exm1_menu_font_weight');
	$menu_font_size = get_option('exm1_menu_font_size');	
	$menu_hover_color =  get_option('exm1_menu_hover_color');
	$main_color = get_option('exm1_main_color');
	$widget_fx = get_option('exm1_widget_fx');
	$image_effect = get_option('exm1_image_effect');
	$font = get_option('exm1_fonts');
	$menu_font = get_option('exm1_menu_font');
	$small_text_font = get_option('exm1_small_text_font');
	$search_color = get_option('exm1_search_color');
	$search_color_mob = get_option('exm1_mob_search_color');
	$menu_border_color = get_option('exm1_menu_border_color');
	$uppercase_title = get_option('exm1_uppercase_title');
	$exm1_content_font_size = get_option('exm1_content_font_size').'px'; 
	$exm1_content_line_height = $exm1_content_font_size * 1.6.'px';
	$gradient_shape = get_option('exm1_gradient_shape');
	$gradient_color_1 = get_option('exm1_gradient1');
	$gradient_color_2 = get_option('exm1_gradient2');
	$gradient_opacity = get_option('exm1_gradient_opacity');
	$widget_title_color = get_option('exm1_widget_title_color' );
	$background_color = get_background_color();
	$exm1_widget_title_style = get_option('exm1_widget_title_style' );
	$exm1_widget_font_weight = get_option('exm1_widget_font_weight' );
	
//Css
	echo "

<style type='text/css'>
.fullwidth-image:before{ box-shadow: inset 0 -327px 200px -200px #$background_color;}


body, .small-title, .widget-title, .tv-featured-title{font-family:$font;}
.popular-part:before{background:$exm1_popular_background_color;box-shadow: 0 -999px 0 999px $exm1_popular_background_color;}
.popular-slider-container .slides:before{background: radial-gradient(ellipse at center, rgba(0,0,0,0) 0%,$exm1_popular_background_color 64%,$exm1_popular_background_color 100%);}
.popular-part a, .popular-part .widget-title{color:$exm1_popular_text_color;}
.read-more a{color:$exm1_popular_read_more_color;}
.blog-post-content, .img-featured-text, .about-text, .exm1-blog-posts-subtitle, .flex-active-slide .slide-excerpt, .jumping-posts-excerpt, .combination-title-subtitle, .tv-widget-content, #post-content, #post-page-subtitle, .newsroll-posts-title a{font-family:$small_text_font;}
#footer{background:$exm1_footer_background_color; }
#footer a, .copyright-text{color:$exm1_footer_text_color;}
#footer a:hover{color:$exm1_footer_hover_color;}
.footer-wrap{border-color:$exm1_footer_border_color;}
#main-nav ul li a, #mob-menu{font-family: $menu_font;}
#wrapper, .footer-wrap{max-width:$exm1_site_width;}
.big-logo, .sub-menu-wrapper, .ticker-box{border-color:$menu_border_color;}
#site-logo, .about-logo, #mob-menu{background:$logo_background;}
.ticker-box, .page-numbers.current, .about-social{background:$menu_background;}
.menu-item .menu-link, #ticker a, .page-numbers.current, .about-social a, .ticker-heading{color:$menucolor;}
.subsignmeni:after{border-top: 8px solid $menucolor;}
#main .widget-title, #main .widget-title a{color:$widget_title_color;}
#main-nav ul li:hover > .menu-link, #ticker a:hover, .about-social a:hover, .sub-menu-wrapper .small-category li:hover > .small-text a{color:$menu_hover_color;}
.subsignmeni:hover:after{border-top: 8px solid $menu_hover_color;}
#main-nav ul li > .menu-link{font-weight:$menu_font_weight;}
.menu-link {font-size:$menu_font_size;}
.featured-category, .trending-title, .trending-posts, .page-numbers, input#wp-submit{background: $main_color;}
.newsroll-title, .exm1-blog-posts-thumb, .post-page-gallery-thumbnails .flex-active-slide:after, .flex-active .wide-slider-thumb:after{border-color:$main_color;}
.blog-post-author a, .exm1-blog-posts-author a, #recentcomments li, .widget_categories select, .widget_archive select, .sticky a{color:$main_color;}

#searchform .submit-button{background:$main_color url($bloginfo/images/search-icon$search_color.png) no-repeat center;}




ul.tabs li.active{background:$menu_background;}
ul.tabs li.active, ul.tabs li {border-color:$menu_background;}
.tabs li.active h4 a{color:$menucolor;}

.img-featured-review-score, .blog-post-categories, .jumping-posts li:hover .jumping-posts-text, .woocommerce input#searchsubmit, .super-slider-category, .floating-share-icons li, .pagination.pagination-load-more a{background:$main_color;}
.sub-meni .menu-links.inside-menu li{background: $menu_background;}
.sub-meni .menu-links.inside-menu li a{color: $menucolor;}
.sub-menu{border-color:$main_color;}

#post-content{font-size:$exm1_content_font_size;line-height:$exm1_content_line_height;}
::selection{background:$main_color;}
::-moz-selection{background:$main_color;}
.load-circle{border-bottom:5px solid $main_color;border-right:5px solid $main_color;box-shadow: 0 0 35px $main_color;}
#wp-calendar #today{background:$main_color !important;text-shadow:none;}
.total-score, .score-width, li:hover .play-icon{background: $main_color;}
.jumping-posts li:hover .jumping-posts-text:before{border-bottom: 14px solid $main_color;}
.single-post #post-content.first-letter > p:first-of-type:first-letter{font-size:67px; color:$main_color;float: left;line-height: 60px;margin-right: 15px;font-weight:800;}
#post-page-title h1{text-transform:$uppercase_title;}
blockquote, q.left, q{border-left: 2px solid $main_color;color:$main_color;}
.img-featured-review-score:before{border-top: 9px solid $main_color;}
.sub-meni .menu-links.inside-menu li:hover{background:$menu_background;}
#main-nav .sub-meni .menu-links.inside-menu li:hover > .menu-link{color:$menu_hover_color;}
.ticker-arrows{background:$menu_background;box-shadow:-21px 0 30px $menu_background;}
.widget-title {font-style: $exm1_widget_title_style;font-weight:$exm1_widget_font_weight;}

.huge .img-featured-posts-image:after, .super-image:after, .super-slider li .super-slider-post:after, .super-slider li .super-slider-post:after, .img-featured-posts-image:before, .small-image:before, .wide-slider .slides li:after{ background: $gradient_shape, $gradient_color_1, $gradient_color_2);opacity:$gradient_opacity;}


.post-author a, .post-author a:visited, .good-title, .bad-title, #post-content a, .trending-posts-category a, .category-tv-icon a, .ticker-sign, .category-icon a, .jumping-posts-category a, a:hover, .category-icon a:hover, .trending-posts-category a:hover, .featured-posts-title a:hover, #post-content a:hover, .blog-post-title h2 a:hover, .bypostauthor a:hover, .post-author a:hover, .most-commented-cateogory a, .most-commented-count a {color:$main_color;}


.content q.right{border-left:0;border-right: 2px solid $main_color;color:$main_color;}



.widget.buddypress div.item-options a, .widget_display_stats dd{color:$main_color;}
#buddypress div.item-list-tabs ul li a span, #buddypress div.item-list-tabs ul li.current a span, #buddypress div.item-list-tabs ul li.selected a span, .widget.buddypress #bp-login-widget-form #bp-login-widget-submit, span.bp-login-widget-register-link a, button#user-submit, .bbp-login-form .bbp-login-links a, tt button.button.submit.user-submit, input#bbp_search_submit {background:$main_color;}

.image_fx1:hover:after{background: $main_color;}


</style>";

//Slider

	echo
	"<script type='text/javascript'>
			var slide_picker = '$slide_picker';
			var widget_fx = '$widget_fx';
			var image_effect = '$image_effect';
	</script>";

}


//Login page css
function custom_login_css() {
    $login_logo = get_header_image();
	$login_logo_height = get_custom_header()->height.'px';
	$login_logo_width = get_custom_header()->width.'px';
	$main_color = get_option('exm1_main_color');
	$logo_background = get_option('exm1_logo_background');
	
	echo "
	<style type='text/css'>
body.login {background: #FFF;}
.login *{text-align:center;}
.login label{font-size:18px;font-weight:700;color:#000;}

input#rememberme {float: left;height: 17px;width: 17px;margin-right: 12px;margin-top: 2px;}
.login form .forgetmenot label{font-size:16px;}
.forgetmenot{margin:7px 0;}
.login h1 a {background: $logo_background url($login_logo);background-size: $login_logo_width $login_logo_height;width: $login_logo_width;height: $login_logo_height;}
.interim-login #login{width:320px;}
#login {width: 400px;padding: 8% 0 0;margin: auto;}
input#wp-submit{background-color:$main_color;border:0;border-radius:0;font-size:16px;text-transform:uppercase;font-weight:700;color:#FFF !important;padding: 0 12px;height: 30px;line-height: 28px;}
.login form{margin-top:0;box-shadow:none;-webkit-box-shadow:none;padding:30px 0 60px;}
.login #nav{font-size:0;padding:0;}
p#nav a{background-color:$main_color;border:0;border-radius:0;font-size:16px;text-transform:uppercase;font-weight:700;color:#FFF !important;padding: 5px 0px;margin-right:20px; float: left;text-align: center;margin-bottom: 20px;width:100%;}
.login #backtoblog a{color:$main_color;font-size:20px;font-weight:700;}
 p#nav a:hover, input#wp-submit:hover{background-color:#FFF;color:$main_color !important;box-shadow:inset 0 0 10px $main_color;}
 .login #login_error{border-color:$main_color;}
    </style>";
}
//Fonts

function google_font() {
	$font = get_option('exm1_fonts');
	$fontmenu = get_option('exm1_menu_font');
	$fontwidget = get_option('exm1_small_text_font');
	$exm1_customfont = str_replace( ' ', '+', $font ) . ':400,600,700|' . esc_html($font);
	$exm1_customfontmenu = str_replace( ' ', '+', $fontmenu ) . ':400,600,700|' . esc_html($fontmenu);
	$exm1_customfontsmalltext = str_replace( ' ', '+', $fontwidget ) . ':400|' . esc_html($fontwidget);
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'google-fonts', "$protocol://fonts.googleapis.com/css?subset=latin,latin-ext,cyrillic,cyrillic-ext&family=".esc_html($exm1_customfont) . " rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'google-menu-fonts', "$protocol://fonts.googleapis.com/css?subset=latin,latin-ext,cyrillic,cyrillic-ext&family=".esc_html($exm1_customfontmenu) . " rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'google-widget-fonts', "$protocol://fonts.googleapis.com/css?subset=latin,latin-ext,cyrillic,cyrillic-ext&family=".esc_html($exm1_customfontsmalltext) . " rel='stylesheet' type='text/css" );
}
add_action('login_head', 'custom_login_css');
add_action( 'wp_enqueue_scripts', 'google_font' );
add_action( 'wp_head', 'exm1_head');

?>