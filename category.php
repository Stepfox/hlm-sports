<?php get_header();?>

<main id="main" class="category-page">
  <div class="four-parts hlm-sports-widget top-page-area">
	            <?php $image = get_field('header_image', 'option');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_1200x260']; ?>" alt="">                
            <?php } ?> 

  </div>

  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget">

<?php the_field('top_content', 'option'); ?>







<ul>
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
             ?>								
				<li>					




					<div class="blog-post-image">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('hlm_sports_232x310'); ?>
						</a>
						<?php } ?>
					</div>
					<!--blog-post-image-->
					<div class="blog-post-title-box">
						<div class="blog-post-title">
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
								</a>
							</h2>
						</div>
						<!--blog-post-title-->
					</div>
					<!--blog-post-title-box-->

					<div class="blog-post-date-author">

						<div class="blog-post-author">
							<?php the_author_posts_link(); ?>
						</div>
						<!--blog-post-author-->


						<div class="blog-post-date">
							<?php echo esc_html(get_the_date()); ?>
						</div>
						<!--blog-post-date-->

					</div>
					<!--blog-post-date-author-->

					<div class="blog-post-content">
						<?php echo hlm_sports_excerpt(50); ?>
					</div>
					<!--blog-post-content-->	





				</li>
				<?php 
        endwhile;
        //pagination
        
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>
	</ul>
<?php the_field('bottom_content', 'option'); ?>

	</div>
	<?php //hlm_sports_pagination(); ?>
      </div>
  </div>

  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

</main>










<?php get_footer(); ?>