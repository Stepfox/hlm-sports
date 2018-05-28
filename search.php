<?php get_header();?>

<main id="main" class="search-page">
  <div id="full-area">
        <div class="post-content widget">
          <div class="post-title">
            <h1>
				Search Result for
				"<?php the_search_query(); ?>"
            </h1>
            <div class="search-page-desc">
            <?php 
				$total = $wp_query->found_posts;
				$per_page = 10;
				$curpage = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$result_start = ($curpage - 1) * $per_page + 1;
				if ($result_start == 0) $result_start= 1;

				$result_end = $result_start + $per_page-1;

				if ($result_end < $per_page)   // happens when records less than per page  
				    $result_end = $per_page;  
				else if ($result_end > $total)  // happens when result end is greater than total records  
				    $result_end = $total;
				echo "Displaying $result_start to $result_end of $total";  ?>
			</div>

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
					

					<?php echo hlm_sports_excerpt(60); ?>
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