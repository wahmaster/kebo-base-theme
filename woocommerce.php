<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package kebo_base
 * @since kebo_base 1.0
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns" role="main">
    
    <div id="content" class="site-content" role="main">

        <?php woocommerce_content(); ?>
        
    </div><!-- #content -->

</div><!-- #primary .content-area .small-12 .large-9 .columns -->

<?php get_sidebar('shop'); ?>
<?php get_footer(); ?>