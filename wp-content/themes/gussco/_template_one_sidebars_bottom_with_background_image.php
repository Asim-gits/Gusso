<?php
/**
 * Template Name: mit hintergrund bild
 */

get_header(); ?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper3" class="hfeed">
<?php 
global $post;
if ( have_posts() ) while ( have_posts() ) : the_post();
	$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
 ?>
	<div id="main3" style="background-image:url(<?php if(!empty($src)) echo $src[0]; ?>)" >
		<div id="container3">
			<div id="content3">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div>
		</div>
<?php endwhile; ?>
	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="oneline-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('oneline-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
