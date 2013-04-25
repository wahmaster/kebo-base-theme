<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Kebo
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">
        
        <?php if (' ' == get_search_query()) : ?>
        
            <?php get_template_part('no-results', 'search'); ?>
        
        <?php elseif (have_posts()) : ?>

            <header class="page-header">
                
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'kebo'), '<span>' . get_search_query() . '</span>'); ?></h1>
                
            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('content', 'search'); ?>

            <?php endwhile; ?>

            <?php kebo_content_nav('nav-below'); ?>

        <?php else : ?>

            <?php get_template_part('no-results', 'search'); ?>

        <?php endif; ?>

    </div><!-- #content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>