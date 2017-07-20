<?php
/**
 * Template Name: spezieller inhalt mit zwei sidebars unten
 */

get_header(); ?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper4" class="hfeed">
	<div id="main4">
		<div id="container4">
			<div id="content4">
				<?php 
				
				the_post();
				
				global $post;
				
				switch ($post->post_title) {
					case "Produktübersicht":
						?>
						<div id="finder_header">
							<a id="start_finder" href="<?php echo home_url("ofen-finder"); ?>">Finder starten</a>
						</div>
						
						<div id="special_content">
							<h1 id="heading-produkte">Produktübersicht <img id="logo-morso" alt="Morsø" src="<?php echo home_url("wp-content/themes/gussco/images/morso-logo.jpg"); ?>"><img id="logo-jotul" alt="Jotul" src="<?php echo home_url("wp-content/themes/gussco/images/jotul-logo.jpg"); ?>"><img id="logo-westbo" alt="Jotul" src="<?php echo home_url("wp-content/themes/gussco/images/westbo-logo.jpg"); ?>"><img id="logo-dovre" alt="Jotul" src="<?php echo home_url("wp-content/themes/gussco/images/dovre-logo.png"); ?>"></h1>
						
							<div id="produkt-links">
								<div>
									<a href="<?php echo home_url("moderne-oefen"); ?>"><img alt="Moderne Öfen" src="<?php echo home_url("wp-content/themes/gussco/images/overview-modern.png"); ?>" >
									<span style="font-size:18px; font-family:Georgia;"><span class="_983D25">Moderne</span> <span class="_000000">Öfen</span></span><br><span class="gray">&gt;&gt; Moderne Öfen</span></a>
								</div>
								<div>
									<a href="<?php echo home_url("klassische-oefen"); ?>"><img alt="Klassische Öfen" src="<?php echo home_url("wp-content/themes/gussco/images/overview-classic.png");?>" >
									<span style="font-size:18px; font-family:Georgia;"><span class="_983D25">Klassische</span> <span class="_000000">Öfen</span></span><br><span class="gray">&gt;&gt; Klassische Öfen</span></a>
								</div>
								<div>
									<a href="<?php echo home_url("wandoefen"); ?>"><img alt="Wandöfen" src="<?php echo home_url("wp-content/themes/gussco/images/overview-wall.png");?>" >
									<span style="font-size:18px; font-family:Georgia;"><span class="_983D25">Wand</span><span class="_000000">öfen</span></span><br><span class="gray">&gt;&gt; Wandöen</span></a>
								</div>
								<div>
									<a href="<?php echo home_url("Ausstellungsstuecke"); ?>"><img alt="Ausstellungsstücke" src="<?php echo home_url("wp-content/themes/gussco/images/overview-angebote.png");?>" >
									<span style="font-size:18px; font-family:Georgia;"><span class="_983D25">Ausstellungs</span><span class="_000000">stücke</span></span><br><span class="gray">&gt;&gt; Ausstellungsstücke</span></a>
								</div>
								<div>
									<a href="<?php echo home_url("zubehoer"); ?>"><img alt="Zubehör" src="<?php echo home_url("wp-content/themes/gussco/images/overview-extras.png");?>" >
									<span style="font-size:18px; font-family:Georgia;"><span class="_983D25">Kaminofen</span> <span class="_000000">Zubehör</span></span><br><span class="gray">&gt;&gt; Kaminofen Zubehör</span></a>
								</div>
							</div>
						</div>
						
						<?php 
					break;					
				}
				?>
			</div>
		</div>
	</div>
</div>

<div id="oneline-widget-area" role="complementary">
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
