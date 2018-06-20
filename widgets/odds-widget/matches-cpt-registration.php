<?php 



add_action('admin_menu', 'add_crawler_options_page');

function add_crawler_options_page() {
    add_submenu_page('edit.php?post_type=match', __('Crawler Options','hlm-sports'), __('Crawler Options','hlm-sports'), 'manage_options', 'crawler_options_page', 'crawler_options_function');
}





function crawler_options_function(){



        echo '<h2>Crawl Matches</h2>';
        
?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches" value="<?php echo esc_attr('Crawl All Matches'); ?>"/>
            </form>
<?php               

if (isset($_POST) && !empty($_POST['crawl_matches'])){




        crawl_matches();

}


        echo '<h2>Crawl Matches Winner Odds</h2>';
?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches_winnerodds" value="<?php echo esc_attr('Crawl Winner Odds'); ?>"/>
            </form>
<?php               

if (isset($_POST) && !empty($_POST['crawl_matches_winnerodds'])){

        crawl_table();


}



        echo '<h2>Crawl Matches oods</h2>';
?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="crawl_matches_odds" value="<?php echo esc_attr('Crawl All Matches odds'); ?>"/>
            </form>
<?php               

if (isset($_POST) && !empty($_POST['crawl_matches_odds'])){


        crawl_full_football_game();

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




















        echo '<h2>Remove All Matches</h2>';

?>
            <form method="post">                    
                <input  type="submit" class="button-secondary" name="remove_all_matches" value="<?php echo esc_attr('Reset Do not play with it'); ?>"/>
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






function taxonomy_league() {
    register_taxonomy('leagues', array('match' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => esc_html__('League', 'hlm-sports'),
            'singular_name' => esc_html__('League', 'hlm-sports'),
            'search_items' => esc_html__('Search League', 'hlm-sports'),
            'all_items' => esc_html__('All Leagues', 'hlm-sports'),
            'parent_item' => esc_html__('League', 'hlm-sports'),
            'parent_item_colon' => esc_html__('League:', 'hlm-sports'),
            'edit_item' => esc_html__('Edit League', 'hlm-sports'),
            'update_item' => esc_html__('Update League', 'hlm-sports'),
            'add_new_item' => esc_html__('Add New League', 'hlm-sports'),
            'new_item_name' => esc_html__('New League Name', 'hlm-sports'),
            'menu_name' => esc_html__('League', 'hlm-sports'),
            ),
        'rewrite' => array(
            'slug' => 'leagues',
            'with_front' => false, 
            'hierarchical' => true 
            ),
        ));
}
add_action( 'init', 'taxonomy_league');


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