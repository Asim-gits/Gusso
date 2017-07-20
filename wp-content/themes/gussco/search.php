<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper2" class="hfeed">
	<table id="table-one-sidebar-right" cellspacing="0" cellpadding="0"><tr><td id="column1">
	<div id="main2">
		<div id="container2">
			<div id="content2_search">

<?php if ( have_posts() ) : ?>
				<h1 class="suche" style="margin-bottom:10px; padding-bottom:10px"><span style="color: #983d25;">Suchergebnis</span></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<div class="entry-content">
						<p><?php _e( 'Leider keine Egbebnisse gefunden.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
	</td>
	
	<td id="column2">
	<div id="side-widget-area" role="complementary">
		<ul class="xoxo">
			<?php dynamic_sidebar('side-widget-area'); ?>
		</ul>
	</div><!-- #primary .widget-area -->
	</td></tr></table>

</div><!-- #wrapper2 -->

<?php get_footer(); ?>
