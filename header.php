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

<?php if (is_home()){ ?>
<script src="https://zz.connextra.com/dcs/tagController/tag/4b14c6edf5e6/homepage" async defer></script>
<?php }else{ ?>
<script src="https://zz.connextra.com/dcs/tagController/tag/4b14c6edf5e6/<?php $post_slug = get_post_field( 'post_name', get_post() ); echo $post_slug;?>" async defer></script>
<?php } ?>	
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
						<img src="<?php echo get_template_directory_uri() . '/images/mob-logo.png'?>"/>
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
				<?php if ( has_nav_menu( 'top-menu' ) ) {wp_nav_menu(array('theme_location' => 'top-menu', 'depth' => 2, 'fallback_cb'     => 'wp_page_menu')); } else { echo '<span class="top-add-menu"></span>';} ?>
			</nav>
			<!--top-menu-->
		</div>
		<!-- top-navigation-wrap -->
	</div>
	<!--top-navigation-->



	<div id="nav-wrapper">
		<div id="navigation">

			<nav id="main-nav">	

				<?php if ( has_nav_menu( 'main-menu' ) ) {wp_nav_menu(array(
				'theme_location' => 'main-menu',
				'depth' => 10, 
				'fallback_cb'     => 'wp_page_menu',
				'walker' => new Walker_Nav_Menu_with_icons()
				));}else { echo '<span class="add-menu"></span>';} ?>

			</nav>
			<!--main-nav-->
			<label class="search-menu">
			<input type="checkbox" id="search-switch" />
			
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
			<!--search-box-->	
			<span class="search-menu-icon"></span>
			</label>	
		</div>
		<!--navigation-->
	</div>
	<!--nav-wrapper-->
</header>
<!--header-->
<?php if (! is_front_page()) {?>
<div class="breadcrumb">

<?php get_breadcrumb(); ?>
	</div>
<?php } ?>