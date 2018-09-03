<?php 

//cpt matches functions


if ( ! function_exists( 'hlm_theme_styles' ) ) :
  function hlm_theme_styles() {
    wp_enqueue_style( 'matches-parts', get_template_directory_uri() . '/css/matches-parts.css' );
    wp_enqueue_style( 'hlm-sports-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array());
  }
endif;
add_action('wp_enqueue_scripts', 'hlm_theme_styles');



//matches archive list



function matches_archive_list(){
  ?>

<style>

</style>

<div class="four-parts matches_archive_list">

              <div class="unit-right">
                <div class="promo-creative-details">
                  <div class="promo-creative-countdown">
                      <p class="game-info-subtitle">
                        <time> 
                          <?php $myDateTime = (int)get_field('start_time'); 
                          echo date ('F d, Y H : i',$myDateTime); ?>                  
                        </time>
                      </p>
                  </div>
                  <div class="promo-main promo-creative-main">
                    <div class="promo-team promo-creative-team">
                      <div class="promo-team-title">
                        <div class="promo-team-name">     
                          <?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
                          <a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
                            <?php echo $home_team->slug;?>
                          </a>
                        </div>
                      </div>
                      <figure class="promo-team-figure">                                <?php
                          $home_team = get_term( get_field('home_team'), 'teams' );
                         $image = get_field('flag', $home_team);                            
                            if( $image ) {?>
                              <img src="<?php  echo $image['sizes']['hlm_sports_166x92']; ?>">                 
                            <?php } ?>
                      </figure>
                    </div>
                    <div class="promo-creative-middle">VS</div>
                    <div class="promo-team promo-creative-team">
                      <figure class="promo-team-figure">                                <?php
                                $away_team = get_term( get_field('away_team'), 'teams' );
                               $image = get_field('flag', $away_team);                            
                                  if( $image ) {?>
                                    <img src="<?php  echo $image['sizes']['hlm_sports_166x92']; ?>">                 
                                  <?php } ?>
                      </figure>
                      <div class="promo-team-title">
                        <div class="promo-team-name">
                          <?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
                          <a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
                            <?php echo $away_team->slug;?>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="promo-creative-tickets">
                    <div class="promo-buttons text-nowrap">
                      <a class="button button-primary" href="<?php the_permalink();?>">Check All oDds</a>
                    </div>
                  </div>
                </div>
              </div>
</div>




<?php

}
add_shortcode('matches_archive_list','matches_archive_list');





function matches_taxonomy_with_date($check, $same_day_check){

?>


      <?php 


                $bookmakers_count = 0;
                $args1 = array(
                    'post_type' => 'bookmaker',
                    'posts_per_page' => -1, 
                    'post_status' => 'publish',   
                );
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order')) && is_numeric(get_field('bookmaker_crawl_order'))){ 
                      // -2 cause of array shift for removing the name of the odd
                      $bookmaker_crawl_order[] = get_field('bookmaker_crawl_order') - 2  ;
                    
                  } endwhile; wp_reset_postdata();



$all_odds_array = get_post_meta( get_the_ID(), 'lice_za_kontakt', true );


$name_of_the_odds_table = 'winner';

if (!empty($all_odds_array)) {
foreach ($all_odds_array as $key){
if($key['name_of_the_table'] == $name_of_the_odds_table ){
if(!empty($key['odds_lists']) || $key['odds_lists'] != NULL || $key['odds_lists'] != ""){



if(!empty($key['odds_lists'][0]['odd_list'])){array_shift($key['odds_lists'][0]['odd_list']);}
if(!empty($key['odds_lists'][1]['odd_list'])){array_shift($key['odds_lists'][1]['odd_list']);}
if(!empty($key['odds_lists'][2]['odd_list'])){array_shift($key['odds_lists'][2]['odd_list']);}

// if(!empty($bookmaker_crawl_order)){$bookmaker_crawl_order = array();};
foreach ($bookmaker_crawl_order as $yee) {
  $yee = (int)$yee;
  if (!empty($key['odds_lists'][0]['odd_list'][$yee])){
    $output_odd1[] = $key['odds_lists'][0]['odd_list'][$yee];
  }
  if (!empty($key['odds_lists'][1]['odd_list'][$yee])){
    $output_odd2[] = $key['odds_lists'][1]['odd_list'][$yee];
  }
  if (!empty($key['odds_lists'][2]['odd_list'][$yee])){
    $output_odd3[] = $key['odds_lists'][2]['odd_list'][$yee];
  }
}

if(!empty($output_odd1)){
  $odd_1 =  max(array_values($output_odd1));
}
if(!empty($output_odd2)){
  $odd_2 =  max(array_values($output_odd2));
}
if(!empty($output_odd3)){
  $odd_3 =  max(array_values($output_odd3));
}



}
}
}
}
if (!empty($odd_1) && !empty($odd_2)){


                          $myDateTime = (int)get_field('start_time');
                          $game_date = (string)date("d Y",$myDateTime);
                          $check_game_date = (string)date("d Y",$same_day_check);                        
                          if ( $game_date != $check_game_date ){
                          
             ?>               
                            <tr>
                              <td class="match-date" colspan="6">
                                <?php echo date ('F d, Y',$myDateTime); ?>
                              </td>
                            </tr>

                            <tr class="competition-titles">
                              <td>
                                <?php 
                                $old_sport_crawl = '';
                                $sport_crawl_href = '';
                                $tax_terms = wp_get_post_terms(get_the_ID(), 'sports', array('hide_empty' => '0'));
                                 foreach ( $tax_terms as $tax_term ){ 
                                          $sport_crawl = $tax_term->name;
                                          $parentId = $tax_term->parent;
                                          if(!empty($parentId)){
                                          $parentObj = get_term_by('id', $parentId, 'sports');
                                              $sport_crawl = $tax_term->name;

                                              $main_parentId = $parentObj->parent;
                                              if(!empty($main_parentId)){
                                                  $main_parentObj = get_term_by('id', $main_parentId, 'sports');                                      
                                                  $sport_crawl = $parentObj->name.' '.$tax_term->name;
                                                  $sport_crawl_href = get_term_link($tax_term->term_id);

                                              }

                                          }
                                        }     
                                if ( $old_sport_crawl !== $sport_crawl || empty($old_sport_crawl) || $game_date != $check_game_date) {
                                  echo '<a href="'.$sport_crawl_href.' ">';
                                  echo $sport_crawl;
                                  echo '</a>';
                                  $old_sport_crawl = $sport_crawl;
                                  $check=0;
                                }

                                 ?>
                              </td>
                            </tr>
<?php 



      $same_day_check =  $myDateTime;
                       }








if ($check === 0) {?>


                            <tr class="match-titles">
                              <td>Time</td>
                              <td>Competitors</td>
                              <td>Home</td>
                              <?php if (!empty($odd_3)){?>
                              <td>Draw</td>
                              <?php  } ?>
                              <td>Away</td>
                              <td>Visit Detailed Odds</td>
                            </tr>


<?php   

};


?>






                            <tr class="match">
                              <td>
                                <?php $myDateTime = (int)get_field('start_time'); echo date ('H : i',$myDateTime); ?>
                              </td>
                              <td class="competitors">
                                <p>
                                  <?php  $away_team = get_term( get_field('away_team'), 'teams' );  ?>
                                  <a href="<?php echo esc_url(get_term_link($away_team, 'teams')); ?>">
                                    <?php echo $away_team->slug;?>
                                  </a>
                                </p>
                                <p>
                                  <?php  $home_team = get_term( get_field('home_team'), 'teams' );  ?>
                                  <a href="<?php echo esc_url(get_term_link($home_team, 'teams')); ?>">
                                    <?php echo $home_team->slug;?>
                                  </a>                                    
                                </p>
                              </td>
                              <td class="match-odds">
                                <span><?php echo $odd_1['odd']; ?></span>
                              </td>
                              <td class="match-odds">
                                <span><?php echo $odd_2['odd']; ?></span>
                              </td>
                              <?php if (!empty($odd_3)){?>
                              <td class="match-odds">
                                <span><?php echo $odd_3['odd']; ?></span>
                              </td>
                              <?php } ?>
                              <td>
                               <a href="<?php the_permalink();?>">Check All oDds</a>
                              </td>
                            </tr>




<?php
    }

}

add_shortcode('matches_taxonomy_with_date','matches_taxonomy_with_date');


function matches_similar(){


$home_team = get_term( get_field('home_team', get_the_ID() ), 'teams' );
$away_team = get_term( get_field('away_team', get_the_ID()), 'teams' );

$args = array(
          'posts_per_page' => -1,
          'post_type' => 'match',
          'post_status' => 'publish', 
          'offset' => 1,
          'post__not_in' => array(get_the_ID()),
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

if($matches_query->have_posts()){

        ?>
    <div class="widget-title">
      <h2>
         Upcoming Games
      </h2>
    </div>
<?php } ?>
                        <table class="matches-table">
                          <tbody>


        <?php
        $same_day_check = '414444444444444';
        $check=0;
      
       while($matches_query->have_posts()) : $matches_query->the_post();

                       
            $myDateTime = (int)get_field('start_time');
            matches_taxonomy_with_date($check, $same_day_check); 
            $check++;
            $same_day_check =  $myDateTime;
            ?>


        <?php 
        endwhile;
                 
     
    ?>

                          </tbody>
                        </table>

<?php

}

add_shortcode('matches_similar','matches_similar');