<?php
/**
 * Sports Nerds Nonsense functions and definitions
 *
 */

if ( ! function_exists( 'sports_nerds_theme_setup' ) ) :
    function sports_nerds_theme_setup() {

        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary Menu', 'twentytwentythree-child' ),
                'footer'  => esc_html__( 'Footer Menu', 'twentytwentythree-child' ),
            )
        );

    }
endif; 
add_action( 'after_setup_theme', 'sports_nerds_theme_setup' );

// styles
function sports_nerds_enqueue_styles() {

    $parent_style = 'twentytwentythree';

   wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        '0.0.1'
    );

}
add_action( 'wp_enqueue_scripts', 'sports_nerds_enqueue_styles' );

function my_theme_enqueue_scripts() {
    wp_enqueue_script( 'menu-toggle-script', get_template_directory_uri() . '/assets/fonts/dist/js/main.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );
