<?php
/**
 * Template Name: home
 */

get_header(); ?>

		<div id="container" class="home">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php 
				
					global $post;
				
					switch ($post->post_title) {
						case "Home" :
							$pakete	= getPostsByType('paket',	TRUE);
							
							if(!empty($pakete)){
								
								$paket	= $pakete[0];
								$extras	= array();
								
								$ofen		= "";
								$extra_text	= "";
								
								echo "<a href='".post_permalink($paket['ID'])."' style='color:#000'>";
								
								if(!empty($paket['ofen_id'])){		$ofen	=  get_the_title($paket['ofen_id']);	}
								if(!empty($paket['extra1_id'])){	array_push($extras, get_the_title($paket['extra1_id']));	}
								if(!empty($paket['extra2_id'])){	array_push($extras, get_the_title($paket['extra2_id']));	}
								if(!empty($paket['extra3_id'])){	array_push($extras, get_the_title($paket['extra3_id']));	}
								
								if(!empty($paket['ofen_id'])) {
									echo "<div id='paket_ofen'>".get_the_post_thumbnail($paket['ofen_id'], array(227,374))."</div>";
								}
								
								if(!empty($extras)){
									$extra_text = "inkl. ".implode(" + ", $extras);
								}

								echo "<div id='paket_text'>
										<div id='paket_heading'><span class='_983D25'>Angebot des Moments!</span></div>
										<div id='paket_preiss'>".$paket['preiss']."</div>
										<div id='paket_ofen_name'><span class='ED8523'>$ofen</span></div>
										<div id='paket_extras'>$extra_text</div>";
								
								if(!empty($paket['extra1_id'])) echo "<div class='div_product_mid_thumb'>".get_the_post_thumbnail($paket['extra1_id'], array(98,160))."</div>";
								if(!empty($paket['extra2_id'])) echo "<div class='div_product_mid_thumb'>".get_the_post_thumbnail($paket['extra2_id'], array(98,160))."</div>";
								if(!empty($paket['extra3_id'])) echo "<div class='div_product_mid_thumb'>".get_the_post_thumbnail($paket['extra3_id'], array(98,160))."</div>";
								
								echo "</div></a>";

								echo "<div id='patrik'>
										<a href=".home_url("kontakt")."><img src='".home_url("wp-content/themes/gussco/images/p_ironman1.jpg")."' alt='Patrik Werner'></a>
									</div>
								";
							}
							
							break;
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
