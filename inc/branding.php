<?php
/**
 * Custom Branded Control Panel
 */

if (!function_exists('kebo_login_scripts')):

    /**
     * Enqueue Custom Login Script
     */
    function kebo_login_scripts() {

        // Queues the custom login CSS file.
        wp_enqueue_style('login-style', get_template_directory_uri() . '/css/login.css');
        
    }

    add_action('login_head', 'kebo_login_scripts');
    
endif; // kebo_login_scripts

if (!function_exists('kebo_admin_scripts')):

    /**
     * Enqueue Custom Admin Script
     */
    function kebo_admin_scripts() {

        if (is_admin()) {
            
            // Queues the custom admin CSS file.
            wp_enqueue_style('style-admin', get_template_directory_uri() . '/css/admin.css');
            
        }
    }

    add_action('admin_enqueue_scripts', 'kebo_admin_scripts');
    
endif; // kebo_admin_scripts

if (!function_exists('kebo_login_logo_url')):

    /**
     * Edit the Login Logo Link URL
     */
    function kebo_login_logo_url($url) {

        return 'http://kebopowered.com';
    }

    add_filter('login_headerurl', 'kebo_login_logo_url');
    
endif; // kebo_login_logo_url