<?php get_header();?>






<main id="main" class="category-page">
  <div class="three-parts post-page-area hlm-sports-widget">
        <div class="post-content widget">

          <div class="post-title">
            <h1>
              <?php  $term = get_queried_object(); echo $term->name;?>
            </h1>
          
          <?php 
        
            $image = get_field('flag', $term);                            
            if( $image ) {?>
            <div class="team-flag">
              <img src="<?php  echo $image['sizes']['hlm_sports_166x92']; ?>" alt="" >  
            </div>               
            <?php }        

            $image = get_field('main_image', $term);                            
            if( $image ) {?>
              <img src="<?php  echo $image['sizes']['hlm_sports_900x260']; ?>" alt="" >                 
            <?php } ?>
            
          </div>

    <div class="widget-title">
      <h2>
         Upcoming Games
      </h2>
    </div>


                        <table class="matches-table">
                          <tbody>



        <?php
        $same_day_check = '414444444444444';
        $check=0;
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

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
                       

            experiment_7($check); 
            $check++;
            ?>


        <?php 
        endwhile;
                 
      endif;
    ?>

                          </tbody>
                        </table>





</div>
  </div>
  <div class="one-part post-page-area">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar')): endif; ?>
  </div>

</main>










<?php get_footer(); ?>