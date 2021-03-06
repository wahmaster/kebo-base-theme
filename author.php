<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">

        <?php if ( have_posts() ) : ?>

            <?php
            /* Queue the first post, that way we know
             * what author we're dealing with (if that is the case).
             *
             * We reset this later so we can run the loop
             * properly with a call to rewind_posts().
             */
            the_post();
            ?>

            <header class="archive-header">
                <h1 class="archive-title">
                    <?php printf(__('All posts by %s', 'kebo'), '<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>'); ?>
                </h1>
            </header><!-- .archive-header -->

            <?php
            /* Since we called the_post() above, we need to
             * rewind the loop back to the beginning that way
             * we can run the loop properly, in full.
             */
            rewind_posts();
            ?>

            <?php if ( get_the_author_meta( 'description' ) ) : ?>
            
                <?php get_template_part('template-parts/author-bio'); ?>
            
            <?php endif; ?>

            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
            
                <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to overload this in a child theme then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );
                ?>
            
            <?php endwhile; ?>

            <?php kebo_content_nav( 'nav-below' ); ?>

        <?php else : ?>
            
            <?php get_template_part( 'no-results' ); ?>
            
        <?php endif; ?>

    </div><!-- #content .site-content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>