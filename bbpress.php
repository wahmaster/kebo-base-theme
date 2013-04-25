<?php
/**
 * Template file for displaying the bbPress plugin pages.
 *
 * This wraps the bbPress forum code and uses a different
 * sidebar so that users can have a custom forum sidebar.
 *
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'page'); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number())
                comments_template();
            ?>

        <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar('forum'); ?>
<?php get_footer(); ?>
