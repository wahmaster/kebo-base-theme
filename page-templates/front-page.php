<?php
/**
 * Template Name: Home Page Template
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-12 columns" role="main">

    <?php while (have_posts()) : the_post(); ?>

        <?php the_content(); ?>

        <?php get_sidebar('front'); ?>
    
        <?php edit_post_link(__('Edit', 'kebo'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>

    <?php endwhile; // end of the loop. ?>

</div><!-- #primary .content-area .small-12 .large-12 .columns -->

<?php get_footer(); ?>
