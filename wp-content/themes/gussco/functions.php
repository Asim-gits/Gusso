<?php

include 'co_widgets.php';

if ( ! isset( $content_width ) )
	$content_width = 640;

add_action( 'after_setup_theme', 'twentyten_setup' );

add_action( 'init', 'gussco_init' );


remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');

if ( ! function_exists( 'gussco_init' ) ):
function gussco_init() {
	wp_enqueue_script('jquery-ui-core');
	
	wp_register_script('jquery-ui-effects-core',	home_url('wp-includes/js/jquery/ui/jquery.effects.core.min.js'),	array('jquery-ui-core'));
	wp_enqueue_script('jquery-ui-effects-core');
	
	wp_register_script('jquery-input-prompt',	home_url('wp-content/themes/gussco/jquery.input_prompt.js'),	array('jquery'));
	wp_enqueue_script('jquery-input-prompt');
	
	wp_register_script('jquery-cookie',	home_url('wp-content/themes/gussco/jquery.cookie.js'),	array('jquery'));
	wp_enqueue_script('jquery-cookie');
	
	wp_register_script('gussco',	home_url('wp-content/themes/gussco/gussco.js'),	array('jquery', 'jquery-cookie', 'jquery-ui-core', 'jquery-ui-effects-core'));
	wp_enqueue_script('gussco');	
}
endif;

if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {
	add_editor_style();

	add_theme_support( 'post-thumbnails' );

	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";

	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );
	
	register_widget('WidgetCo_Image');
	
}
endif;

function twentyten_widgets_init() {
	register_sidebar( array(
		'name' => 'Header Widget Area',
		'id' => 'header-widget-area',
		'description' => 'Widget Area im Header',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => 'Widget Area zweizeilig oben',
		'id' => 'twoline-top-widget-area',
		'description' => 'Widget Area zweizeilig oben',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => 'Widget Area zweizeilig unten',
		'id' => 'twoline-bottom-widget-area',
		'description' => 'Widget Area zweizeilig oben',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => 'Widget Area einzeilig',
		'id' => 'oneline-widget-area',
		'description' => 'Widget Area einzeilig',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar( array(
		'name' => 'Seiten Widget Area',
		'id' => 'side-widget-area',
		'description' => 'Widget Area an der rechten Seite',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

add_action( 'widgets_init', 'twentyten_widgets_init' );

add_action( 'template_redirect', 'mytheme_template_redirect' );
function mytheme_template_redirect() {
    global $wp_query;
    $id = (int) $wp_query->get_queried_object_id();
    $template = get_post_meta( $id, '_wp_page_template', true );
    if ( $template && 'default' !== $template ) {
        $file = STYLESHEETPATH . '/' . $template;
        if( is_file( $file ) ) {
            require_once $file;
            exit;
        }
    }
 
}