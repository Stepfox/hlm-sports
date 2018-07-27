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


                        <table>
                          <tbody>



        <?php
        $same_day_check = '414444444444444';

      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

                          $myDateTime = (int)get_field('start_time');
                          $game_date = (string)date("d Y",$myDateTime);
                          $check_game_date = (string)date("d Y",$same_day_check);                        
                          if ( $game_date != $check_game_date ){
                          
             ?>               
                            <tr>
                              <td colspan="6">
                                <?php echo date ('F d, Y H : i',$myDateTime); ?>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">US MLS</td>
                              <td>Home</td>
                              <td>Draw</td>
                              <td>Away</td>
                              <td></td>
                            </tr>

            <?php       $same_day_check =  $myDateTime;
                       }
                       

            experiment_7(); ?>


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