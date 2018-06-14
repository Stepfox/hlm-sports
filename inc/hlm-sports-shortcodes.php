<?php 

function hlm_sports_ctm(){ 

    ?>
<a href="" target="_blank">
    <div class="hlm-cta-button">

            <?php the_field('bet_now', 'option');  ?>

    </div>
</a>

<?php 
} 
add_shortcode('hlm_sports_ctm','hlm_sports_ctm');









function hlm_sports_content_looks1( $atts, $content = null ) {
	return '<span class="content-looks1">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks1', 'hlm_sports_content_looks1' );


function hlm_sports_content_looks2( $atts, $content = null ) {
	return '<span class="content-looks2">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks2', 'hlm_sports_content_looks2' );


function hlm_sports_content_looks3( $atts, $content = null ) {
	return '<span class="content-looks3">' . $content . '</span>';
}
add_shortcode( 'hlm_sports_content_looks3', 'hlm_sports_content_looks3' );



function hlm_sports_content_images($atts) {
	$images = shortcode_atts( array(
    'image1' => '',
    'image2' => '',
	), $atts );

	return '<div class="content-images-shortcode">
				<img src="' . $images['image1'] . '" />
				<img src="' . $images['image2'] . '" />
			</div>';
}
add_shortcode( 'hlm_sports_content_images', 'hlm_sports_content_images' );







function hlm_sports_match_odds(){ 

    ?>
  <div class="odds-widget">

    <div class="odds-prev"> < </div> 
    <div class="odds-next"> > </div>

    <div class="odds-widget-bookmakers">

      <div class="odds-sports-wrap">
        <div class="odds-widget-sports">
        <img src="<?php echo get_template_directory_uri() . '/widgets/odds-widget/logos/world-cup.png'?>"/>
        </div>
      </div>
      <ul class="odds-widget-bookmakers-links slides">
        <?php 

                $args1 = array(
                    'post_type' => 'bookmaker',
                    'posts_per_page' => -1, 
                    'post_status' => 'publish',   
                );
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order'))){ ?>

        <li>
          <div class="odds-widget-bookmakers-links-logo bookmaker-background-wrap-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>">
            <?php $image = get_field('logo_136x44');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" alt="<?php echo $photo['alt']; ?>" >                 
            <?php } ?>  

            </a>
          </div>
          <div class="odds-widget-bookmakers-links-button top-5-review-bet-now">
            <a href="<?php echo the_field( 'default_tracker'); ?>" target="_blank">
                        <?php the_field('bet_now', 'option');  ?>
                    </a>
          </div>
        </li>
      <?php  } endwhile; wp_reset_postdata();?>

      </ul>
    </div>
    <ul class="odds-widget-matches">
 
      <li>
        <div class="odds-game-wrap">
          <div class="odds-game-time">
            <?php $myDateTime = get_field('start_time'); echo date ('H i A',$myDateTime); ?>
          </div>
          <div class="odds-game-teams">
            <div class="odds-game-home-team">
              <div class="odds-game-home-team-name">
                <?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
                <a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
                  <?php echo $home_team->slug;?>
                </a>
              </div>
            </div>
            <div class="odds-game-away-team">
              <div class="odds-game-away-team-name">
                draw
              </div>
            </div>
            <div class="odds-game-away-team">
              <div class="odds-game-away-team-name">
                <?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
                <a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
                  <?php echo $away_team->slug;?>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="odds-list" >
          <?php if(get_field('winner_table')): ?>
          <ul class="odds-widget-odds-list slides">
            <?php while(has_sub_field('winner_table')): 
              $deezs = get_sub_field('bookmaker'); if(!empty(get_field('bookmaker_crawl_order', $deezs->ID))) { ?>
            <li>
              <?php ?>
              <div class="odds-game-home-team-odd">
                <?php if(!empty(get_sub_field('win_odds'))){the_sub_field('win_odds');}else{echo '*';} ?>
              </div>
              <div class="odds-game-away-team-odd">
                <?php if(!empty(get_sub_field('draw_odds'))){the_sub_field('draw_odds');}else{echo '*';} ?>
              </div>
              <div class="odds-game-away-team-odd">
                <?php if(!empty(get_sub_field('loss_odds'))){the_sub_field('loss_odds');}else{echo '*';}?>
              </div>
            </li>
            <?php } endwhile; ?>
          </ul>
          <?php endif; ?>
        </div>
      </li>

    </ul>
  </div>

<!-- close but dont know -->
</div></div>

<?php 
} 
add_shortcode('hlm_sports_match_odds','hlm_sports_match_odds');




