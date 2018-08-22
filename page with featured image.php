<?php 
/* Template Name: Page With Featured Image
 * Description : Page With Featured Image
 */
?>


<?php get_header(); 


?>
	<main id="main" class="page-with-featured-image">
  <div class="four-parts top-page-area">
		<?php 
			the_post_thumbnail('hlm_sports_1200x260');
		?>

  </div>

		<div id="full-area">



        <div class="post-content widget">
        <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
              the_content();
                wp_link_pages(array(  
                'before' => '<div class="pagination">' . 'Pages:',  
                 'after' => '</div>'  
                  )); 
        endwhile;
      else :
        ?><p><?php _e( 'Sorry, no posts matched your criteria.', 'hlm-sports' ); ?></p><?php
      endif;
    ?>

      </div>
<?php 
          $authordesc = get_the_author_meta( 'description' );
          if ( ! empty ( $authordesc ) ){ ?>
<div class="four-parts widget">

    <div class="widget-title">
      <h2>
         Author Info
      </h2>
    </div>
        <div id="author-info">
          <div id="author-image">
            <?php echo wp_kses_post(get_avatar( get_the_author_meta('email'), '96' )); ?>
          </div>
          <!--author-image-->
          <div id="author-desc">
            <h2>
              <?php the_author_posts_link(); ?>
            </h2>
            <div class="description-author">
              <?php the_author_meta('description'); ?>
            </div>
            <!--description-author-->
          </div>
          <!--author-desc-->
        </div>
        <!--author-info-->
</div>


        <?php }

?>
		</div>	
	</main>
<?php get_footer(); ?>