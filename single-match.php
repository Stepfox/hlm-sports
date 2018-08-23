<?php get_header(); ?>
<main id="main">

  <div class="three-parts hlm-sports-widget post-page-area">
<?php  experiment_3(); ?>




        <div class="post-content widget">

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

                      $bookmaker_crawl_order = get_field('bookmaker_crawl_order') - 1;
                      $bookmakers_order[$bookmakers_count]['id'] = get_the_ID();
                      $bookmakers_order[$bookmakers_count]['bookmaker_crawl_order'] = (string)$bookmaker_crawl_order;
                      $bookmakers_count++;
                    
                  } endwhile; wp_reset_postdata();





$test = get_post_meta( get_the_ID(), 'lice_za_kontakt', true );

$name_of_the_odds_table = 'winner';
if(!empty($test)){
    echo '<div class="select"><select id="dropDown">';

          foreach ($test as $key){
            if(!empty($key['odds_lists']) || $key['odds_lists'] != NULL || $key['odds_lists'] != ""){
            echo '<option value="'.$key['name_of_the_table'].'">'.ucfirst(str_replace("-"," ",$key['name_of_the_table'])).'</option>';
          }
          }
     echo '</select></div>';

foreach ($test as $key){
//if($key['name_of_the_table'] == $name_of_the_odds_table ){

      








      if(!empty($key['odds_lists']) || $key['odds_lists'] != NULL || $key['odds_lists'] != ""){
            echo '<table id="'.$key['name_of_the_table'].'" class="all-odds" style="width:100%">';

//echo '<caption>'.$key['name_of_the_table'].'</caption>';

echo '<tr><td>Sign Up Bonus</td>';
       

                $args1 = array(
                    'post_type' => 'bookmaker',
                    'posts_per_page' => -1, 
                    'post_status' => 'publish',   
                );
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order')) && is_numeric(get_field('bookmaker_crawl_order'))){ ?>

     <td>

10$
        </td>
      <?php  } endwhile; wp_reset_postdata();echo '</tr>';


echo '<tr><th>Betting Company</th>';
       
                $bookmakers_query = new WP_Query($args1);
                while($bookmakers_query->have_posts()) : $bookmakers_query->the_post();
                  if(!empty(get_field('bookmaker_crawl_order')) && is_numeric(get_field('bookmaker_crawl_order'))){ ?>

     <th>
          <div class="bookmaker-background-wrap-<?php the_ID(); ?>">
            <a href="<?php echo the_field( 'default_tracker'); ?>" target="_blank">
            <?php $image = get_field('logo_136x44');                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_136x44']; ?>" >                 
            <?php } ?>  

            </a>
          </div>

        </th>
      <?php  } endwhile; wp_reset_postdata();echo '</tr>';



if(is_array($key['odds_lists'])){

          foreach($key['odds_lists'] as $odds_lists){
            if(!empty($odds_lists) || $odds_lists != NULL || $odds_lists != ""){
                  if(!empty($odds_lists['odd_list']) || $odds_lists['odd_list'] != NULL || $odds_lists['odd_list'] != ""){
                    echo '<tr>';
                       $i = 0;
                       $odd_list_number = -1;

                       foreach($odds_lists['odd_list'] as $odd_list){

                        if($i > $bookmakers_count - 1) break;
                        $odd_list_number++;

                          if(in_array_r($odd_list_number , $bookmakers_order) || $odd_list_number == 0){
                      

                          if(!empty($odd_list) || $odd_list != NULL || $odd_list != ""){


                                 
                                    
                             
//var_dump($odds_lists['odd_list'][$i]['odd']);   
                                  if($i != 0){
                                    if(!empty($odds_lists['odd_list'][$bookmakers_order[$i - 1]['bookmaker_crawl_order']]['odd'])){
                                      echo '<td class="filled">';

                                    }else{echo '<td>';}
                                    
                                      echo $odds_lists['odd_list'][$bookmakers_order[$i - 1]['bookmaker_crawl_order']]['odd'];              
                                    }else{
                                      echo '<td>';
                                      echo $odd_list['odd'];
                                    }                   
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
          }
                    echo '</table>';  

    }
}
//}

}else{

  echo '<article class="game-result"><div class="h4">The Bookmakers Havent Released The odds For this Game. Visit Us Later.</div></article>';

}

    // echo "<pre>";
    // print_r($test[0]['name_of_the_table']);
    // print_r($test[0]['odds_lists'][0]['odd_list'][0]['odd']);
    // print_r($test[0]);
    // echo "</pre>";

?>

<div class="col-sm-12 widget">

<?php 

$home_team = get_term( get_field('home_team', get_the_ID() ), 'teams' );
$away_team = get_term( get_field('away_team', get_the_ID()), 'teams' );






experiment_8();

?>
</div>

      </div>

  </div>



  <div class="one-part post-page-area">      
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>
  <div class="four-parts post-page-area hlm-sports-widget odds-latest-news">

    <div class="widget-title">
      <h2>
         Latest News
      </h2>
    </div>

<div class="blog-category">
  <ul>
    <?php 
    

      $exm1_posts = new WP_Query(array( 'posts_per_page' => '4'));

     while ( $exm1_posts->have_posts()) : $exm1_posts->the_post(); ?>
    <li <?php post_class((is_sticky()?'sticky':'')); ?>>    
      <div class="blog-post-image">
        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail('hlm_sports_290x200'); ?>
        </a>
        <?php } ?>
      </div>
      <!--blog-post-image-->

      <div class="category-icon">
        <?php $category = get_the_category(); if($category[0]){echo '<a href="'.esc_url(get_category_link($category[0]->term_id )).'" title="'.esc_attr($category[0]->cat_name).'">'.esc_html($category[0]->cat_name).'</a>';} ?>
      </div>
      <!--featured-category-->

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
    </li>
    <?php endwhile; ?>
  </ul>

</div>
<!--blog-category-->
</div>

</main>
<?php get_footer(); ?>