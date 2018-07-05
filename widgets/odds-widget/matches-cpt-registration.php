<?php 



/*


back i front 

promotion page
contact form design
Bonus list page
flash game custom post type i link do play igata
custom posg types izglea poveke













add_filter( 'cron_schedules', 'example_add_cron_interval' );
 
function example_add_cron_interval( $schedules ) {
    $schedules['halfhour'] = array(
        'interval' => 1800,
        'display'  => esc_html__( 'Every Half Hour' ),
    );

    $schedules['fullhour'] = array(
        'interval' => 3600,
        'display'  => esc_html__( 'Every Hour' ),
    );
 
    return $schedules;
}







function cron_crawl_matches() {

   crawl_matches();

}
add_action( 'cron_crawl_matches', 'cron_crawl_matches' );


function cron_crawl_odds() {
    crawl_table();
   crawl_full_football_game();

}
add_action( 'cron_crawl_odds', 'cron_crawl_odds' );


function cron_remove_past_matches() {
remove_past_matches();
}
add_action( 'cron_remove_past_matches', 'cron_remove_past_matches' );


if ( ! wp_next_scheduled( 'cron_remove_past_matches' ) ) {
    wp_schedule_event( time(), 'fullhour', 'cron_remove_past_matches' );
}

if ( ! wp_next_scheduled( 'cron_crawl_matches' ) ) {
    wp_schedule_event( time(), 'fullhour', 'cron_crawl_matches' );
}

if ( ! wp_next_scheduled( 'cron_crawl_odds' ) ) {
    wp_schedule_event( time(), 'fullhour', 'cron_crawl_odds' );
}




*/



add_action('admin_menu', 'add_crawler_options_page');

function add_crawler_options_page() {
    add_submenu_page('edit.php?post_type=match', __('Crawler Options','hlm-sports'), __('Crawler Options','hlm-sports'), 'manage_options', 'crawler_options_page', 'crawler_options_function');
}





function crawler_options_function(){



        echo '<h2>Crawl Matches</h2>';

?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches" value="<?php echo esc_attr('Crawl All Matches'); ?>"/>
            
              <select name="sport_select">
                    <?php
                       $tax_terms = get_terms('sports', array('hide_empty' => '0'));      
                       foreach ( $tax_terms as $tax_term ){ 
                                $sport_crawl = $tax_term->name;
                                $parentId = $tax_term->parent;
                                if(!empty($parentId)){
                                $parentObj = get_term_by('id', $parentId, 'sports');
                                    $sport_crawl = $parentObj->name.'/'.$tax_term->name;

                                    $main_parentId = $parentObj->parent;
                                    if(!empty($main_parentId)){
                                        $main_parentObj = get_term_by('id', $main_parentId, 'sports');                                      
                                        $sport_crawl = $main_parentObj->name.'/'.$parentObj->name.'/'.$tax_term->name;
                                    }

                                }



                          echo '<option value="'.strtolower($sport_crawl).'">'.$sport_crawl.'</option>';   
                       }
                    ?>
                </select> 
    </form>

<?php               

if (isset($_POST) && !empty($_POST['crawl_matches'])){

    if(isset($_POST['sport_select']) && !empty($_POST['sport_select'])){
        $sport = $_POST['sport_select'];
        crawl_matches($sport);
    }
}

/*
        echo '<h2>Crawl Matches Winner Odds</h2>';
?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches_winnerodds" value="<?php echo esc_attr('Crawl Winner Odds'); ?>"/>
            </form>
<?php               

if (isset($_POST) && !empty($_POST['crawl_matches_winnerodds'])){

        crawl_table();


}
*/


        echo '<h2>Crawl Matches oods</h2>';
?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches_odds" value="<?php echo esc_attr('Crawl All Matches odds'); ?>"/>
            </form>
<?php               

if (isset($_POST) && !empty($_POST['crawl_matches_odds'])){


        crawl_full_football_game();


        //convert_winner_table();

}



/*



        echo '<h2>Crawl Odds</h2>';

?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_odds" value="<?php echo esc_attr('Crawl Odds'); ?>"/>




            </form>
<?php  
if (isset($_POST) && !empty($_POST['crawl_odds']) ){
        
        crawl_table_our_own_api();

}


























        echo '<h2>Odds api</h2>';


?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="checker_checker" value="<?php echo esc_attr('Add Games and odds for the games'); ?>"/>

            <select name="pick_league" id="widget-layout-dropdown">

                <?php $options = array(
                    '' => 'Pick a League',
                    '5b1540d1557b8cb1558b46c6' => 'World Cup',
                    //'54a229f8d443afef088b45b4' => 'Premiere League',
                    //'54a229fad443afef088b45c9' => 'Bundesliga',
                    );

                foreach ($options as $option => $name) {?>
                    <option value='<?php echo esc_attr($option); ?>'>
                        <?php echo esc_html($name); ?>
                    </option>
                <?php } ?>
            </select>

            </form>


<?php  

        if (isset($_POST) && !empty($_POST['checker_checker']) && !empty($_POST['pick_league'])){
        $pick_league = $_POST['pick_league'];
         our_own_api($pick_league);

        }

*/









        echo '<h2>Remove Past Matches</h2>';

?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="remove_all_matches" value="<?php echo esc_attr('remove past matches'); ?>"/>
            </form>
<?php  



if (isset($_POST) && !empty($_POST['remove_all_matches'])){

        remove_all_matches();
        //remove_past_matches();

}






}










