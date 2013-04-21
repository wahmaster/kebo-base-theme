<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package kebo_base
 * @since kebo_base 1.0
 */
if (!function_exists('kebo_pagination_nav')):

    /**
     * Display pagination to the blog page.
     *
     * @since kebo_base 1.0
     */
    function kebo_pagination_nav($nav_class) {

        global $wp_query;

        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1) {

            $current_page = max(1, get_query_var('paged'));
            $nav_class .= ' pagination pagination-centered';
            ?>
            <div class="<?php echo $nav_class; ?>">  
                <?php
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_next' => True,
                    'prev_text' => '&laquo; Prev',
                    'next_text' => 'Next &raquo;',
                    'type' => 'list', // plain, array, list
                    'add_args' => False,
                    'add_fragment' => ''
                ));

                $pag = array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%',
                    'total' => 5,
                    'current' => max(1, get_query_var('paged')),
                    'show_all' => False,
                    'end_size' => 1,
                    'mid_size' => 3,
                    'prev_next' => True,
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                    'type' => 'plain',
                    'add_args' => False,
                    'add_fragment' => ''
                );

                echo '</div>';
            }
        }

    endif; // kebo_pagination_nav

    if (!function_exists('kebo_comment_pagination')):

        /**
         * Display navigation to next/previous pages when applicable
         *
         * @since kebo_base 1.0
         */
        function kebo_comment_pagination($nav_class) {

            //read the page links but do not echo
            $comment_page = paginate_comments_links('echo=0');

            //if there are page links, echo the navigation div and the page links
            if (!empty($comment_page)) {
                echo "<div class=\"page_nav comments_nav $nav_class\">\n";
                echo paginate_comments_links(array(
                    'base' => add_query_arg('cpage', '%#%'),
                    'format' => '',
                    'echo' => true,
                    'prev_text' => '&laquo; Prev',
                    'next_text' => 'Next &raquo;'
                ));
                echo "\n</div>\n";
            }
        }

    endif; // kebo_comment_pagination

    if (!function_exists('kebo_base_content_nav')) :

        /**
         * Display navigation to next/previous pages when applicable
         *
         * @since kebo_base 1.0
         */
        function kebo_base_content_nav($nav_id) {
            global $wp_query, $post;

            // Don't print empty markup on single pages if there's nowhere to navigate.
            if (is_single()) {
                $previous = ( is_attachment() ) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
                $next = get_adjacent_post(false, '', false);

                if (!$next && !$previous)
                    return;
            }

            // Don't print empty markup in archives if there's only one page.
            if ($wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ))
                return;

            $nav_class = 'site-navigation paging-navigation';
            if (is_single())
                $nav_class = 'site-navigation post-navigation';
            ?>
            <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
                <h1 class="assistive-text"><?php _e('Post navigation', 'kebo_base'); ?></h1>

                <?php if (is_single()) : // navigation links for single posts  ?>

                    <?php previous_post_link('<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x('&laquo;', 'Previous post link', 'kebo_base') . '</span> %title'); ?>
                    <?php next_post_link('<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x('&raquo;', 'Next post link', 'kebo_base') . '</span>'); ?>

                <?php elseif ($wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() )) : // navigation links for home, archive, and search pages  ?>

                    <?php if (get_next_posts_link()) : ?>
                        <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'kebo_base')); ?></div>
                    <?php endif; ?>

                    <?php if (get_previous_posts_link()) : ?>
                        <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'kebo_base')); ?></div>
                    <?php endif; ?>

                <?php endif; ?>

            </nav><!-- #<?php echo $nav_id; ?> -->
            <?php
        }

    endif; // kebo_base_content_nav

    if (!function_exists('kebo_base_comment')) :

        /**
         * Template for comments and pingbacks.
         *
         * Used as a callback by wp_list_comments() for displaying the comments.
         *
         * @since kebo_base 1.0
         */
        function kebo_base_comment($comment, $args, $depth) {
            $GLOBALS['comment'] = $comment;
            switch ($comment->comment_type) :
                case 'pingback' :
                case 'trackback' :
                    ?>
                    <li class="post pingback">
                        <p><?php _e('Pingback:', 'kebo_base'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'kebo_base'), ' '); ?></p>
                        <?php
                        break;
                    default :
                        ?>
                    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                        <article id="comment-<?php comment_ID(); ?>" class="comment">
                            <footer>
                                <div class="comment-author vcard">
                                    <?php echo get_avatar($comment, 40); ?>
                                    <?php printf(__('%s', 'kebo_base'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
                                </div><!-- .comment-author .vcard -->
                                <?php if ($comment->comment_approved == '0') : ?>
                                    <em><?php _e('Your comment is awaiting moderation.', 'kebo_base'); ?></em>
                                    <br />
                                <?php endif; ?>

                                <div class="comment-meta commentmetadata">
                                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><time pubdate datetime="<?php comment_time('c'); ?>">
                                            <?php
                                            /* translators: 1: date, 2: time */
                                            printf(__('%1$s at %2$s', 'kebo_base'), get_comment_date(), get_comment_time());
                                            ?>
                                        </time></a>
                                    <?php edit_comment_link(__('(Edit)', 'kebo_base'), ' ');
                                    ?>
                                </div><!-- .comment-meta .commentmetadata -->
                            </footer>

                            <div class="comment-content"><?php comment_text(); ?></div>

                            <div class="reply">
                                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                            </div><!-- .reply -->
                        </article><!-- #comment-## -->

                        <?php
                        break;
                endswitch;
            }

        endif; // ends check for kebo_base_comment()

        if (!function_exists('kebo_base_posted_on')) :

            /**
             * Prints HTML with meta information for the current post-date/time and author.
             *
             * @since kebo-test 1.0
             */
            function kebo_base_posted_on() {
                printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'kebo_test'), esc_url(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'kebo_test'), get_the_author())), get_the_author()
                );
            }

        endif;
        
        
        if (!function_exists('kebo_base_categorized_blog') && !function_exists('kebo_base_category_transient_flusher')) :
        /**
         * Returns true if a blog has more than 1 category
         *
         * @since kebo-test 1.0
         */
        function kebo_base_categorized_blog() {
            if (false === ( $all_the_cool_cats = get_transient('all_the_cool_cats') )) {
                // Create an array of all the categories that are attached to posts
                $all_the_cool_cats = get_categories(array(
                    'hide_empty' => 1,
                        ));

                // Count the number of categories that are attached to the posts
                $all_the_cool_cats = count($all_the_cool_cats);

                set_transient('all_the_cool_cats', $all_the_cool_cats);
            }

            if ('1' != $all_the_cool_cats) {
                // This blog has more than 1 category so kebo_test_categorized_blog should return true
                return true;
            } else {
                // This blog has only 1 category so kebo_test_categorized_blog should return false
                return false;
            }
        }

        /**
         * Flush out the transients used in kebo_test_categorized_blog
         *
         * @since kebo-test 1.0
         */
        function kebo_base_category_transient_flusher() {
            // Like, beat it. Dig?
            delete_transient('all_the_cool_cats');
        }

        add_action('edit_category', 'kebo_base_category_transient_flusher');
        add_action('save_post', 'kebo_base_category_transient_flusher');
        
        endif;