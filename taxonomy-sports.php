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
        <?php the_post_thumbnail('small-blog'); ?>
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

      <div class="blog-post-date-author">

        <div class="blog-post-author">
          <?php the_author_posts_link(); ?>
        </div>
        <!--blog-post-author-->


        <div class="blog-post-date">
          <?php echo esc_html(get_the_date()); ?>
        </div>
        <!--blog-post-date-->

      </div>
      <!--blog-post-date-author-->

      <div class="blog-post-content">
        <?php echo nl2br(excerpt(25)); ?>
      </div>
      <!--blog-post-content-->
    </li>
    <?php endwhile; ?>
  </ul>

  <?php if($navigation) { ?>
    <div class="pagination pagination-load-more <?php if($auto_load) {echo esc_attr('auto-load');} ?>">
      <?php 
      $loadmoreword = get_option('exm1_word_load_more');
      next_posts_link(esc_html($loadmoreword), $exm1_posts->max_num_pages);
      wp_reset_postdata();  ?>
    </div>
    <!--pagination-->
  <?php } ?>

</div>
<!--blog-category-->
</div>

</main>










<?php get_footer(); ?>