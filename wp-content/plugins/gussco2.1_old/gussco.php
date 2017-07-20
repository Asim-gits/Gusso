<?php

/*
Plugin Name: Guss & Co.
Description: Plugin for Guss & Co.
Author: Daniel Schwarz + Phillip Pfaff
Version: 2.1 inkl. Schnäppchen
*/

include "helper.php";

class GussCo {	
	var $serie_meta_fields = array(
			"design",
			"aufstellart",
			"heizart",
			"rauchabgang",
			"ecolabel",
			"dibtlabel",
			"hersteller",
			"brennstoff",
			"leistung",
			"raum_qm",
			"hbt",
			"eigenschaften",
			"holzlaenge",
			"extra_empfehlung1_id",
			"extra_empfehlung2_id",
			"extra_empfehlung3_id",
			"extra_empfehlung4_id"
		);
	var $ofen_meta_fields = array(
			"gewicht",
			"hbt",
			"extra_eigenschaften",
					
			"serie_id",
			"serie_name",
			"preiss"
		);
	var $extra_meta_fields = array(
			"preiss",
			"hersteller",
			"extra_type"
		);

var $Schnäppchen_meta_fields = array(
		
);

	var $paket_meta_fields = array(
			"ofen_id",
			"extra1_id",
			"extra2_id",
			"extra3_id",
			"extra4_id"
		);
	var $angebot_meta_fields = array(
	
		);

