<?php
/**
 * kebo-test Theme Customizer
 *
 * @package kebo-test
 * @since kebo-test 1.2
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since kebo-test 1.2
 */
function kebo_test_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'kebo_test_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since kebo-test 1.2
 */
function kebo_test_customize_preview_js() {
	wp_enqueue_script( 'kebo_test_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'kebo_test_customize_preview_js' );

/**
 * Adds custom colours for Title and Tagline.
 * You can change them using the 'Customise' option for the theme.
 */
if (!function_exists('kebo_customise_register')) :

    function kebo_customise_register($wp_customize) {
        $colors = array();
        $colors[] = array('slug' => 'header_title_color', 'default' => '#333333', 'label' => __('Header Title Color', 'kebo_base'));
        $colors[] = array('slug' => 'header_tagline_color', 'default' => '#777777', 'label' => __('Header Tagline Color', 'kebo_base'));

        foreach ($colors as $color) {
            // SETTINGS
            $wp_customize->add_setting($color['slug'], array('default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options'));

            // CONTROLS
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color['slug'], array('label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'])));
        }
    }

    add_filter('customize_register', 'kebo_customise_register');

endif;