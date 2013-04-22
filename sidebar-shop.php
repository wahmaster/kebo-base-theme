<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package kebo_base
 * @since kebo_base 1.0
 */
?>
<div id="secondary" class="widget-area small-12 large-3 columns" role="complementary">
    <?php do_action('before_sidebar'); ?>
    <?php if (!dynamic_sidebar('sidebar-2')) : ?>

    <?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area .small-12 .large-3 .columns -->
