<?php get_header();?>

<main id="main" class="archive-payment-options">
  <div class="four-parts hlm-sports-widget top-page-area">
	            <?php $image = get_field('header_image', 'option');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_1200x260']; ?>" alt="<?php echo $image['alt']; ?>">                
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

	    <div class="archive-payment-wrap">
	      <div class="archive-payment-icon">
	         <?php $image = get_field('payment_icon');                            
	            if( $image ) {?>
	            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $image['alt']; ?>">    
	          	</a>            
	            <?php } ?>  
	      </div>

		<div class="payment-icon-content">
			<?php echo hlm_sports_excerpt(30); ?>
		</div>
		<div class="payment-icon-read-review">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		         <?php the_field('read_review', 'option');  ?>
			</a>
	    </div>
	</div>
<div class="payment-icon-bookmakers">
			<span>
				Recomended Sportsbook
			</span>


						<?php

						$bookmakers = get_posts(array(
							'post_type' => 'bookmaker',
							'meta_query' => array(
								array(
									'key' => 'payment_options', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

						?>
						<?php if( $bookmakers ): ?>
							<ul>
							<?php foreach( $bookmakers as $bookmaker ): ?>
								<?php 

								$photo = get_field('logo_136x44', $bookmaker->ID);?>
									

								
								<li>
									<a href="<?php echo get_permalink( $bookmaker->ID ); ?>">
							<div class="bookmaker-background-wrap-<?php echo $bookmaker->ID; ?>">		 
								<img src="<?php echo $photo['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $photo['alt']; ?>" />		
							</div>

										
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
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