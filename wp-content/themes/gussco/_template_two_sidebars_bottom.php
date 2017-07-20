<?php
/**
 * Template Name: mit zwei sidebars unten
 */

get_header(); ?>

		<div id="container" class="two-sidebars-bottom">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->
	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="twoline-top-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('twoline-top-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<div id="twoline-bottom-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('twoline-bottom-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