function hlm_sports_highest_odd(){ ?>
<div class="bestodds-widget">

    <ul>
<?php 


$home_team = get_term( get_field('home_team', get_the_ID() ), 'teams' );
$away_team = get_term( get_field('away_team', get_the_ID()), 'teams' );

$args = array(
          'posts_per_page' => 2,
          'post_type' => 'match',
          'post_status' => 'publish', 
          'offset' => 1,
        'meta_key'      => 'start_time',
        'orderby'     => 'meta_value',
        'order'       => 'ASC',
          'tax_query' => array(
                array(
                    'taxonomy' => 'teams',
                    'field' => 'slug',
                    'terms' => array($home_team->slug, $away_team->slug)
                 )
              )
      );

                $matches_query = new WP_Query($args);
                while($matches_query->have_posts()) : $matches_query->the_post();

?>
      <li>

      <?php 
        $win_odds = array();
        $draw_odds = array();
        $loss_odds = array();
        $i = 0;
                if(get_field('winner_table')):
                  while(has_sub_field('winner_table')): 
                    $deezs = get_sub_field('bookmaker'); if(!empty(get_field('bookmaker_crawl_order', $deezs->ID))) { 
                      
                  if(!empty( get_sub_field('win_odds'))){ 
                    $win_odds[] = array(
                      'odds' => get_sub_field('win_odds'),
                      'bookmaker' => $deezs->ID
                    );
                  }else{
                    $win_odds[] = '0';  
                  }


                  if(!empty( get_sub_field('draw_odds'))){ 
                    $draw_odds[] = array(
                      'odds' => get_sub_field('draw_odds'),
                      'bookmaker' => $deezs->ID
                    );
                  }else{
                    $draw_odds[] = '0'; 
                  }

                  if(!empty( get_sub_field('loss_odds'))){ 
                    $loss_odds[] = array(
                      'odds' => get_sub_field('loss_odds'),
                      'bookmaker' => $deezs->ID
                    );
                  }else{
                    $loss_odds[] = '0'; 
                  }

          }

                endwhile;          
                endif; 


      $win_odds_array = array_column($win_odds, 'bookmaker', 'odds');
      $highest_win_odd = max(array_keys($win_odds_array));
      $bookmaker_win_odd = $win_odds_array[$highest_win_odd];


      $draw_odds_array = array_column($draw_odds, 'bookmaker', 'odds');
      $highest_draw_odd = max(array_keys($draw_odds_array));
      $bookmaker_draw_odd = $draw_odds_array[$highest_draw_odd];

      $loss_odds_array = array_column($loss_odds, 'bookmaker', 'odds');
      $highest_loss_odd = max(array_keys($loss_odds_array));
      $bookmaker_loss_odd = $loss_odds_array[$highest_loss_odd];      

      $terms = wp_get_post_terms( get_the_ID(), 'teams');

      ?>


            <div class="odds-widget">
              <div class="odds-date">
          <?php $myDateTime = get_field('start_time');
            echo date('l, F d H:i A',$myDateTime);
             ?>     
        </div>

        <div class="bestodds-teams">
          <div class="bestodds-team">
            <div class="bestodds-team-part">
              <a href="<?php echo get_term_link($terms[0]->slug, 'teams');?>">
                <?php  echo $terms[0]->name; ?>         
              </a>
            </div>
            <div class="bestodds-team-part bookmaker-background-wrap-<?php echo $bookmaker_win_odd; ?>">
              <?php $image = get_field('logo_136x44', $bookmaker_win_odd);          
                    if( $image ) {?>
                      <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" >                 
                    <?php } ?>
                </div>
                <div class="bestodds-team-part">
                  <?php echo $highest_win_odd; ?>
                </div>
                <div class="bestodds-team-part">
              <a class="top-5-review-bet-now" href="<?php echo the_field( 'default_tracker', $bookmaker_win_odd); ?>" target="_blank">
                          <?php the_field('bet_now', 'option');  ?>
                      </a>
                </div>
          </div>


          <div class="bestodds-team">
            <div class="bestodds-team-part">
              <?php  echo 'draw'; ?>
            </div>    
            <div class="bestodds-team-part bookmaker-background-wrap-<?php echo $bookmaker_draw_odd; ?>">
              <?php $image = get_field('logo_136x44', $bookmaker_draw_odd);          
                    if( $image ) {?>
                      <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" >                 
                    <?php } ?>
                </div>
                <div class="bestodds-team-part">
                  <?php echo $highest_draw_odd; ?>
                </div>
                <div class="bestodds-team-part">
              <a class="top-5-review-bet-now" href="<?php echo the_field( 'default_tracker', $bookmaker_draw_odd); ?>" target="_blank">
                          <?php the_field('bet_now', 'option');  ?>
                      </a>
                </div>

          </div>

          <div class="bestodds-team">
            <div class="bestodds-team-part">
              <a href="<?php echo get_term_link($terms[1]->slug, 'teams');?>">
                <?php  echo $terms[1]->name; ?>         
              </a>
            </div>
            <div class="bestodds-team-part bookmaker-background-wrap-<?php echo $bookmaker_loss_odd; ?>">
              <?php $image = get_field('logo_136x44', $bookmaker_loss_odd);          
                    if( $image ) {?>
                      <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" >                 
                    <?php } ?>
                </div>
                <div class="bestodds-team-part">
                  <?php echo $highest_loss_odd; ?>
                </div>
                <div class="bestodds-team-part">
              <a class="top-5-review-bet-now" href="<?php echo the_field( 'default_tracker', $bookmaker_loss_odd); ?>" target="_blank">
                          <?php the_field('bet_now', 'option');  ?>
                      </a>
                </div>

        </div>


            </div>
      <div class="bestodds-match">
        <a href="<?php the_permalink() ?>">
          See all Odds for this match <span>→</span>
        </a>
      </div>





      </li>
<?php endwhile; ?>

    </ul>

</div>

<?php
      }



add_shortcode('hlm_sports_highest_odd','hlm_sports_highest_odd');




?>