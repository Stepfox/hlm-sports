<?php 
	// Header
?>
<!DOCTYPE html>
<html <?php language_attributes();?>><head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!--viewport-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--pingback-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>

<?php $scripts = get_field('scripts', 'option'); eval( $scripts );  ?>


</head>

<body <?php body_class(); ?>>





<div class="parallax-background">
	<img src="<?php echo get_template_directory_uri() . '/images/parallax-background.png'?>"/>
</div>

<header id="header">

	<div class="top-navigation">
		<div class="top-navigation-wrap">
				<div class="mob-menu-button">
				</div>
			<div class="site-logo-wrapper">
				<div class="big-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
					</a>
				</div>
				<div class="mobile-logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php $image = get_field('mobile_logo', 'option');                            
		            if( $image ) {?>
		              <img src="<?php  echo $image['url']; ?>" alt="">                
		            <?php } ?> 
					</a>
				</div>
				<!--big-logo-->
			</div>
			<!-- site-logo-wrapper -->
			<nav class="top-menu">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
				<!--search-box-->	
				<?php if ( has_nav_menu( 'top-menu' ) ) {wp_nav_menu(array('theme_location' => 'top-menu', 'depth' => 3, 'fallback_cb'     => 'wp_page_menu')); } else { echo '<span class="top-add-menu"></span>';} ?>
			<label class="search-menu">
			<input type="checkbox" id="search-switch" />
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
			<!--search-box-->	
			<span class="search-menu-icon"></span>
			</label>
			</nav>
			<!--top-menu-->
		</div>
		<!-- top-navigation-wrap -->
	</div>
	<!--top-navigation-->
</header>
<!--header-->
	<div id="nav-wrapper">
		<div id="navigation">
				<div class="nav-odds-title">
					Betting Odds:
				</div>
			<nav id="main-nav">	

				<?php if ( has_nav_menu( 'main-menu' ) ) {wp_nav_menu(array(
				'theme_location' => 'main-menu',
				'depth' => 1, 
				'fallback_cb'     => 'wp_page_menu',
				'walker' => new Walker_Nav_Menu_with_icons()
				));}else { echo '<span class="add-menu"></span>';} ?>

			</nav>
			<!--main-nav-->
		</div>
		<!--navigation-->
	</div>
	<!--nav-wrapper-->