<?php
/**
 
 * @package  
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'artist' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div> 

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle genericon genericon-menu" aria-controls="menu" aria-expanded="false"></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav> 
	</header> 

	
	<?php if ( get_header_image () ) { ?>
	<div class="header-image" style="background-image: url('<?php header_image(); ?>'); height: <?php echo get_custom_header()->height; ?>px;"></div>
	<?php } ?>

	<div id="content" class="site-content">
