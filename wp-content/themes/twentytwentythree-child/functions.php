<?php
/**
 * Sports Nerds Nonsense functions and definitions
 *
 */

if ( ! function_exists( 'sports_nerds_theme_setup' ) ) :
    function sports_nerds_theme_setup() {

        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary Menu', 'sports-nerds-nosense' ),
                'footer'  => esc_html__( 'Footer Menu', 'sports-nerds-nosense' ),
            )
        );

    }
endif; 
add_action( 'after_setup_theme', 'sports_nerds_theme_setup' );

// styles
function sports_nerds_enqueue_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'sports_nerds_enqueue_styles' );
