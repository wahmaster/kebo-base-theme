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
		<div class="site-info small-12 large-12 columns">
			<?php do_action( 'kebo_credits' ); ?>
			Powered by <a href="http://kebopowered.com/" title="<?php esc_attr_e( 'Kebo - Empowering People', 'kebo' ); ?>" rel="generator"><?php echo __( 'Kebo', 'kebo' ); ?></a>
		</div><!-- .site-info .small-12 .large-12 -->
	</footer><!-- #colophon -->
        
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>