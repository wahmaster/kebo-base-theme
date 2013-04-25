<?php
/**
 * The template for displaying WooCommerce pages.
 *
 * This wraps the WooCommerce forum code and uses a different
 * sidebar so that users can have a custom WooCommerce sidebar.
 *
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