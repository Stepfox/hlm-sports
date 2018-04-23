<?php 

function bookmaker_post_type(){

    $labels = array(
        'name'               => esc_html__('Bookmakers', 'hlm-sports'),
        'singular_name'      => esc_html__('Bookmaker', 'hlm-sports'),
        'menu_name'          => esc_html__('Bookmakers', 'hlm-sports'),
        'name_admin_bar'     => esc_html__('Bookmaker', 'hlm-sports'),
        'add_new'            => esc_html__('Add New', 'hlm-sports'),
        'add_new_item'       => esc_html__('Add New Bookmaker', 'hlm-sports'),
        'new_item'           => esc_html__('New Bookmaker', 'hlm-sports'),
        'edit_item'          => esc_html__('Edit Bookmaker', 'hlm-sports'),
        'view_item'          => esc_html__('View Bookmaker', 'hlm-sports'),
        'all_items'          => esc_html__('All Bookmakers', 'hlm-sports'),
        'search_items'       => esc_html__('Search Bookmakers', 'hlm-sports'),
        'parent_item_colon'  => esc_html__('Parent Bookmakers:', 'hlm-sports'),
        'not_found'          => esc_html__('No Bookmakers found.', 'hlm-sports'),
        'not_found_in_trash' => esc_html__('No Bookmakers found in Trash.', 'hlm-sports'),
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'bookmaker' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
       // 'register_meta_box_cb' => 'metabox_bookmaker',
        'supports'           => array( 'editor', 'title', 'thumbnail', 'comments')
        );

    register_post_type( 'bookmaker', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bookmaker_post_type');


function payment_option_post_type(){

    $labels = array(
        'name'               => esc_html__('Payment Options', 'hlm-sports'),
        'singular_name'      => esc_html__('Payment Option', 'hlm-sports'),
        'menu_name'          => esc_html__('Payment Options', 'hlm-sports'),
        'name_admin_bar'     => esc_html__('Payment Option', 'hlm-sports'),
        'add_new'            => esc_html__('Add New', 'hlm-sports'),
        'add_new_item'       => esc_html__('Add New Payment Option', 'hlm-sports'),
        'new_item'           => esc_html__('New Payment Option', 'hlm-sports'),
        'edit_item'          => esc_html__('Edit Payment Option', 'hlm-sports'),
        'view_item'          => esc_html__('View Payment Option', 'hlm-sports'),
        'all_items'          => esc_html__('All Payment Options', 'hlm-sports'),
        'search_items'       => esc_html__('Search Payment Options', 'hlm-sports'),
        'parent_item_colon'  => esc_html__('Parent Payment Options:', 'hlm-sports'),
        'not_found'          => esc_html__('No Payment Options found.', 'hlm-sports'),
        'not_found_in_trash' => esc_html__('No Payment Options found in Trash.', 'hlm-sports'),
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'payment_option' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        //'register_meta_box_cb' => 'metabox_payment_option',
        'supports'           => array( 'editor', 'title', 'thumbnail', 'comments')
        );

    register_post_type( 'payment_option', $args );

}

// Hook into the 'init' action
add_action( 'init', 'payment_option_post_type');