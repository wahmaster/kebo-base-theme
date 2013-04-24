<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Kebo
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <html <?php language_attributes(); ?>>
        <head>
            <meta charset="<?php bloginfo('charset'); ?>" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            
            <title><?php wp_title('|', true, 'right'); ?></title>
            
            <link rel="profile" href="http://gmpg.org/xfn/11" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

            <?php wp_head(); ?>
        </head>

        <body <?php body_class(); ?>>
            <div id="page" class="hfeed site">
                <?php do_action('before'); ?>
                <header id="masthead" class="site-header row" role="banner">
                    
                    <div class="hgroup small-12 large-12 columns">
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                    </div>

                    <nav id="site-navigation" class="site-navigation navigation-main small-12 large-12 columns" role="navigation">
                        <h1 class="menu-toggle"><?php _e('Menu', 'kebo'); ?></h1>
                        <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e('Skip to content', 'kebo'); ?>"><?php _e('Skip to content', 'kebo'); ?></a></div>
                        <?php
                            $menu = array(
                                'theme_location' => 'primary',
                                'menu' => '',
                                'container' => 'div',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'menu',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                                'walker' => ''
                            );
                        ?>
                        <?php wp_nav_menu( $menu ); ?>
                    </nav><!-- #site-navigation -->
                    
                </header><!-- #masthead -->

                <div id="main" class="site-main row">
