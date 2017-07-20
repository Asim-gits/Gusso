<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper2" class="hfeed">
	<table id='table-one-sidebar-right'><tr><td id='column1'>
	<div id="main2">
		<div id="container2">
			<div id="content2">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
<?php endwhile; ?>
			</div>
		</div>
	</div></td>
	
	<td id="column2"><div id="side-widget-area" role="complementary">
		<ul class="xoxo">
			<?php dynamic_sidebar('side-widget-area'); ?>
		</ul>
	</div><!-- #primary .widget-area -->
	</td></tr></table>
</div>

<?php get_footer(); ?>