<?php
/**
 * Template Name: spezieller inhalt mit einer sidebar unten
 */

get_header();

?>

	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper4" class="hfeed">
	<div id="main4">
		<div id="container4">
			<div id="content4">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
				<?php 
				
				function sort_ovens($a, $b){
		    		return $a->post_title > $b->post_title;
		
				    if(isset($a->custom['serie_name']) && isset($a->custom['serie_name'])){
				    	
				    	if($a->custom['serie_name'] == $b->custom['serie_name'] &&isset($a->custom['serie_name']) && isset($a->custom['serie_name'])){
				    		return $a->post_title > $b->post_title;
				    	}
				    	
				    	return $a->custom['serie_name'] > $b->custom['serie_name'];
				    }
				    
				    return 0;
				}
				
				function sort_extras($a, $b){
				    if(isset($a->custom['extra_type']) && isset($a->custom['extra_type'])){
				    	if($a->custom['extra_type'] == $b->custom['extra_type']){
				    		return $a->post_title > $b->post_title;
				    	}
				    	
				    	return $a->custom['extra_type'] > $b->custom['extra_type'];
				    }
				    
				    return 0;
				}
								
				the_post();
				
				global $post;
				
				if($post->post_title == "Finder") { ?><div id="finder_header_open">
						<a id="start_finder" href="<?php echo home_url("ofen-finder"); ?>">Finder zurücksetzen</a>
						<a id="add_all_to_list" href="#" style="display:none">Alle angezeigten merken</a>
						<div id="finder_selects">
							<div>
								<h2>1. Hersteller</h2>
								<form>
								<input type="radio" name="hersteller" value="" /> egal<br />
								<input type="radio" name="hersteller" value="Jotul" /> Jotul &nbsp;&nbsp;<input type="radio" name="hersteller" value="Morsø" /> Morsø <br />
								<input type="radio" name="hersteller" value="Dovre" /> Dovre <input type="radio" name="hersteller" value="Westbo" /> Westbo<br />
								</form>
							</div>
							<div>
								<h2>2. Aussehen</h2>
								<form>
								<input type="radio" name="design" value="" /> egal<br />
								<input type="radio" name="design" value="design" /> Modern<br />
								<input type="radio" name="design" value="klassisch" /> Klassisch
								</form>
							</div>
							<div>
								<h2>3. Heizvermögen</h2>
								<form>
								<input type="radio" name="raum_qm" value="" /> egal<br />
								<input type="radio" name="raum_qm" value="45" /> 45-90 m²<br />
								<input type="radio" name="raum_qm" value="90" /> > 90 m²
								</form>
							</div>
							<div>
								<h2>4. Modell</h2>
								<form>
								<input type="radio" name="aufstellart" value="" /> egal<br />
								<input type="radio" name="aufstellart" value="Standofen" /> bodenstehend<br />
								<input type="radio" name="aufstellart" value="Füße" /> auf Fuss/Füssen<br />
								<input type="radio" name="aufstellart" value="Wandofen" /> wandhängend
								</form>
							</div>
							<div>
								<h2>5. Besonderheiten</h2>
								<form>
								<input type="radio" name="others" value="" /> egal<br />
								<input type="radio" name="others" value="Speckstein" /> Speckstein<br />
								<input type="radio" name="others" value="seitliches Glasfenster" /> seitliches Glasfenster<br />
								<input type="radio" name="others" value="ecolabel" /> Ecolabel
								<input type="radio" name="others" value="ecolabel" /> DIBt-Label
								</form>
							</div>
							
						</div>
					</div><div id="finder_header_open_shadow">&nbsp;
					</div>
				<?php } else if($post->post_title == "Meine Öfen") { ?>
					<div id="finder_header">
						<a id="angebots-link" href='<?php echo site_url("angebot-einholen?o="); ?>'><img src="<?php echo home_url('wp-content/themes/gussco/images/right_arrow.png'); ?>"> Angebot für diese Öfen einholen</a>
					</div>
				<?php } else { ?><div id="finder_header">
						<a id="start_finder" href="<?php echo home_url("ofen-finder"); ?>">Finder starten</a>
					</div>
				<?php }
				
				switch ($post->post_title) {
					case "Finder":
						?>
						<div id="special_content">
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'post_type'		=> 'ofen',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case "Klassische Öfen":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Klassische</span> <span class="_000000">Öfen</span></h1>
						
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'meta_key'		=> 'design',
								'meta_value'	=> 'klassisch',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case "Moderne Öfen":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Moderne</span> <span class="_000000">Öfen</span></h1>
						
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'meta_key'		=> 'design',
								'meta_value'	=> 'design',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case "Morso Öfen":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Morso</span> <span class="_000000">Öfen</span></h1>
						
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'meta_key'		=> 'hersteller',
								'meta_value'	=> 'Morsø',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case "Jotul Öfen":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Jotul</span> <span class="_000000">Öfen</span></h1>
						
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'meta_key'		=> 'hersteller',
								'meta_value'	=> 'Jotul',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));							
					break;
					case "Wandöfen":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Wand</span><span class="_000000">öfen</span></h1>
						
						<?php 
							$ovens = get_posts(array(
								'post_type' 	=> 'ofen',
								'meta_key'		=> 'aufstellart',
								'meta_value'	=> 'wandofen',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case "Zubehör":
						?>
						<div id="special_content">
							<h1><span class="_983D25">Kaminofen</span><span class="_000000">-Zubehör</span></h1>
						
						<?php 
							$extras = get_posts(array(
								'post_type' 	=> 'extra',
								'numberposts'	=> -1,
								'post_status' 	=> 'publish',
								'exclude' 		=> $post->ID
							));
					break;
					case 'Meine Öfen':

					echo "<div id='deals'>";
					the_content();
					echo "</div>";
					
						
						$cookie_ovens 	= !empty($_COOKIE["comparelist"]) ? split(",", $_COOKIE["comparelist"]) : array();

						$ovens = get_posts(array(
							'post_type' 	=> 'ofen',
							'numberposts'	=> -1,
							'post_status' 	=> 'publish',
							'exclude' 		=> $post->ID
						));
								
						usort($ovens, "sort_ovens");
							
						
						?>
					<div id="no_ovens_in_my_ovens" style="<?php if(!empty($cookie_ovens)) echo "display:none"; ?>">
						Sie haben noch keine Öfen zum vergleichen ausgewählt.<br>Starten sie den <a href="<?php echo home_url("ofen-finder") ?>">Ofen-Finder</a> und markieren sie dort die gewünschten Öfen. 
					</div>
					
					<?php
						if(empty($cookie_ovens))
							break;
					?>
					
					<div id="oven_thumb">
						<?php
						
						$j = 0;
						
						if(!empty($ovens)){
						//	foreach ($ovens as $oven_ref){
							for ($i = 0; $i < count($ovens); $i++){
								
								$custom = get_post_custom($ovens[$i]->ID);
									
								foreach($custom as $key => $value)
									if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
										
								$ovens[$i]->custom = $custom;
								
								if ( !in_array($ovens[$i]->ID, $cookie_ovens) )
									continue ;
								
								$oven = $ovens[$i];
								
								echo "<div style='".($j != 0 ? "display:none" : "")."' class='tr_$oven->ID'>" . get_the_post_thumbnail($oven->ID, array(300,300));
								echo "<span class='oven_thumb_name'>".
									preg_replace("/^([^ ]+)/", "<span style='color:#000'>$1</span>", $oven->post_title).
									"</span></div>";
								
								$j++;
							}
						}
						
						?>
					</div>		
					
					<div id="meine_tabelle_container">
						
						<table border="0" cellspacing="5" cellpadding="5" id="meine_tabelle">
							<tr>
								<th class="first_header"></th>
								<th class="labeled_header">  </th>
								<th class="labeled_header">  </th>
								<th class="labeled_header">Leistung   </th>
								<th class="labeled_header">Raumgröße  </th>
								<th class="labeled_header">H/B/T      </th>
								<th class="labeled_header">Gewicht    </th>
								<th class="labeled_header">Heizart    </th>
								<th class="labeled_header">Holzlaenge </th>
								<th class="labeled_header">Rauchabgang</th>
								<th class="labeled_header">Preis</th>
							</tr>
							<?php
								if(!empty($ovens)){
								//	foreach ($ovens as $oven_ref){
									for ($i = 0; $i < count($ovens); $i++){
										if ( !in_array($ovens[$i]->ID, $cookie_ovens) )
											continue ;
								
										$oven = $ovens[$i];
								
										?>
											<tr class="tr_<?php echo $oven->ID ?> hoverable">
												<td class="myovens_table_title">
													<a class="myovens_table_rempve_link" href="#">x</a>	
													
													<a href="<?php echo post_permalink($oven->ID); ?>">
														<span style="font-family:Georgia; font-size:16px; color:#000;">
															<?php echo preg_replace("/\ (.+)?/", "<span style='color:#983D25'>$0</span>", $oven->post_title); ?>
														</span>
													</a>
												</td>
												<td class="myovens_table_ecolabel">		<?php echo "<img width='20' src=".home_url('wp-content/themes/gussco/images/eco-label.jpg')." alt='Eco-Label'><br/>" ?></td>
												<td class="myovens_table_dibtlabel">	<?php echo "<img width='20' src=".home_url('wp-content/themes/gussco/images/product_spot_dibt.jpg')." alt='DIBt-Label'>" ?></td>
												<td class="myovens_table_leistung">		<?php echo postmeta_without_label("leistung",		$oven->custom, "kW");	?></td>
												<td class="myovens_table_raum">			<?php echo postmeta_without_label("raum_qm",		$oven->custom, "m²");	?></td>
												<td class="myovens_table_hbt">			<?php echo join(" / ", split("/", postmeta_without_label("hbt",			$oven->custom, "cm") ) ); 	?></td>
												<td class="myovens_table_gewicht">		<?php echo postmeta_without_label("gewicht",		$oven->custom, "kg");	?></td>
											
												<td class="myovens_table_heizart">		<?php echo postmeta_without_label("heizart",		$oven->custom, ""); 	?></td>
												<td class="myovens_table_holzlaenge">	<?php echo postmeta_without_label("holzlaenge",		$oven->custom, "cm"); 	?></td>

												<td class="myovens_table_rauchabgang">	<?php echo postmeta_without_label("rauchabgang",	$oven->custom, ""); 	?></td>

												<td class="myovens_table_preis">	<?php echo postmeta_without_label("preiss",	$oven->custom, ""); 	?></td>

											</tr>

										<?php
									}
								}
						
							?>
						</table>
					</div>
					<?php
						break;
				}
				
				switch ($post->post_title) {
					case "Finder":
						echo "<div id='nothing_found' style='display:none'>Keine Öfen gefunden, die den gewählten Kriterien entsprechen.</div>";
					case "Klassische Öfen":
					case "Moderne Öfen":
					case "Morso Öfen":
					case "Jotul Öfen":
					case "Wandöfen":
							if(!empty($ovens)){
							//	foreach ($ovens as $oven_ref){
								for ($i = 0; $i < count($ovens); $i++){
									$custom = get_post_custom($ovens[$i]->ID);
									
									foreach($custom as $key => $value)
										if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
										
									$ovens[$i]->custom = $custom;
								}
								
								usort($ovens, "sort_ovens");
								
								$last_series_name = "";
							
?><script>var ovens = <?php echo json_encode($ovens); ?>;

function reset_finder(){
	jQuery('#funder_selects input:checked').each(function(){
		jQuery(this).attr('checked', false);
		
		jQuery("#add_all_to_list").hide();
	});
}

jQuery(document).ready(function() {
	reset_finder();
	
	jQuery('#finder_selects').change(function() {
		jQuery('#special_content').fadeOut(50, function () {
		
			jQuery('#nothing_found').show();
			jQuery("#add_all_to_list").hide();
		
		
			var hersteller	= jQuery('input:radio[name=hersteller]:checked').val();
			var design		= jQuery('input:radio[name=design]:checked').val();
			var raum_qm		= jQuery('input:radio[name=raum_qm]:checked').val();
			var aufstellart	= jQuery('input:radio[name=aufstellart]:checked').val();
			var others		= jQuery('input:radio[name=others]:checked').val();
	
			for(var i = 0; i < ovens.length; i++){
				var oven = ovens[i];
				var isHidden = false;
				
				jQuery('#oven_'+oven.ID).show();
				
				if(hersteller){
					if('hersteller' in oven.custom && oven.custom.hersteller.search(hersteller) == -1)	{	
						jQuery('#oven_'+oven.ID).hide();
						isHidden = true;
					}
				}
				
				if(design){			
					if('design' in oven.custom && oven.custom.design != design){
						jQuery('#oven_'+oven.ID).hide();
						isHidden = true;	
					}
				}
	
				if(raum_qm){		
					if('raum_qm' in oven.custom){
						var raum_qms = oven.custom.raum_qm.split('-');
	
						if(raum_qms.length == 2){ 
							if(raum_qms[0] > raum_qm && raum_qms[1] < raum_qm){
								jQuery('#oven_'+oven.ID).hide();
								isHidden = true;
							}
						}
						if(raum_qms.length == 1){ 
							if(raum_qms[0] < raum_qm){ 
								jQuery('#oven_'+oven.ID).hide();
								isHidden = true;
							}
						}
					} else {
						jQuery('#oven_'+oven.ID).hide();
						isHidden = true;
					}
				}
	
				if(aufstellart){
					if('aufstellart' in oven.custom && oven.custom.aufstellart != aufstellart)	{
						jQuery('#oven_'+oven.ID).hide();	
						isHidden = true;
					}
				}
				
				if(others){			
					if(others == 'ecolabel' && ( !('ecolabel' in oven.custom) || oven.custom.ecolabel == "nein"))	{	
						jQuery('#oven_'+oven.ID).hide();
						isHidden = true;	
					}		
					if(others == 'dibtlabel' && ( !('dibtlabel' in oven.custom )|| oven.custom.dibtlabel == "nein"))	{	
						jQuery('#oven_'+oven.ID).hide();
						isHidden = true;	
					}
					
					if(others == 'Speckstein')	{
						var hasSpeckstein = false;
						
						if(oven.custom.hasOwnProperty("eigenschaften")			&& oven.custom.eigenschaften.search("Speckstein") != -1)		hasSpeckstein = true;
						if(oven.custom.hasOwnProperty("extra_eigenschaften")	&& oven.custom.extra_eigenschaften.search("Speckstein") != -1)	hasSpeckstein = true;

						if(!hasSpeckstein) {
							jQuery('#oven_'+oven.ID).hide();	
							isHidden = true;
						}
					}
					
					if(others == 'seitliches Glasfenster')	{
						var hasFenster = false;
						
						if(oven.custom.hasOwnProperty("eigenschaften")			&& oven.custom.eigenschaften.search("seitliches Glasfenster") != -1)		hasFenster = true;
						if(oven.custom.hasOwnProperty("extra_eigenschaften")	&& oven.custom.extra_eigenschaften.search("seitliches Glasfenster") != -1)	hasFenster = true;

						if(!hasFenster) {
							jQuery('#oven_'+oven.ID).hide();
							isHidden = true;
						}	
					}
				}
				
				if(!isHidden) {
					jQuery('#nothing_found').hide();
				} else {
					jQuery("#add_all_to_list").show();
				}
			}
		}).fadeIn(100);
	});
});
	
</script><?php 
								
								foreach ($ovens as $oven){
								?><div class='div_product_thumb_overview' id="<?php echo "oven_$oven->ID" ?>">
									<a href="<?php echo post_permalink($oven->ID); ?>">
										<?php echo get_the_post_thumbnail($oven->ID, array(52,85)); ?>
										<div class="div_product_thumb_overview_specs">
											<span class="header_<?php echo $oven->ID ?>" style="font-family:Georgia; font-size:16px; color:#000;"><?php echo preg_replace("/\ (.+)?/", "<span style='color:#983D25'>$0</span>", $oven->post_title); ?></span>
											
											<?php												
											if(isset($oven->custom['ecolabel']) && $oven->custom['ecolabel'] == "ja"){
												echo "<img width='20' class='ecolabel-finder' src=".home_url('wp-content/themes/gussco/images/eco-label.jpg')." alt='Eco-Label'><br/>";
											} 
											if(isset($oven->custom['dibtlabel']) && $oven->custom['dibtlabel'] == "ja"){
												echo "<img width='20' class='ecolabel-finder' src=".home_url('wp-content/themes/gussco/images/product_spot_dibt.jpg')." alt='DIBt-Label'>";
											} 
												
											//	echo postmeta_with_label("serie_name",	"Serie",		$oven->custom);
												echo postmeta_with_label("leistung",	"Leistung",		$oven->custom, "kW");
												echo postmeta_with_label("raum_qm",		"Raumgröße",	$oven->custom, "m²");
												echo postmeta_with_label("gewicht",		"Gewicht",		$oven->custom, "kg");
												echo postmeta_with_label("preiss",		"Preis",		$oven->custom, "");
												
											?>
										</div>
									</a>
										<span class='comparecheckbox_span'><input class="comparecheckbox" type="checkbox" name="vehicle" value="<?php echo $oven->ID ?>"  /> <span class='comparecheckbox_text  <?php echo "comparecheckbox_text_$oven->ID" ?>'>Ofen merken?</span></span>
									</div><?php 
								}
							}
						?>
							<div style="clear:both">&nbsp;</div>
						</div>
						<?php 
					break;
					case "Zubehör" :
							if(!empty($extras)){
								
								for ($i = 0; $i < count($extras); $i++){
									$custom = get_post_custom($extras[$i]->ID);
									
									foreach($custom as $key => $value)
										if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
										
									$extras[$i]->custom = $custom;
								}
								
								usort($extras, "sort_extras");
							
								foreach ($extras as $extra){
								?><div class='div_product_thumb_overview' id="<?php echo "extra_$extra->ID" ?>">
									<a href="<?php echo post_permalink($extra->ID); ?>"><span class="gray">
										<?php echo get_the_post_thumbnail($extra->ID, array(52,85)); ?>
										<div class="with_spacing_before">
											<span style="font-family:Georgia; font-size:16px; color:#000;"><?php echo preg_replace("/([0-9]+(.+)?)/", "<span style='color:#983D25'>$0</span>", $extra->post_title); ?></span>
											<?php
												echo postmeta_with_label("preiss",		"Preis",		$extra->custom, "");
											?>
										</div>
									</span></a>
									</div><?php 
								}
							}
						?>
							<div style="clear:both">&nbsp;</div>
						</div>
						<?php 
						break;
						case 'Meine Öfen' : 
						break;
					default :
						echo "<div id='deals'>";
						the_content();
						echo "</div>";
						break;
					
				}
				?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
			</div>
		</div>
	</div>
</div>

<div id="oneline-widget-area" role="complementary">
	<ul class="xoxo">
		<?php dynamic_sidebar('oneline-widget-area'); ?>
	</ul>
</div><!-- #primary .widget-area -->

<?php get_footer(); ?>
