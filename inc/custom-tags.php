<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('kebo_pagination_nav')) :

    /**
     * Display pagination to the blog page.
     */
    function kebo_pagination_nav($nav_class) {

        global $wp_query;

        $total_pages = $wp_query->max_num_pages;

        if ($total_pages > 1) {

            $current_page = max(1, get_query_var('paged'));
            $nav_class .= 'pagination-centered';
            ?>

            <div class="<?php echo $nav_class; ?>">  

                <?php
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_next' => true,
                    'prev_text' => '&laquo; Prev',
                    'next_text' => 'Next &raquo;',
                    'type' => 'list', // plain, array, list
                    'add_args' => false,
                    'add_fragment' => ''
                ));
                ?>

            </div>

            <?php
        }
    }

endif; // kebo_pagination_nav

if (!function_exists('kebo_comment_pagination')):

    /**
     * Displays pagination on comments
     */
    function kebo_comment_pagination($nav_class = '') {

        //read the page links but do not echo
        $comment_page = paginate_comments_links('echo=0');
        
        //if there are page links, echo the navigation div and the page links
        if (!empty($comment_page)) {
            echo "<div class=\"pagination pagination-centered $nav_class\">\n";
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

// Custom Menu Walker for Foundation v4 Top Bar Compatibility
class Kebo_Walker extends Walker_Nav_Menu {

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->has_children = !empty($children_elements[$element->ID]);
        $element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
        $element->classes[] = ($element->has_children) ? 'has-dropdown' : '';
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el(&$output, $item, $depth, $args) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);
        $output .= ($depth == 0) ? '<li class="divider"></li>' : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if (in_array('section', $classes)) {
            $output .= '<li class="divider"></li>';
            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html);
        }
        $output .= $item_html;
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"dropdown\">\n";
    }

}

/*
 * You can use the code below to create a 'Normal' yet responsive, menu. Make sure navigation.js is included if so, as that powers the onclick event for opening/closing the menu.
 */

/*
  <nav id = "site-navigation" class = "site-navigation navigation-main small-12 large-12 columns" role = "navigation">
  <h1 class = "menu-toggle"><?php _e('Menu', 'kebo');
  ?></h1>
  <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e('Skip to content', 'kebo'); ?>"><?php _e('Skip to content', 'kebo'); ?></a></div>
  <?php
  $menu = array(
  'theme_location' => 'primary',
  'menu' => '',
  'container' => 'div',
  'container_class' => '',
  'container_id' => '',
  'menu_class' => 'menu',
  'menu_id' => '',
  'echo' => true,
  'fallback_cb' => 'wp_page_menu',
  'before' => '',
  'after' => '',
  'link_before' => '',
  'link_after' => '',
  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  'depth' => 0,
  'walker' => ''
  );
  ?>
  <?php //wp_nav_menu( $menu ); ?>
  </nav><!-- #site-navigation -->
 */

if (!function_exists('kebo_time_ago')) :

    /**
     * Outputs timeago based on supplied date/time. e.g. 3 minutes ago, 9 days ago.
     */
    function kebo_time_ago($date) {

        // Array of time period chunks
        $chunks = array(
            array(60 * 60 * 24 * 365, __('year', 'kebo'), __('years', 'kebo')),
            array(60 * 60 * 24 * 30, __('month', 'kebo'), __('months', 'kebo')),
            array(60 * 60 * 24 * 7, __('week', 'kebo'), __('weeks', 'kebo')),
            array(60 * 60 * 24, __('day', 'kebo'), __('days', 'kebo')),
            array(60 * 60, __('hour', 'kebo'), __('hours', 'kebo')),
            array(60, __('minute', 'kebo'), __('minutes', 'kebo')),
            array(1, __('second', 'kebo'), __('seconds', 'kebo'))
        );

        if (!is_numeric($date)) {
            $time_chunks = explode(':', str_replace(' ', ':', $date));
            $date_chunks = explode('-', str_replace(' ', '-', $date));
            $date = gmmktime((int) $time_chunks[1], (int) $time_chunks[2], (int) $time_chunks[3], (int) $date_chunks[1], (int) $date_chunks[2], (int) $date_chunks[0]);
        }

        $current_time = current_time('mysql', $gmt = 0);
        $newer_date = strtotime($current_time);

        // Difference in seconds
        $since = $newer_date - $date;

        // Something went wrong with date calculation and we ended up with a negative date.
        if (0 > $since)
            return __('sometime', 'kebo');

        /**
         * We only want to output one chunks of time here, eg:
         * x years
         * xx months
         * so there's only one bit of calculation below:
         */
        //Step one: the first chunk
        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];

            // Finding the biggest chunk (if the chunk fits, break)
            if (( $count = floor($since / $seconds) ) != 0)
                break;
        }

        // Set output var
        $output = ( 1 == $count ) ? '1 ' . $chunks[$i][1] : $count . ' ' . $chunks[$i][2];


        if (!(int) trim($output)) {
            $output = '0 ' . __('seconds', 'kebo');
        }

        $output .= __(' ago', 'kebo');

        return $output;
    }



endif;