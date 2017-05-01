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
	
	<script src="https://use.typekit.net/pkg3bkv.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>

<body id="theme_502media-wp" <?php body_class(); ?>>
	<div id="sideheader">
		<div class="sidebar-inner">
			<div class="push_sidebar">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="col-md-12 menu-area">
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
				<div class="row">
					<div class="col-sm-6 logo-area">
						<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
						</a>
					</div>
				</div>
				<div class="row header-menus">
					<!-- <button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button> -->
					<button id="hamburger" class="c-hamburger c-hamburger--htx">
						<div class="menu-title"> <div class="mn-open">MENU</div><div class="mn-close">CLOSE</div></div>
						<span>toggle menu</span></button>
				</div>

			</div>
		</header><!-- #masthead -->

		<?php
		if(get_field('header_background_image')){
			$header_bg_url = get_field('header_background_image');
		}
		elseif (has_post_thumbnail()){
			$thumb_feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_feature_img');
			$header_bg_url = $thumb_feature[0];
		}
		else{
			$header_bg_url = get_template_directory_uri() . '/images/header-placeholder-img.png';
		}
		?>
		<section class="container page-banner" style="background-image: url('<?php echo $header_bg_url; ?>');">
			<div class="row content-holder">
				<div class="col-sm-12 header-banner">
					<div class="header-banner-text">
						<?php
						if(get_field('header_title')){
							echo '<h1>' . get_field('header_title') . '</h1>';
						}
						else{
							the_title( '<h1>', '</h1>' );
						}
						if(get_field('header_subtitle')){
							echo '<h3>' . get_field('header_subtitle') . '</h3>';
						}
						?>
					</div>
				</div>
			</div>
		</section><!-- .page-banner -->

		<section class="container page-header content-holder">
			<div class="row">
				<div class="col-xs-12">
					<?php
					if(get_field('intro_title')){
						echo '<div class="text_score"><h1>' . get_field('intro_title') . '</h1><div class="u_score"></div> </div>';
					}
					if(get_field('intro_paragraph')){
						echo '<div class="para">' . get_field('intro_paragraph') . '</div>';
					}
					?>
				</div>
			</div>
		</section><!-- .page-header -->