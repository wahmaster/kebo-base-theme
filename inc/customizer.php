<?php
/**
 * Kebo Theme Customizer
 *
 * @package Kebo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (function_exists('kebo_customize_register')) :

	function kebo_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
	add_action( 'customize_register', 'kebo_customize_register' );

endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if (function_exists('kebo_customize_preview_js')) :

	function kebo_customize_preview_js() {
		wp_enqueue_script( 'kebo_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130304', true );
	}
	add_action( 'customize_preview_init', 'kebo_customize_preview_js' );

endif;