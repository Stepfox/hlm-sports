<?php 

//Knockout stage options

if( function_exists('acf_add_options_page') ) {
        
        acf_add_options_page(array(
            'page_title'    => 'World Cup Knockout',
            'menu_title'    => 'World Cup Knockout',
            'menu_slug'     => 'hlm_sports_world_cup_knockout',
            'capability'    => 'edit_posts',
            'redirect'  => false,
            'icon_url' => 'dashicons-images-alt2',
            'position' => 6
        ));
        
    
    }







?>