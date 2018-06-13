<?php get_header(); ?>
<main id="main">
  <div class="four-parts hlm-sports-widget match-top-page-area">
    <div class="widget featured-match">
      <div class="three-parts hlm-sports-widget">
    <div class="widget-title">
      <h2>
      <?php the_field('upcoming_match', 'option');  ?>
      </h2>
    </div>
    
       <div class="featured-match-inside-wrap">
          <div class="featured-match-right">
              <div class="featured-match-versus">
                <div class="home-team">
                <?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
                  <?php echo $home_team->slug;?>
                </div>
                <div class="versus-sign">
                  VS
                </div>
                <div class="away-team">
                <?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
                  <?php echo $away_team->slug;?>
                </div>
              </div> 
              <div class="featured-match-logo">     
                <?php $image = get_field('sport_logo', 'option');                            
                if( $image ) {?>
                  <img src="<?php  echo $image['sizes']['hlm_sports_40x40']; ?>" alt="">                
                <?php } ?>                    
              </div>
              <div class="featured-match-date">
               <?php            $myDateTime = get_field('start_time');
            echo date ('l F d',$myDateTime); ?>
              </div>  
              <div class="featured-match-time">
                <?php echo date ('H i A',$myDateTime); ?>
              </div>  
              <a href="<?php echo the_field( 'default_tracker' ); ?>" target="_blank">
                <div class="featured-match-bet-now">
                    <?php the_field('bet_now', 'option');  ?>
                </div>
              </a>
          </div>



          
            <?php $image = get_field('game_image', 'option');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="">                
            <?php } ?> 



      </div>
    </div>


      <div class="one-part hlm-sports-widget">

      </div>
    </div>
  </div>




  <div class="three-parts hlm-sports-widget post-page-area">
    <?php echo do_shortcode( '[hlm_sports_highest_odd]' ); ?>
        <div class="post-content widget">

<?php echo do_shortcode( '[hlm_sports_match_odds]' ); ?>




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

  </div>



  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>


</main>
<?php get_footer(); ?>