<?php
/**
 * Template Name: Content only
 */

get_header();

?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper4" class="hfeed">
	<div id="main4">
		<div id="container4">
			<div id="content4">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content content-only">


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div>
		</div>
	</div>
</div>

<div id="oneline-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('oneline-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>