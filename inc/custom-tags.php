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
 * You can use the code below to create a Foundation Top Bar Styled Menu
 */

/*
<div class = "contain-to-grid">
<nav class = "top-bar">
<h1 class = "assistive-text"><?php _e('Menu', 'kebo');
?></h1>
<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e('Skip to content', 'kebo'); ?>"><?php _e('Skip to content', 'kebo'); ?></a></div>
<ul class="title-area">
    <!-- Title Area -->
    <li class="name">
        <h1><a href="<?php echo home_url(); ?>">KEBO</a></h1>
        <h2><?php //bloginfo('description');  ?></h2>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
</ul>

<section class="top-bar-section">

    <!-- Right Nav Section -->
    <?php
    $menu = array(
    'theme_location' => 'primary',
    'menu' => '',
    'container' => '',
    'container_class' => '',
    'container_id' => '',
    'menu_class' => 'right',
    'menu_id' => '',
    'echo' => true,
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
    'depth' => 0,
    'walker' => new Kebo_Walker
    );
    ?>
    <?php wp_nav_menu($menu); ?>

</section>
</nav>
</div>
 */