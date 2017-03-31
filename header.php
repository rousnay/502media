<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 502MEDIA
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

<body id="theme_502media-wp" <?php body_class(); ?>>
	<div id="sideheader">
		<div class="sidebar-inner">
			<div class="push_sidebar">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="col-md-12 hidden--xs hidden--sm menu-area">
						<?php theme_502media_header_menu(); ?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>
	<div id="page" class="site content-wrapper">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme_502media' ); ?></a>
		<header id="masthead" class="site-header panel-top panel-fixed" role="banner">
			<div class="container">
				<div class="row content-holder">
					<div class="col-sm-6 logo-area">
						<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
						</a>
					</div>
				</div>
				<div class="row header-menus">
					<button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button>
				</div>
			</div>
		</header><!-- #masthead -->