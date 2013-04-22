<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Kebo
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'single'); ?>

            <?php kebo_content_nav('nav-below'); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number())
                comments_template();
            ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>