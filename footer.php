<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Kebo
 */
?>

	</div><!-- #main .row -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
            
            <div class="footer-content small-12 large-12 columns">
                
                <?php if (!is_404()) { get_sidebar('footer'); } ?>
                
                <?php $args = array(
                    'theme_location' => 'footer_credits',
                    'menu_class' => 'inline-list centered',
                    'echo' => true,
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 0,
                ); ?>
                <?php wp_nav_menu($args); ?>
                
            </div>
            
            <div class="site-info small-12 large-12 columns">
                
                Copyright &copy; <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                <span class="divider"> | </span>
                Powered by <a title="<?php esc_attr_e( 'Kebo - WordPress Experts', 'kebo' ); ?>" href="http://kebopowered.com/?utm_source=site_footer&utm_content=<?php echo wp_get_theme()->template; ?>" rel="generator" target="_blank">Kebo</a>
                <?php do_action( 'kebo_credits' ); ?>
		
            </div><!-- .site-info .small-12 .large-12 -->
            
	</footer><!-- #colophon .row -->
        
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>