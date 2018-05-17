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


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_5afd379222df0',
    'title' => 'World Cup: Knockout Stage',
    'fields' => false,
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;





?>