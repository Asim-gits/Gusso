<?php
/**
 * Template Name: mit einer sidebar rechts (Angebot)
 */

get_header(); ?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper2" class="hfeed">
	<table id="table-one-sidebar-right"><tr><td id="column1">
	<div id="main2">
		<div id="container2">
			<div id="content2">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php 
				global $post;
			
			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content" style="padding:20px">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					
					<script type="text/javascript" charset="utf-8">
						jQuery(document).ready(function() {
							jQuery(".mail-delivery-address").hide();
							jQuery(".mail-schornstein-typ").hide();
							jQuery(".mail-schornstein-angebot").hide();
							jQuery(".mail-montage-etage").hide();
							jQuery(".mail-montage-lift").hide();
							
							
							jQuery("input[name='radio-lieferung']").change(function() {
								t = jQuery(this);
								v = t.val();
								
								if (v != "Lieferung") {
									jQuery(".mail-delivery-address").hide();
								} else {
									jQuery(".mail-delivery-address").show();
								};
							});
							
							jQuery("input[name='radio-schornstein']").change(function() {
								t = jQuery(this);
								v = t.val();
								
								if (v == "Ja") {
									jQuery(".mail-schornstein-typ").show();
									jQuery(".mail-schornstein-angebot").hide();
								} else {
									jQuery(".mail-schornstein-typ").hide();
									jQuery(".mail-schornstein-angebot").show();
								};
							});

							jQuery("input[name='radio-montage']").change(function() {
								t = jQuery(this);
								v = t.val();
								
								if (v == "Ja") {
									jQuery(".mail-montage-etage").show();
									jQuery(".mail-montage-lift").show();
								} else {
									jQuery(".mail-montage-etage").hide();
									jQuery(".mail-montage-lift").hide();
								};
							});
							
							function getParameterByName(name) {
							  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
							  var regexS = "[\\?&]" + name + "=([^&#]*)";
							  var regex = new RegExp(regexS);
							  var results = regex.exec(window.location.search);
							  if(results == null)
							    return "";
							  else
							    return decodeURIComponent(results[1].replace(/\+/g, " "));
							}
							
							jQuery("#ovens").val(getParameterByName("o").split(",").join(" oder \n"));
							
						//	jQuery("input[name='radio-lieferung'][value='Abholung']").prop("checked", true);
						//	jQuery("input[name='radio-schornstein'][value='Ja']").prop("checked", true);
						//	
						//	jQuery("input[name='radio-rauchrohr'][value='Ja']").prop("checked", true);
						//	jQuery("input[name='radio-schornstein-typ'][value='Gemauert']").prop("checked", true);
						//	jQuery("input[name='radio-schornstein-angebot'][value='Ja']").prop("checked", true);
                        //
						//	jQuery("input[name='radio-montage'][value='Ja']").prop("checked", true);
						//	jQuery("input[name='radio-montage-lift'][value='Ja']").prop("checked", true);
							
							
						});
						
					</script>
				</div><!-- #post-## -->
<?php endwhile; ?>
			</div>
		</div>
	</div>
	</td>
	
	<td id="column2">
	<div id="side-widget-area" role="complementary">
		<ul class="xoxo">
			<?php dynamic_sidebar('side-widget-area'); ?>
		</ul>
	</div><!-- #primary .widget-area -->
	</td></tr></table>
</div>

<?php get_footer(); ?>