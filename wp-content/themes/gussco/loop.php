<?php while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title" ><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span style="color: #EC7F2B;">>></span> <span style="color: #983d25;"><?php the_title(); ?></span></a></h2>

		</div><!-- #post-## -->

<?php endwhile; // End the loop. Whew. ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation" style="padding-top:20px">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">weitere</span>', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">vorherige</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
