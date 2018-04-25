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
                  <?php the_field('home_team', 'option'); ?>
                </div>
                <div class="versus-sign">
                  VS
                </div>
                <div class="away-team">
                  <?php the_field('away_team', 'option'); ?>
                </div>
              </div> 
              <div class="featured-match-logo">     
                <?php $image = get_field('sport_logo', 'option');                            
                if( $image ) {?>
                  <img src="<?php  echo $image['sizes']['hlm_sports_40x40']; ?>" alt="">                
                <?php } ?>                    
              </div>
              <div class="featured-match-date">
               <?php the_field('match_date', 'option'); ?>
              </div>  
              <div class="featured-match-time">
                <?php the_field('match_time', 'option'); ?>
              </div>  
              <div class="featured-match-location">
                <?php the_field('match_location', 'option'); ?>
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
<?php 
$bookmaker = get_field('featured_review_bookmaker', 'option'); 
$bookmaker_bonus = get_field('featured_review_bonus', 'option'); 
$bookmaker_title = get_field('featured_review_title', 'option'); 

$widget_instance = array( 'title' => $bookmaker_title, 'biglooks_bonus_title' => '', 'biglooks_bonus_one' => '', 'biglooks_bonus_two' => '', 'biglooks_bonus_three' => '',  'looks' => 'looks2', 'bonus' => array('0' => $bookmaker_bonus), 'bookmaker' => array('0' => $bookmaker));
$widget_args = array(   'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>');

the_widget( 'hlm_sports_232x310_widget', $widget_instance, $widget_args ); ?>
      </div>
    </div>
  </div>




  <div class="three-parts hlm-sports-widget post-page-area">
        <nav>
          <ul>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
            <li>
              <a href="#">
                Content
              </a>
            </li>
          </ul>
        </nav>
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

  </div>



  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>


</main>
<?php get_footer(); ?>