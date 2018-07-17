<?php 



    
      $now_date = current_time('timestamp');
      $args = array(
          'posts_per_page' => 1,
          'post_type' => 'match',
          'post_status' => 'publish', 
          'meta_key'      => 'start_time',
          'orderby'     => 'meta_value',
          'order'       => 'ASC',
          'post__in' => array($categories),
          'meta_query' => array(
              array('key' => 'start_time',
                'value'   => $now_date,
                'compare' => '>'),
                   )
      );

                $matches_query = new WP_Query($args);
                while($matches_query->have_posts()) : $matches_query->the_post();
    
                $all_odds_array = get_post_meta( get_the_ID(), 'lice_za_kontakt', true );


                $bookmakers_count = 0;
                $args1 = array(
                    'post_type' => 'bookmaker',
                    'posts_per_page' => -1, 
                    'post_status' => 'publish',   
                );
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order')) && is_numeric(get_field('bookmaker_crawl_order'))){ 

                      $bookmaker_crawl_order = get_field('bookmaker_crawl_order') - 1;
                      $bookmakers_order[$bookmakers_count]['id'] = get_the_ID();
                      $bookmakers_order[$bookmakers_count]['bookmaker_crawl_order'] = (string)$bookmaker_crawl_order;
                      $bookmakers_count++;
                    
                  } endwhile; wp_reset_postdata();








$name_of_the_odds_table = 'winner';

?>


<?php 


foreach ($all_odds_array as $key){
if($key['name_of_the_table'] == $name_of_the_odds_table ){







      if(!empty($key['odds_lists']) || $key['odds_lists'] != NULL || $key['odds_lists'] != ""){
            echo '<table class="all-odds">';

//echo '<caption>'.$key['name_of_the_table'].'</caption>';


echo '<tr><th>Betting Company</th>';
       
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order')) && is_numeric(get_field('bookmaker_crawl_order'))){ ?>

     <th>
          <div class="bookmaker-background-wrap-<?php the_ID(); ?>">
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
        </th>
      <?php  } endwhile; wp_reset_postdata();echo '</tr>';





          foreach($key['odds_lists'] as $odds_lists){
            if(!empty($odds_lists) || $odds_lists != NULL || $odds_lists != ""){
                  if(!empty($odds_lists['odd_list']) || $odds_lists['odd_list'] != NULL || $odds_lists['odd_list'] != ""){
                    echo '<tr>';
                       $i = 0;
                       $odd_list_number = -1;

                       foreach($odds_lists['odd_list'] as $odd_list){

                        if($i > $bookmakers_count) break;
                        $odd_list_number++;

                          if(in_array_r($odd_list_number , $bookmakers_order) || $odd_list_number == 0){
                      

                          if(!empty($odd_list) || $odd_list != NULL || $odd_list != ""){


                                  if (empty($odd_list['odd'])){echo '<td>';}else{echo '<td class="filled">';}
//var_dump($odds_lists['odd_list'][$i]['odd']);   
                                  if($i != 0){
                            echo $odds_lists['odd_list'][$bookmakers_order[$i - 1]['bookmaker_crawl_order']]['odd'];              }else{echo $odd_list['odd'];}                   
                                  // echo $odd_list['odd'];
                                  // if($i != 0){
                                  //   echo '!!';
                                  // echo $bookmakers_order[$i - 1]['bookmaker_crawl_order'];
                                  // echo '!!';
                                  // }
                                  echo "</td>";
                                  $i++;
                          }
                          }
                        }
                        echo '</tr>';
                    }

              // echo "<pre>";
              // print_r($odds_lists['odd_list'][0]);
              // echo "</pre>";



            }
          }
                    echo '</table>';  

    }
}
}



    // echo "<pre>";
    // print_r($all_odds_array[0]['name_of_the_table']);
    // print_r($all_odds_array[0]['odds_lists'][0]['odd_list'][0]['odd']);
    // print_r($all_odds_array[0]);
    // echo "</pre>";






 endwhile; 







?>

</div>
</div>
