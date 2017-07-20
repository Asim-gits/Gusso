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
							jQuery(".mail-montage-label").hide();
							jQuery(".radio-montage").hide();
							
							//jQuery("input[name='radio-rauchrohr']").change(function() {
							jQuery("input[name='text-zip']").change(function() {
								t = jQuery(this);
								v = t.val();
								
								zip = jQuery("input[name='text-zip']");
								plz = zip.val();

								var neu = false;

								if (plz >= 01001 && plz <= 01936) neu=true;
								if (plz >= 01941 && plz <= 01998) neu=true;
								if (plz >= 02601 && plz <= 02999) neu=true;
								if (plz >= 03001 && plz <= 03253) neu=true;
								if (plz >= 04001 && plz <= 04579) neu=true;
								if (plz >= 04581 && plz <= 04639) neu=true;
								if (plz >= 04641 && plz <= 04889) neu=true;
								if (plz >= 04891 && plz <= 04938) neu=true;
								if (plz >= 06001 && plz <= 06548) neu=true;
								if (plz >= 06551 && plz <= 06578) neu=true;
								if (plz >= 06601 && plz <= 06928) neu=true;
								if (plz >= 07301 && plz <= 07919) neu=true;
								if (plz >= 07919 && plz <= 07919) neu=true;
								if (plz >= 07919 && plz <= 07919) neu=true;
								if (plz >= 07919 && plz <= 07919) neu=true;
								if (plz >= 07920 && plz <= 07950) neu=true;
								if (plz >= 07951 && plz <= 07951) neu=true;
								if (plz >= 07952 && plz <= 07952) neu=true;
								if (plz >= 07952 && plz <= 07952) neu=true;
								if (plz >= 07953 && plz <= 07980) neu=true;
								if (plz >= 07982 && plz <= 07982) neu=true;
								if (plz >= 07985 && plz <= 07985) neu=true;
								if (plz >= 07985 && plz <= 07985) neu=true;
								if (plz >= 07985 && plz <= 07989) neu=true;
								if (plz >= 08001 && plz <= 09669) neu=true;

								if (plz >= 10001 && plz <= 14330) neu=true;
								if (plz >= 14401 && plz <= 14715) neu=true;
								if (plz >= 14715 && plz <= 14715) neu=true;
								if (plz >= 14723 && plz <= 16949) neu=true;
								if (plz >= 17001 && plz <= 17256) neu=true;
								if (plz >= 17258 && plz <= 17258) neu=true;
								if (plz >= 17258 && plz <= 17259) neu=true;
								if (plz >= 17261 && plz <= 17291) neu=true;
								if (plz >= 17301 && plz <= 17309) neu=true;
								if (plz >= 17309 && plz <= 17309) neu=true;
								if (plz >= 17309 && plz <= 17321) neu=true ;
								if (plz >= 17321 && plz <= 17321) neu=true;
								if (plz >= 17321 && plz <= 17322) neu=true ;
								if (plz >= 17326 && plz <= 17326) neu=true;
								if (plz >= 17328 && plz <= 17331) neu=true ;
								if (plz >= 17335 && plz <= 17335) neu=true;
								if (plz >= 17335 && plz <= 17335) neu=true ;
								if (plz >= 17337 && plz <= 17337) neu=true;
								if (plz >= 17337 && plz <= 19260) neu=true ;
								if (plz >= 19271 && plz <= 19273) neu=true;
								if (plz >= 19273 && plz <= 19273) neu=true;
								if (plz >= 19273 && plz <= 19306) neu=true;
								if (plz >= 19307 && plz <= 19357) neu=true;
								if (plz >= 19357 && plz <= 19417) neu=true;

								if (plz >= 23921 && plz <= 23999) neu=true;

								if (plz >= 29401 && plz <= 29416) neu=true;

								if (plz >= 36401 && plz <= 36469) neu=true;

								if (plz >= 37301 && plz <= 37359) neu=true;

								if (plz >= 38481 && plz <= 38489) neu=true;

								if (plz >= 38801 && plz <= 39649) neu=true;


								if (plz >= 96501 && plz <= 96529) neu=true;

								if (plz >= 98501 && plz <= 99998) neu=true;
								
								if (!neu) {
									jQuery(".mail-montage-label").hide();
									jQuery(".radio-montage").hide();
								} else {
									jQuery(".mail-montage-label").show();
									jQuery(".radio-montage").show();
								};
							});
							
							
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