	function GussCo() {
		$this->ofen_meta_fields 	= array_merge($this->ofen_meta_fields, $this->serie_meta_fields);
		$this->paket_meta_fields	= array_merge($this->paket_meta_fields, $this->ofen_meta_fields);
		$this->angebot_meta_fields	= array_merge($this->angebot_meta_fields, $this->ofen_meta_fields);
		
		// Register custom post types
		register_post_type('serie', array(
			'labels' => array(
				'name' => __( 'Serie' ),
				'singular_name' => __( 'Serie' ),
				'add_new' => __( 'Serie hinzufügen' ),
				'add_new_item' => __( 'Serie hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Serie bearbeiten' ),
				'new_item' => __( 'Neue Serie' ),
				'view' => __( 'Serien ansehen' ),
				'view_item' => __( 'Serie ansehen' ),
				'search_items' => __( 'Serie suchen' ),
				'not_found' => __( 'Keine Serien gefunden' ),
				'not_found_in_trash' => __( 'Keine Serien im Papierkorb' ),
				'parent' => __( 'Parent Serie' ),
			),
			'singular_label' => __('Serie'),
			'public' => false,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => array("slug" => "serie"), // Permalinks
			'query_var' => "serie", // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));
		
		register_post_type('ofen', array(
			'labels' => array(
				'name' => __( 'Öfen' ),
				'singular_name' => __( 'Ofen' ),
				'add_new' => __( 'Ofen hinzufügen' ),
				'add_new_item' => __( 'Ofen hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Ofen bearbeiten' ),
				'new_item' => __( 'Neuer Ofen' ),
				'view' => __( 'Ofen ansehen' ),
				'view_item' => __( 'Ofen ansehen' ),
				'search_items' => __( 'Ofen suchen' ),
				'not_found' => __( 'Keine Öfen gefunden' ),
				'not_found_in_trash' => __( 'Keine Öfen im Papierkorb' ),
				'parent' => __( 'Parent Ofen' ),
			),
			'singular_label' => __('Ofen'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => array("slug" => "ofen"), // Permalinks
			'query_var' => "ofen", // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));
register_post_type('Schnaeppchen', array(
			'labels' => array(
				'name' => __( 'Schnaeppchen' ),
				'singular_name' => __( 'Schnaeppchen' ),
				'add_new' => __( 'Schnäppchen hinzufügen' ),
				'add_new_item' => __( 'Schnäppchen hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Schnäppchen bearbeiten' ),
				'new_item' => __( 'Neues Schnäppchen' ),
				'view' => __( 'Schnäppchen ansehen' ),
				'view_item' => __( 'Schnäppchen ansehen' ),
				'search_items' => __( 'Schnäppchen suchen' ),
				'not_found' => __( 'Keine Schnäppchen gefunden' ),
				'not_found_in_trash' => __( 'Keine Schnäppchen im Papierkorb' ),
				'parent' => __( 'Parent Schnaeppchen' ),
			),
			'singular_label' => __('Schnaeppchen'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => true, // Permalinks
			'query_var' => true, // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));

		register_post_type('extra', array(
			'labels' => array(
				'name' => __( 'Zubehör' ),
				'singular_name' => __( 'Zubehör' ),
				'add_new' => __( 'Zubehör hinzufügen' ),
				'add_new_item' => __( 'Zubehör hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Zubehör bearbeiten' ),
				'new_item' => __( 'Neues Zubehör' ),
				'view' => __( 'Zubehör ansehen' ),
				'view_item' => __( 'Zubehör ansehen' ),
				'search_items' => __( 'Zubehör suchen' ),
				'not_found' => __( 'Kein Zubehör gefunden' ),
				'not_found_in_trash' => __( 'Kein Zubehör im Papierkorb' ),
				'parent' => __( 'Parent Zubehör' ),
			),
			'singular_label' => __('Zubehör'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => array("slug" => "extra"), // Permalinks
			'query_var' => "extra", // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));

		register_post_type('paket', array(
			'labels' => array(
				'name' => __( 'Paket' ),
				'singular_name' => __( 'Paket' ),
				'add_new' => __( 'Paket hinzufügen' ),
				'add_new_item' => __( 'Paket hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Paket bearbeiten' ),
				'new_item' => __( 'Neues Paket' ),
				'view' => __( 'Paket ansehen' ),
				'view_item' => __( 'Paket ansehen' ),
				'search_items' => __( 'Paket suchen' ),
				'not_found' => __( 'Kein Paket gefunden' ),
				'not_found_in_trash' => __( 'Kein Paket im Papierkorb' ),
				'parent' => __( 'Parent Paket' ),
			),
			'singular_label' => __('paket'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => array("slug" => "paket"), // Permalinks
			'query_var' => "paket", // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));
		
/*		register_post_type('angebot', array(
			'labels' => array(
				'name' => __( 'Angebot' ),
				'singular_name' => __( 'Angebot' ),
				'add_new' => __( 'Angebot hinzufügen' ),
				'add_new_item' => __( 'Angebot hinzufügen' ),
				'edit' => __( 'Bearbeiten' ),
				'edit_item' => __( 'Angebot bearbeiten' ),
				'new_item' => __( 'Neues Angebot' ),
				'view' => __( 'Angebot ansehen' ),
				'view_item' => __( 'Angebot ansehen' ),
				'search_items' => __( 'Angebot suchen' ),
				'not_found' => __( 'Kein Angebot gefunden' ),
				'not_found_in_trash' => __( 'Kein Angebot im Papierkorb' ),
				'parent' => __( 'Parent Angebot' ),
			),
			'singular_label' => __('angebot'),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => 5, 
			'register_meta_box_cb' => array(&$this, "metabox_init"),
			'rewrite' => array("slug" => "angebot"), // Permalinks
			'query_var' => "angebot", // This goes to the WP_Query schema
			'supports' => array('title','editor','thumbnail'),
			'taxonomies' => array() 
		));
		*/
		
		add_filter("manage_edit-serie_columns",		array(&$this, "custom_columns_serie"));
		add_filter("manage_edit-ofen_columns",		array(&$this, "custom_columns_ofen"));
		add_filter("manage_edit-extra_columns",		array(&$this, "custom_columns_extra"));
		add_filter("manage_edit-Schnäppchen_columns",		array(&$this, "custom_columns_Schnäppchen"));		
//		add_filter("manage_edit-angebot_columns",	array(&$this, "custom_columns_angebot"));
		
		add_action("wp_insert_post", array(&$this, "wp_insert_post"), 10, 2);
		
		add_action("manage_posts_custom_column", array(&$this, "custom_columns_values"));
	}
	
	function custom_columns_extra($columns) {
		$columns = array(
			"cb"				=> "<input type=\"checkbox\" />",
			"title"				=> "Title",
			"extra_type"		=> "Typ",
			"preiss"			=> "Preis"
		);
		
		return $columns;
	}

	function custom_columns_Schnäppchen($columns) {
		$columns = array(
			"cb"				=> "<input type=\"checkbox\" />",
			"title"				=> "Title",
			"extra_type"		=> "Typ",
			"preiss"			=> "Preis"
		);
		
		return $columns;
	}
	
	function custom_columns_serie($columns) {
		$columns = array(
			"cb"				=> "<input type=\"checkbox\" />",
			"title"				=> "Title",
			"raum_qm"			=> "Raumgröße",
			"leistung"			=> "Leistung",
			"brennstoff"		=> "Brennstoff",
			"design"			=> "Design"
		);
		
		return $columns;
	}
	function custom_columns_ofen($columns) {
		$columns = array(
			"cb"				=> "<input type=\"checkbox\" />",
			"title"				=> "Title",
			"serie_name"		=> "Serie",
			"raum_qm"			=> "Raumgröße",
			"leistung"			=> "Leistung",
			"brennstoff"		=> "Brennstoff",
			"gewicht"			=> "Gewicht",
			"design"			=> "Design",
			"preiss"			=> "Preis"
		);
		
		return $columns;
	}
	function custom_columns_values($column) {
		global $post;
		
		$values = get_post_custom_values($column, $post->ID);
		
		if(!empty($values)){
			echo implode(", ", $values);
		}
		
		return;
	}
	
	function wp_insert_post($post_id, $post = null) {
		$post_fields = array();
		
		switch ($post->post_type) {
			case 'serie'	:	$post_fields = array_merge($post_fields, $this->serie_meta_fields);		break;
			case 'ofen'		:	$post_fields = array_merge($post_fields, $this->ofen_meta_fields);		break;
			case 'extra'	:	$post_fields = array_merge($post_fields, $this->extra_meta_fields);		break;
			case 'Schnäppchen'	:	$post_fields = array_merge($post_fields, $this->schnäppchen_meta_fields);		break;			
			case 'paket'	:	$post_fields = array_merge($post_fields, $this->paket_meta_fields);		break;
			case 'angebot'	:	$post_fields = array_merge($post_fields, $this->angebot_meta_fields);	break;
		}
		
		foreach ($post_fields as $key) {
			switch ($key) {
				default : $value = @$_POST[$key]; break;
			}
			
			if (empty($value)) {
				delete_post_meta($post_id, $key);
				continue;
			}
			
			if (!is_array($value)) {
				delete_post_meta($post_id, $key);
				add_post_meta($post_id, $key, $value);
			} else {
				delete_post_meta($post_id, $key);
				
				foreach ($value as $entry)
					add_post_meta($post_id, $key, $entry);
			}
		}
	}
	
	function my_admin_scripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('jquery-ui-datepicker');
	
		wp_register_script('gussco-backend-js', WP_PLUGIN_URL.'/gussco/gussco_backend.js', array('jquery','jquery-ui-core','media-upload','thickbox'));
		wp_enqueue_script('gussco-backend-js');
	
		wp_register_script('jquery-ui-datepicker', WP_PLUGIN_URL.'/gussco/jquery-ui/ui.datepicker.js', array('jquery','jquery-ui-core'));
		wp_enqueue_script('jquery-ui-datepicker');
	}

	function my_admin_styles() {
		wp_enqueue_style('thickbox');
		
		wp_register_style('backend-styles', WP_PLUGIN_URL.'/gussco/gussco.css');
		wp_enqueue_style('backend-styles');
		
		wp_register_style('jquery-ui-1.7.3', WP_PLUGIN_URL.'/gussco/jquery-ui/jquery-ui-1.7.3.custom.css');
		wp_enqueue_style('jquery-ui-1.7.3');
	}
	
	function metabox_init() {
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "serie",		"normal", "low");
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "ofen",		"normal", "low");
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "extra",		"normal", "low");
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "Schnäppchen",		"normal", "low");		
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "paket",		"normal", "low");
		add_meta_box("TARG_meta", "Eigenschaften", array(&$this, "metabox_body"), "angebot",	"normal", "low");
		
		add_action('admin_print_scripts', array(&$this, "my_admin_scripts"));
		add_action('admin_print_styles', array(&$this, "my_admin_styles"));
	}
	
	function metabox_body() {
		global $post;
		
		if($post){
			$custom = get_post_custom($post->ID);
			
			$series = getPostsByType('serie',	TRUE);
			$ofen	= getPostsByType('ofen',	TRUE);
			$extras	= getPostsByType('extra',	TRUE);
			$extras	= getPostsByType('Schnäppchen',	TRUE);
			
			echo '
				<script type="text/javascript" charset="utf-8">
					var series_data = '.json_encode($series).';
					var ofen_data = '.json_encode($ofen).';
					var extras_data = '.json_encode($extras).';
					var extras_data = '.json_encode($Schnäppchen).';
				</script>';
			
			foreach($custom as $key => $value)
				if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
				
			if($post->post_type == 'ofen'){
				echo_select_for_ids("serie_id",		"Serie",	$series,	$custom);
				echo_input_hidden('serie_name',		$custom);
			}		
			
			if($post->post_type == 'paket'){
				?><h4>Paket</h4><?php 
				
				echo_select_for_ids("ofen_id",		"Ofen",			$ofen,		$custom);
				
				echo_select_for_ids("extra1_id",		"Zubehör 1",	$extras,	$custom);
				echo_select_for_ids("extra2_id",		"Zubehör 2",	$extras,	$custom);
				echo_select_for_ids("extra3_id",		"Zubehör 3",	$extras,	$custom);
		//		echo_select_for_ids("extra4_id",		"Zubehör 4",	$extras,	$custom);
			}	
			
			if($post->post_type == 'ofen' || $post->post_type == 'serie'){
				echo_select_for_ids("extra_empfehlung1_id",		"Zubehör 1",	$extras,	$custom);
				echo_select_for_ids("extra_empfehlung2_id",		"Zubehör 2",	$extras,	$custom);
				echo_select_for_ids("extra_empfehlung3_id",		"Zubehör 3",	$extras,	$custom);
				echo_select_for_ids("extra_empfehlung4_id",		"Zubehör 4",	$extras,	$custom);
			}
			
			if($post->post_type == 'extra'){
				echo_input_text('extra_type',			'Typ',	$custom);
			}
			
			if($post->post_type == 'Schnäppchen'){
				echo_input_text('extra_type',			'Typ',	$custom);
			}
			
			if($post->post_type == 'serie' || $post->post_type == 'ofen' || $post->post_type == 'paket' || $post->post_type == 'angebot'){
				?> <h4>Ofen Eigenschaften</h4><?php
				
				 echo_input_text('hersteller',	"Hersteller",	$custom); 
				 
				 echo_select("design",			"Designtyp",	array("klassisch", "design"),									$custom); 
				 echo_select("aufstellart",		"Aufstellart",	array("Standofen", "Wandofen", "Füße"),							$custom); 
				 echo_select("ecolabel",		"Ecolabel",		array("ja", "nein"),											$custom); 
				 echo_select("dibtlabel",		"DIBtlabel",	array("ja", "nein"),											$custom); 
				 echo_select("rauchabgang",		"Rauchabgang",	array("oben", "hinten","oben/hinten", "seitlich"),				$custom); 
				 echo_select("heizart",			"Heizart",		array("Konvektion", "Strahlung", "Konvektion & Strahlung"),		$custom); 

				 echo_input_text('brennstoff',	'Brennstoff',	$custom); 
				 echo_input_text('holzlaenge',	'Holzlänge',	$custom, 'cm'); 
				 echo_input_text('hbt',			'H/B/T',		$custom, 'cm'); 
				 echo_input_text('leistung',	'Leistung',		$custom, 'kW'); 
				 echo_input_text('raum_qm',		'Raumgröße',	$custom, 'm²'); 
			}
			
			if($post->post_type == 'serie'){
				echo_textarea('eigenschaften',			'Serienmäßige Eigenschaften',	$custom);
			}
			
			if($post->post_type == 'ofen' || $post->post_type == 'angebot' || $post->post_type == 'paket'){
				echo_input_text('gewicht',				'Gewicht',						$custom, 'kg');
				echo_textarea('eigenschaften',			'Serienmäßige Eigenschaften',	$custom);
				echo_textarea('extra_eigenschaften',	'Weitere Eigenschaften',		$custom);
			}
			
			if($post->post_type == 'ofen' || $post->post_type == 'angebot' || $post->post_type == 'extra' || $post->post_type == 'paket'){
				echo_input_text('preiss',		'Preis',		$custom);
			}
		}
	}
}

add_filter( "the_content", "co_get_the_content" );

function co_get_the_content($content){
	global $id, $post, $more, $page, $pages, $multipage, $preview, $pagenow;
	
	$new_content = "";

	$custom = get_post_custom($post->ID);
	
	foreach($custom as $key => $value){
		if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
	}
	
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_status' => null,
		'post_parent' => $post->ID,
		'exclude' => get_post_thumbnail_id()
	); 
	$attachments = get_posts($args);
	

	if($post->post_type == 'extra' || $post->post_type == 'ofen' || $post->post_type == 'Schnäppchen'){		
		$has_header = false;
			
		if ($attachments) {
			foreach ($attachments as $attachment) {
				if(strstr($attachment->post_name, 'header')){
					$new_content.=  wp_get_attachment_image($attachment->ID, array(643, 272));
					
					$has_header = true;
				}
			}
		}
		
		if($has_header == false){
			$new_content .= '<img width="643" height="272" alt="header" src="'.site_url("wp-content/themes/gussco/images/platzhalter_header.jpg").'" class="attachment-643x272">';
		}
	}
	if($post->post_type == 'paket'){		
		$has_header = false;
			
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $custom['ofen_id']
		); 
		$attachments = get_posts($args);
		
		if ($attachments) {
			foreach ($attachments as $attachment) {
				if(strstr($attachment->post_name, 'header')){
					$new_content.=  wp_get_attachment_image($attachment->ID, array(643, 272));
					
					$has_header = true;
				}
			}
		}
		
		if($has_header == false){
			$new_content .= '<img width="643" height="272" alt="header" src="'.site_url("wp-content/themes/gussco/images/platzhalter_header.jpg").'" class="attachment-643x272">';
		}
	}
	
	if($post->post_type == 'paket'){
		$paket_custom = $custom;		
		$custom = get_post_custom($paket_custom['ofen_id']);
		
		$extras = array();
		
		if(!empty($paket_custom['extra1_id'])){	array_push($extras, get_the_title($paket_custom['extra1_id']));	}
		if(!empty($paket_custom['extra2_id'])){	array_push($extras, get_the_title($paket_custom['extra2_id']));	}
		if(!empty($paket_custom['extra3_id'])){	array_push($extras, get_the_title($paket_custom['extra3_id']));	}
		
		if(!empty($paket['ofen_id'])) {
			echo "<div id='paket_ofen'><a href='".post_permalink($paket['ID'])."' style='color:#000'>".get_the_post_thumbnail($paket['ofen_id'], array(227,374))."</div>";
		}
		
		if(!empty($extras)){
			$extra_text = "inkl. ".implode(" + ", $extras);
		}
		
		$new_content.= "<div id='maininfo_area'>";
		$new_content.= "<h1><span class='_983D25'>Ihr Paket</span> - $post->post_title</h1>";
		$new_content.= "<p class='paket_incl'>".$extra_text."</p>";
		
		$new_content.= $content;
		
		
		foreach($custom as $key => $value){
			if(is_array($value) && count($value) == 1) $custom[$key] = $value[0];
		}
		
		if(!empty($custom['extra_eigenschaften']) || !empty($custom['eigenschaften']) ? ', ' : '')
			$new_content.= "<p><span class='_983D25'>Eigenschaften: </span>".(!empty($custom['extra_eigenschaften']) ? $custom['extra_eigenschaften'] : '').(!empty($custom['extra_eigenschaften']) && !empty($custom['eigenschaften']) ? ', ' : '').(!empty($custom['eigenschaften']) ? $custom['eigenschaften'] : '')."</p>";
		
		if(!empty($custom['serie_id'])){
			$siblings = get_posts(array(
				'post_type' 	=> 'ofen',
				'meta_key'		=> 'serie_id',
				'meta_value'	=> $custom['serie_id'],
				'post_type'		=> 'ofen',
				'numberposts'	=> -1,
				'post_status' 	=> 'publish',
				'exclude' 		=> $post->ID
			));
			
		}
			
		if(!empty($paket_custom['extra1_id']) || !empty($paket_custom['extra2_id']) || !empty($paket_custom['extra3_id']) ){
			$new_content.= "<h3><br><span class='_983D25'>Dazu gehört</span></h3>";
				
			if(!empty($paket_custom['extra1_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($paket_custom['extra1_id'])."'>".get_the_post_thumbnail($paket_custom['extra1_id'], array(52,85))."</a></div>";
			if(!empty($paket_custom['extra2_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($paket_custom['extra2_id'])."'>".get_the_post_thumbnail($paket_custom['extra2_id'], array(52,85))."</a></div>";
			if(!empty($paket_custom['extra3_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($paket_custom['extra3_id'])."'>".get_the_post_thumbnail($paket_custom['extra3_id'], array(52,85))."</a></div>";
		}
		
		
		$new_content.= "</div>";
		
		$new_content.= "<div id='info_area'>";
		$new_content.= get_the_post_thumbnail($paket_custom['ofen_id'], array(227,374));
		
		$new_content.= postmeta_with_label("hersteller",	"Hersteller",	$custom);
		$new_content.= postmeta_with_label("heizart",		"Heizart",		$custom);
		$new_content.= postmeta_with_label("rauchabgang",	"Rauchabgang",	$custom);
		$new_content.= postmeta_with_label("ecolabel",		"Ecolabel",		$custom);
		$new_content.= postmeta_with_label("dibtlabel",		"DIBtlabel",	$custom);
		$new_content.= postmeta_with_label("brennstoff",	"Brennstoff",	$custom);
		$new_content.= postmeta_with_label("leistung",		"Leistung",		$custom, "kW");
		$new_content.= postmeta_with_label("raum_qm",		"Raumgröße",	$custom, "m²");
		$new_content.= postmeta_with_label("gewicht",		"Gewicht",		$custom, "kg");
		$new_content.= postmeta_with_label("hbt",			"H/B/T",		$custom, "cm");	
		$new_content.= postmeta_with_label("preiss",		"Preis",		$paket_custom, "€");

		$new_content.= "</div>";

		return $new_content;
	}
	if($post->post_type == 'ofen'){
		$cookie_ovens 	= !empty($_COOKIE["comparelist"]) ? split(",", $_COOKIE["comparelist"]) : array();
		
		$new_content.= "<span class='comparecheckbox_span'><input class='comparecheckbox' type='checkbox' name='vehicle' value='$post->ID'> <span class='comparecheckbox_text comparecheckbox_text_$post->ID'>Ofen merken?</span><br><a href='".site_url("angebot-einholen?o=$post->post_title")."'>Angebot für diesen Ofen einholen</a></span>";

		$new_content.= "<div id='maininfo_area'>";
		$new_content.= "<h1><span class='_983D25'>Ihr Ofen</span> - $post->post_title</h1>";
		$new_content.= $content;
		
		if(!empty($custom['extra_eigenschaften']) || !empty($custom['eigenschaften']) ? ', ' : '')
			$new_content.= "<p><span class='_983D25'>Eigenschaften: </span>".(!empty($custom['extra_eigenschaften']) ? $custom['extra_eigenschaften'] : '').(!empty($custom['extra_eigenschaften']) && !empty($custom['eigenschaften']) ? ', ' : '').(!empty($custom['eigenschaften']) ? $custom['eigenschaften'] : '')."</p>";
		
		if(!empty($custom['serie_id'])){
			$siblings = get_posts(array(
				'post_type' 	=> 'ofen',
				'meta_key'		=> 'serie_id',
				'meta_value'	=> $custom['serie_id'],
				'post_type'		=> 'ofen',
				'numberposts'	=> -1,
				'post_status' 	=> 'publish',
				'exclude' 		=> $post->ID
			));
			
			if(!empty($siblings)){
				$new_content.= "<h3><span class='_983D25'>Öfen aus der gleichen Serie</span></h3>";
				
				foreach ($siblings as $sibling){
					$new_content.= "<div class='div_product_thumb'><a href='".post_permalink($sibling->ID)."'>".get_the_post_thumbnail($sibling->ID, array(52,85))."</a></div>";
				}
			}
			
			if(!empty($custom['extra_empfehlung1_id']) || !empty($custom['extra_empfehlung2_id']) || !empty($custom['extra_empfehlung3_id']) || !empty($custom['extra_empfehlung4_id'])){
				$new_content.= "<h3><br><span class='_983D25'>Das passende Zubeho?r</span></h3>";
				
				if(!empty($custom['extra_empfehlung1_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($custom['extra_empfehlung1_id'])."'>".get_the_post_thumbnail($custom['extra_empfehlung1_id'], array(52,85))."</a></div>";
				if(!empty($custom['extra_empfehlung2_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($custom['extra_empfehlung2_id'])."'>".get_the_post_thumbnail($custom['extra_empfehlung2_id'], array(52,85))."</a></div>";
				if(!empty($custom['extra_empfehlung3_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($custom['extra_empfehlung3_id'])."'>".get_the_post_thumbnail($custom['extra_empfehlung3_id'], array(52,85))."</a></div>";
				if(!empty($custom['extra_empfehlung4_id'])) $new_content.= "<div class='div_product_thumb'><a href='".post_permalink($custom['extra_empfehlung4_id'])."'>".get_the_post_thumbnail($custom['extra_empfehlung4_id'], array(52,85))."</a></div>";
			}
		}
		
		$new_content.= "</div>";
		
		$new_content.= "<div id='info_area'>";
		$new_content.= get_the_post_thumbnail($post->ID, array(227,374));
		
		$new_content.= postmeta_with_label("hersteller",	"Hersteller",	$custom);
		$new_content.= postmeta_with_label("heizart",		"Heizart",		$custom);
		$new_content.= postmeta_with_label("rauchabgang",	"Rauchabgang",	$custom);
		$new_content.= postmeta_with_label("ecolabel",		"Ecolabel",		$custom);
		$new_content.= postmeta_with_label("dibtlabel",		"DIBtlabel",	$custom);
		$new_content.= postmeta_with_label("brennstoff",	"Brennstoff",	$custom);
		$new_content.= postmeta_with_label("leistung",		"Leistung",		$custom, "kW");
		$new_content.= postmeta_with_label("raum_qm",		"Raumgröße",	$custom, "m²");
		$new_content.= postmeta_with_label("gewicht",		"Gewicht",		$custom, "kg");
		$new_content.= postmeta_with_label("hbt",			"H/B/T",		$custom, "cm");
		$new_content.= postmeta_with_label("preiss",		"Preis",		$custom, "€");

		$new_content.= "</div>";

		return $new_content;
	}
	
	if($post->post_type == 'extra'){		
		$new_content.= "<div id='maininfo_area'>";
		$new_content.= "<h1>$post->post_title</h1>";
		$new_content.= $content;
		$new_content.= "</div>";
		
		$new_content.= "<div id='info_area'>";
		$new_content.= get_the_post_thumbnail($post->ID, array(227,374));
		
		$new_content.= postmeta_with_label("preiss",		"Preis",		$custom, "€");

		$new_content.= "</div>";
		
		return $new_content;
	}
	
	if($post->post_type == 'Schnäppchen'){		
		$new_content.= "<div id='maininfo_area'>";
		$new_content.= "<h1>$post->post_title</h1>";
		$new_content.= $content;
		$new_content.= "</div>";
		
		$new_content.= "<div id='info_area'>";
		$new_content.= get_the_post_thumbnail($post->ID, array(227,374));
		
		$new_content.= postmeta_with_label("preiss",		"Preis",		$custom, "€");

		$new_content.= "</div>";
		
		return $new_content;
	}	
	
	return $content;
}

// Initiate the plugin
add_action("init", "CamonoOstInit");

function CamonoOstInit() { global $TARG; $TARG = new GussCo(); }

function wp_co_manager_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
}

function wp_co_manager_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'wp_co_manager_admin_scripts');
add_action('admin_print_styles', 'wp_co_manager_admin_styles');

function remove_menus () {
	global $menu;
	$restricted = array(__('Posts'), __('Links'), __('Comments'));

	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');