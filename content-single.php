<?php
/**
 * @package Kebo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php kebo_posted_on(); ?>
        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'kebo'), 'after' => '</div>')); ?>
    </div><!-- .entry-content -->
    
    <?php if (get_the_author_meta('description')) : ?>
        <?php get_template_part('author-bio'); ?>
    <?php endif; ?>

    <footer class="entry-meta">
        <?php
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list(__(', ', 'kebo'));

        /* translators: used between list items, there is a space after the comma */
        $tag_list = get_the_tag_list('', __(', ', 'kebo'));

        if (!kebo_categorized_blog()) {
            // This blog only has 1 category so we just need to worry about tags in the meta text
            if ('' != $tag_list) {
                $meta_text = __('This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'kebo');
            } else {
                $meta_text = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'kebo');
            }
        } else {
            // But this blog has loads of categories so we should probably display them here
            if ('' != $tag_list) {
                $meta_text = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'kebo');
            } else {
                $meta_text = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'kebo');
            }
        } // end check for categories on this blog

        printf(
                $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute('echo=0')
        );
        ?>

        <?php edit_post_link(__('Edit', 'kebo'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-meta -->
    
</article><!-- #post-## -->
