</section>
<!--wrapper-->

<footer id="footer">

<div class="footer-color-wrap">	
	<div class="footer-wrap">
		<div class="footer-logo">
			<a href="#"><img src="<?php echo get_template_directory_uri() . '/images/footerlogo.png'?>" /></a>
		</div>

		<div class="content-social">
			<ul><li>
				<a href="<?php the_field('fb_link', 'option'); ?>" target="_blank">
					<img src="<?php echo get_template_directory_uri() . '/images/fb-footer.png'?>">
				</a>
			</li> 
				<li>
					<a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/images/twitter-footer.png'?>">
					</a>
				</li>
			</ul>
		</div>	
	</div>
</div>

<div class="footer-color-wrap">	
	<div class="footer-wrap">
		<div class="footer-gambleaware-logo">
			<img src="<?php echo get_template_directory_uri() . '/images/gambleaware.png'?>" style="margin:0 auto 10px;display: table;"/>
		</div>
		<div class="footer-gambleaware-text">
			<?php the_field('gamble_aware_text', 'option'); ?>
		</div>
	</div>
</div>

<div class="footer-color-wrap">	
	<div class="footer-wrap">
		<div class="footer-copyright">
			<?php the_field('copyright', 'option'); ?>
		</div>

		<div class="footer-menu">
			<nav id="bottom-menu">
				<?php if ( has_nav_menu( 'bottom-menu' ) ) {wp_nav_menu(array('theme_location' => 'bottom-menu', 'depth' => 1));} else { echo '<span class="add-menu">ADD MENU</span>';}?>
			</nav>
			<!--bottom-menu-->	
		</div>
	</div>
</div>

</footer>
<!--footer-->
<?php wp_footer(); ?>
</body></html>