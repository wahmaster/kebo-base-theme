<?php
/**
 * Template Name: Content-Sidebar Page Template
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'page'); ?>

            <?php comments_template('', true); ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>