<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kebo
 */
?>

<article id="post-0" class="post no-results not-found">

    <header class="entry-header">
        <h1 class="entry-title"><?php _e('Nothing Found', 'kebo'); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>

            <p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kebo'), esc_url(admin_url('post-new.php'))); ?></p>

        <?php elseif (is_search()) : ?>

            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kebo'); ?></p>
            <div class="hide-for-small"><?php get_search_form(); ?></div>

        <?php else : ?>

            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kebo'); ?></p>
            <div class="hide-for-small"><?php get_search_form(); ?></div>

        <?php endif; ?>
    </div><!-- .entry-content -->
    
</article><!-- #post-0 .post .no-results .not-found -->
