<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

	if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'primary-widget-area'); ?>
			</ul>
		</div><!-- #primary .widget-area -->
<?php endif; ?>