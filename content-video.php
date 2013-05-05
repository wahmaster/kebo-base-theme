<?php
/**
 * The template for displaying posts in the Video post format.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="entry-media">
        <?php the_post_format_video(); ?>
    </div><!-- .entry-media -->

    <header class="entry-header">
        
        <?php if (is_single()) : ?>
        
            <h1 class="entry-title"><?php the_title(); ?></h1>
            
        <?php else : ?>
            
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>
            
        <?php endif; // is_single() ?>
            
    </header><!-- .entry-header -->

    <div class="entry-content">
        
        <?php the_remaining_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'kebo')); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'kebo') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
    
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        
        <?php kebo_posted_on(); ?>

        <?php if (comments_open() && !is_single()) : ?>
        
            <span class="comments-link">
                <?php comments_popup_link('<span class="leave-reply">' . __('Leave a comment', 'kebo') . '</span>', __('One comment so far', 'kebo'), __('View all % comments', 'kebo')); ?>
            </span><!-- .comments-link -->
            
        <?php endif; // comments_open() ?>
            
        <?php edit_post_link(__('Edit', 'kebo'), '<span class="edit-link">', '</span>'); ?>

        <?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
            <?php get_template_part('author-bio'); ?>
        <?php endif; ?>
            
    </footer><!-- .entry-meta -->
    
</article><!-- #post -->