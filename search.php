<?php get_header();?>

<main id="main" class="search-page">
  <div id="full-area">
        <div class="post-content widget">
          <div class="post-title">
            <h1>
				Search Result for
				"<?php the_search_query(); ?>"
            </h1>
          </div>
<ul>
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
             ?>								
				<li>					


			<div class="searchpage-wrap">
				<div class="searchpage-title-box">
					<div class="searchpage-title">
						<h2>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
							</a>
						</h2>
					</div>
					<!--searchpage-title-->
					

					<?php echo hlm_sports_excerpt(30); ?>
					<div class="searchpage-url">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php echo the_permalink(); ?>
						</a>
					</div>
				</div>
				<!--searchpage-title-box-->
			</div>
			<!-- blogwrap -->
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="read-more">
                 read more
            </div>
        	</a>





				</li>
				<?php 
        endwhile;
        //pagination
        
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>
	</ul>
	<?php hlm_sports_pagination(); ?>
      </div>
  </div>
</main>










<?php get_footer(); ?>