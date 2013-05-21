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
                
                <div class="contain-to-grid sticky">
                    <nav class="top-bar">
                        <h1 class="assistive-text"><?php _e('Menu', 'kebo'); ?></h1>
                        <div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e('Skip to content', 'kebo'); ?>"><?php _e('Skip to content', 'kebo'); ?></a></div>
                        <ul class="title-area">
                            <!-- Title Area -->
                            <li class="name">

                                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php the_title(); ?></a></h1>

                                <h2><?php //bloginfo('description'); ?></h2>
                            </li>
                            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>

                        <section class="top-bar-section">

                            <!-- Right Nav Section -->
                            <?php
                            $menu = array(
                                'theme_location' => 'primary',
                                'menu' => '',
                                'container' => '',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'right',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => false,
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                'depth' => 5,
                                'walker' => new kebo_walker,
                            );
                            ?>
                            <?php wp_nav_menu($menu); ?>

                        </section>
                    </nav>
                </div>
                
                <header id="masthead" class="site-header row" role="banner">
                    
                    <div class="site-branding small-12 large-12 columns">
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                    </div>
                    
                </header><!-- #masthead -->

                <div id="main" class="site-main row">
