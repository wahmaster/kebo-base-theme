<?php
/**
 * The template for displaying posts in the Aside post format.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="entry-content">
        <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'kebo')); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'kebo') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        
        <?php if (is_single()) : ?>
        
            <?php kebo_posted_on(); ?>
            <?php edit_post_link(__('Edit', 'kebo'), '<span class="edit-link">', '</span>'); ?>

            <?php if (get_the_author_meta('description') && is_multi_author()) : ?>
                <?php get_template_part('author-bio'); ?>
            <?php endif; ?>

        <?php else : ?>
        
            <?php kebo_posted_on(); ?>
            <?php edit_post_link(__('Edit', 'kebo'), '<span class="edit-link">', '</span>'); ?>
        
        <?php endif; // is_single() ?>
        
    </footer><!-- .entry-meta -->
    
</article><!-- #post -->