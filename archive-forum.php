<?php
/**
 * Template file for displaying the bbPress plugin pages.
 *
 * This wraps the bbPress forum code and uses a different
 * sidebar so that users can have a custom forum sidebar.
 *
 */
get_header();
?>

<div id="primary" class="content-area small-12 large-9 columns">
    
    <div id="content" class="site-content" role="main">
        
        <?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>

        <div id="forum-front" class="bbp-forum-front">
            
		<h1 class="entry-title">
                    <?php bbp_forum_archive_title(); ?>
                </h1>
            
		<div class="entry-content">

			<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>

		</div><!-- .entry-content -->
                
	</div><!-- #forum-front -->

	<?php do_action( 'bbp_after_main_content' ); ?>

    </div><!-- #content -->
    
</div><!-- #primary .small-12 .large-9 .columns -->

<?php get_sidebar('forum'); ?>
<?php get_footer(); ?>