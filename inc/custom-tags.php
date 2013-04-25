<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

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