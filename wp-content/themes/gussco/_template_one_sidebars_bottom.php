<?php
/**
 * Template Name: mit einer sidebar unten
 */

get_header(); ?>

		<div id="container" class="one-sidebars-bottom">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php 
				
					global $post;
				
					switch ($post->post_title) {
						default: 
							the_content();
							break;
						}
					?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->
	</div><!-- #main -->

</div><!-- #wrapper -->

<div id="oneline-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('oneline-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
