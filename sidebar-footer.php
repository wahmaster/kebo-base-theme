<?php
/**
 * The Footer widget areas.
 *
 */
/* The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if (!is_active_sidebar('sidebar-3') && !is_active_sidebar('sidebar-4') && !is_active_sidebar('sidebar-5')
)
    return;
// If we get this far, we have widgets. Let do this.
?>
<div class="footer-widgets row">
    <?php if (is_active_sidebar('sidebar-2')) : ?>
        <div id="first" class="widget-area large-4 columns" role="complementary">
        <?php dynamic_sidebar('sidebar-2'); ?>
        </div><!-- #first .widget-area -->
        <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-3')) : ?>
        <div id="second" class="widget-area large-4 columns" role="complementary">
        <?php dynamic_sidebar('sidebar-3'); ?>
        </div><!-- #second .widget-area -->
        <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-4')) : ?>
        <div id="third" class="widget-area large-4 columns" role="complementary">
        <?php dynamic_sidebar('sidebar-4'); ?>
        </div><!-- #third .widget-area -->
        <?php endif; ?>
</div>