<?php
/**
 * Template Name: Angebots-Template (Breite 970px!!)
 */

get_header(); 

?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper4" class="hfeed no-margin">
	<div id="main4" class="no-margin">
		<div id="container4">
			<div id="content4">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content no-margin">
						<?php 
						the_post();
						global $post;
						the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
