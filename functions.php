<?php

/**
 * Kebo functions and definitions
 *
 * @package Kebo
 */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'kebo_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function kebo_setup() {

        /*
         * Makes Kebo available for translation.
         *
         * Translations can be added to the /languages/ directory.
         * If you're building a theme based on Kebo, use a find and
         * replace to change 'kebo' to the name of your theme in all
         * template files.
         */
        load_theme_textdomain( 'kebo', get_template_directory() . '/languages' );
        
        /**
         * Example Theme Options Page
         */
        require( get_template_directory() . '/inc/theme-options.php' );
        
        /**
         * WP Live Customizer Feature
         */
        require( get_template_directory() . '/inc/customizer.php' );
        
        /**
         * Custom Kebo Framework files.
         */
        require( get_template_directory() . '/inc/custom-tags.php' );

        /**
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, and column width.
         */
        add_editor_style( 'css/editor-style.css' );

        /**
         * Custom template tags for this theme.
         */
        require( get_template_directory() . '/inc/template-tags.php' );

        /**
         * Custom functions that act independently of the theme templates
         */
        require( get_template_directory() . '/inc/extras.php' );

        /**
         * WP Live Customizer Feature
         */
        require( get_template_directory() . '/inc/customizer.php' );

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support( 'automatic-feed-links' );

        /*
         * This theme supports all available post formats.
         * See http://codex.wordpress.org/Post_Formats
         *
         * Structured post formats are formats where Twenty Thirteen handles the
         * output instead of the default core HTML output.
         */
        // Un-comment for WP 3.6 release
        //add_theme_support('structured-post-formats', array(
        //'link', 'video'
        //));
        
        add_theme_support( 'post-formats', array(
            'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status'
        ));

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'kebo'),
            'footer_credits' => __('Footer Credits', 'kebo'),
        ));

        /**
         * Enable support for Post Thumbnails
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * This theme uses a custom image size for featured images, displayed on
         * "standard" posts and pages.
         */
        set_post_thumbnail_size( 700, 270, true );
    }

endif; // kebo_setup
add_action('after_setup_theme', 'kebo_setup');

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function kebo_register_custom_background() {
    $args = array(
        'default-color' => 'ffffff',
        'default-image' => '',
    );

    $args = apply_filters('kebo_custom_background_args', $args);

    if (function_exists('wp_get_theme')) {
        add_theme_support('custom-background', $args);
    } else {
        define('BACKGROUND_COLOR', $args['default-color']);
        if (!empty($args['default-image']))
            define('BACKGROUND_IMAGE', $args['default-image']);
        add_custom_background();
    }
}

add_action('after_setup_theme', 'kebo_register_custom_background');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function kebo_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Sidebar', 'kebo'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => __('Footer - Left', 'kebo'),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => __('Footer - Center', 'kebo'),
        'id' => 'sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => __('Footer - Right', 'kebo'),
        'id' => 'sidebar-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    
}

add_action('widgets_init', 'kebo_widgets_init');

/**
 * Enqueue scripts and styles
 */
function kebo_scripts() {

    wp_enqueue_style('style', get_stylesheet_uri());
    
    // Queues the Theme css and less.
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/app.css', array(), '4.12', 'all');
    
    wp_enqueue_script('kebo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('kebo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    
    // Queues the Custom Modernizr file from Foundation.
    wp_enqueue_script('kebo-modernizr-js', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', array(), '1.2', false);
    
    // Main Foundation App js, must come last, starts the other plugins.
    wp_enqueue_script('kebo-foundation-js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '4.12', false);

    // Adds Masonry to handle vertical alignment of footer widgets.
    if (is_active_sidebar('sidebar-1'))
        wp_enqueue_script('jquery-masonry');

    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    if (is_singular() && wp_attachment_is_image())
        wp_enqueue_script('kebo-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20120202', true);
    
}

add_action('wp_enqueue_scripts', 'kebo_scripts');

/*
 * Add the Foundation init JS to Footer.
 */
function kebo_insert_foundation_js() {
    
    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(document).foundation(function (response) {
                    console.log(response.errors);
                });
            });
        </script>
        ';
    
}
add_action('wp_footer', 'kebo_insert_foundation_js');

/**
 * Change the Excerpt output.
 */
function kebo_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'kebo_excerpt_more');

/**
 * Sends blank searches to Search Page instead of Home Page.
 */
function kebo_empty_search_fix($query_vars) {
    if (isset($_GET['s']) && empty($_GET['s'])) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}
add_filter('request', 'kebo_empty_search_fix');

/**
 * Change buttons in WYSWIG post editor, edit color palette
 * 
 * Only use this if you want to limit the set color choices in the editor.
 */
/*
function kebo_editor_color_filter($init) {
    $default_colours = '000000,993300,333300,003300,003366,000080,333399,333333,800000,FF6600,808000,008000,008080,0000FF,666699,808080,FF0000,FF9900,99CC00,339966,33CCCC,3366FF,800080,999999,FF00FF,FFCC00,FFFF00,00FF00,00FFFF,00CCFF,993366,C0C0C0,FF99CC,FFCC99,FFFF99,CCFFCC,CCFFFF,99CCFF,CC99FF,FFFFFF';
    $custom_colours = 'FF00FF,FFFF00,000000';
    $init['theme_advanced_text_colors'] = $default_colours . ',' . $custom_colours;
    $init['theme_advanced_more_colors'] = true;
    return $init;
}
add_filter('tiny_mce_before_init', 'kebo_editor_color_filter');
 */

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );
