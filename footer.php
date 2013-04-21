<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Kebo
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'kebo_credits' ); ?>
			Powered by <a href="http://kebopowered.com/" title="<?php esc_attr_e( 'Kebo - Empowering Website Owners.', 'kebo' ); ?>" rel="generator"><?php __( 'Kebo', 'kebo' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>