function match_post_type(){

    $labels = array(
        'name'               => esc_html__('Matches', 'hlm-sports'),
        'singular_name'      => esc_html__('Match', 'hlm-sports'),
        'menu_name'          => esc_html__('Matches', 'hlm-sports'),
        'name_admin_bar'     => esc_html__('Match', 'hlm-sports'),
        'add_new'            => esc_html__('Add New', 'hlm-sports'),
        'add_new_item'       => esc_html__('Add New Match', 'hlm-sports'),
        'new_item'           => esc_html__('New Match', 'hlm-sports'),
        'edit_item'          => esc_html__('Edit Match', 'hlm-sports'),
        'view_item'          => esc_html__('View Match', 'hlm-sports'),
        'all_items'          => esc_html__('All Matches', 'hlm-sports'),
        'search_items'       => esc_html__('Search Matches', 'hlm-sports'),
        'parent_item_colon'  => esc_html__('Parent Matches:', 'hlm-sports'),
        'not_found'          => esc_html__('No Matches found.', 'hlm-sports'),
        'not_found_in_trash' => esc_html__('No Matches found in Trash.', 'hlm-sports'),
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'match' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        //'register_meta_box_cb' => 'metabox_payment_option',
        'supports'           => array( 'title', 'thumbnail', 'comments')
        );

    register_post_type( 'match', $args );

}

// Hook into the 'init' action
add_action( 'init', 'match_post_type');






function taxonomy_sport() {
    register_taxonomy('sports', array('match' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => esc_html__('Sport', 'hlm-sports'),
            'singular_name' => esc_html__('Sport', 'hlm-sports'),
            'search_items' => esc_html__('Search Sport', 'hlm-sports'),
            'all_items' => esc_html__('All Sports', 'hlm-sports'),
            'parent_item' => esc_html__('Sport', 'hlm-sports'),
            'parent_item_colon' => esc_html__('Sport:', 'hlm-sports'),
            'edit_item' => esc_html__('Edit Sport', 'hlm-sports'),
            'update_item' => esc_html__('Update Sport', 'hlm-sports'),
            'add_new_item' => esc_html__('Add New Sport', 'hlm-sports'),
            'new_item_name' => esc_html__('New Sport Name', 'hlm-sports'),
            'menu_name' => esc_html__('Sport', 'hlm-sports'),
            ),
        'rewrite' => array(
            'slug' => 'sports',
            'with_front' => false, 
            'hierarchical' => true 
            ),
        ));
}
add_action( 'init', 'taxonomy_sport');


function taxonomy_team() {
    register_taxonomy('teams', array('match' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => esc_html__('Team', 'hlm-sports'),
            'singular_name' => esc_html__('Team', 'hlm-sports'),
            'search_items' => esc_html__('Search Team', 'hlm-sports'),
            'all_items' => esc_html__('All Teams', 'hlm-sports'),
            'parent_item' => esc_html__('Team', 'hlm-sports'),
            'parent_item_colon' => esc_html__('Team:', 'hlm-sports'),
            'edit_item' => esc_html__('Edit Team', 'hlm-sports'),
            'update_item' => esc_html__('Update Team', 'hlm-sports'),
            'add_new_item' => esc_html__('Add New Team', 'hlm-sports'),
            'new_item_name' => esc_html__('New Team Name', 'hlm-sports'),
            'menu_name' => esc_html__('Team', 'hlm-sports'),
            ),
        'rewrite' => array(
            'slug' => 'teams',
            'with_front' => false, 
            'hierarchical' => true 
            ),
        ));
}
add_action( 'init', 'taxonomy_team');