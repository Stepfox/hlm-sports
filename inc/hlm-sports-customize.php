<?php 

function hlm_sports_customize( $wp_customize ) {






}

add_action( 'customize_register', 'hlm_sports_customize' );







function sf_adjust_customizer_responsive_sizes() {

    $mobile_margin_left = '-240px'; 
    $mobile_width = '480px';
    $mobile_height = '720px';

    $mobile_landscape_width = '720px';
    $mobile_landscape_height = '480px';

    $tablet_width = '768px';
    $tablet_height = '1023px';

    $tablet_landscape_width = '1023px';
    $tablet_landscape_height = '768px';

    ?>
    <style>
        .wp-customizer .preview-mobile .wp-full-overlay-main {
            margin-left: <?php echo esc_html($mobile_margin_left); ?>;
            width: <?php echo esc_html($mobile_width); ?>;
            height: <?php echo esc_html($mobile_height); ?>;
        }

        .wp-customizer .preview-mobile-landscape .wp-full-overlay-main {

            width: <?php echo esc_html($mobile_landscape_width); ?>;
            height: <?php echo esc_html($mobile_landscape_height); ?>;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .wp-customizer .preview-tablet .wp-full-overlay-main {

            width: <?php echo esc_html($tablet_width); ?>;
            height: <?php echo esc_html($tablet_height); ?>;
        }

        .wp-customizer .preview-tablet-landscape .wp-full-overlay-main {

            width: <?php echo esc_html($tablet_landscape_width); ?>;
            height: <?php echo esc_html($tablet_landscape_height); ?>;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .wp-full-overlay-footer .devices .preview-tablet-landscape:before {
            content: "\f167";
        }

        .wp-full-overlay-footer .devices .preview-mobile-landscape:before {
            content: "\f167";
        }
    </style>
    <?php

}

add_action( 'customize_controls_print_styles', 'sf_adjust_customizer_responsive_sizes' );
function sf_filter_customize_previewable_devices( $devices )
{
    $custom_devices[ 'desktop' ] = $devices[ 'desktop' ];
    $custom_devices[ 'tablet' ] = $devices[ 'tablet' ];
    $custom_devices[ 'tablet-landscape' ] = array (
            'label' => esc_html__( 'Enter tablet landscape preview mode', 'hlm-sports' ), 'default' => false,
    );
    $custom_devices[ 'mobile' ] = $devices[ 'mobile' ];
    $custom_devices[ 'mobile-landscape' ] = array (
            'label' => esc_html__( 'Enter mobile landscape preview mode', 'hlm-sports' ), 'default' => false,
    );

    foreach ( $devices as $device => $settings ) {
        if ( ! isset( $custom_devices[ $device ] ) ) {
            $custom_devices[ $device ] = $settings;
        }
    }

    return $custom_devices;
}

add_filter( 'customize_previewable_devices', 'sf_filter_customize_previewable_devices' );

?>