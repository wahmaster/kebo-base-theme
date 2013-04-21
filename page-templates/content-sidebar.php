<?php
/**
 * Template Name: Content-Sidebar Page Template
 *
 * @since kebo_base 1.0
 */
get_header();
?>

<div id="primary" class="content-area large-9 columns" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content', 'page'); ?>

            <?php comments_template('', true); ?>

        <?php endwhile; // end of the loop. ?>

</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>