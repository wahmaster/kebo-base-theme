<?php
/**
 * The template for displaying posts in the Chat post format.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
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
        
        <?php the_post_format_chat(); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'kebo') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
    
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        
        <?php kebo_posted_on(); ?>
        <?php edit_post_link(__('Edit', 'kebo'), '<span class="edit-link">', '</span>'); ?>
        
    </footer><!-- .entry-meta -->
    
</article><!-- #post -->