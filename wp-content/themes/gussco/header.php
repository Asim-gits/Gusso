<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
		
		bloginfo( 'name' );
	
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	
		?></title>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
	wp_head();
?>
<link rel="shortcut icon" href="http://www.gussco.de/wp-content/uploads/favicon.ico"" type="image/x-icon" /> 
</head>

<body <?php body_class(); ?>>

<div id="main_wrapper">

<div id="pre_header">
	<span id="compare_list_link">
		<a href="<?php echo home_url('meine-ofen'); ?>"><img src="<?php echo home_url('wp-content/themes/gussco/images/mein_oefen.png'); ?>">&nbsp;&nbsp;Meine Öfen (<span id="compare_list_link_counter">0</span>)</a>
	</span>
	
	<a href="<?php echo home_url('impressum'); ?>">Impressum</a>
<!--<a href="?">Guss & Co. Blog</a>
	<a href="?"><img src="<?php echo home_url('wp-content/themes/gussco/images/facebook.png'); ?>"> </a> -->
</div>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="access" role="navigation">
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			
			<?php get_search_form(); ?>
			
		</div><!-- #access -->
		<div id="header_sidebar">
			<ul>
				<?php dynamic_sidebar( 'header-widget-area' ); ?>
				
			</ul>
			<img id="neuer-name" src="<?php echo home_url('wp-content/themes/gussco/images/baerenstark.png'); ?>">
		</div><!-- #header_sidebar -->
	</div><!-- #header -->

	<div id="main">
