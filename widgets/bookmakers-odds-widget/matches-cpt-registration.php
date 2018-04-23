<?php 




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




//promotion company taxonomy
function taxonomy_sports() {
    register_taxonomy('sports', array('match' ), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => esc_html__('Sport', 'hlm-sports'),
            'singular_name' => esc_html__('Sport', 'hlm-sports'),
            'search_items' => esc_html__('Search Promotion', 'hlm-sports'),
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
add_action( 'init', 'taxonomy_sports');












