<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CW
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="container">
		<div class="row">
			<div class="col-sm-6 informations">
				<div class="row content-holder-half">
					<div class="col-sm-12">
						<div class="contact-info">
						<?php dynamic_sidebar( 'footer_widgets_1' ); ?>
							</div>
							<div class="quick-links">
							<?php dynamic_sidebar( 'footer_widgets_2' ); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 location-map">
						<div class="row content-holder-half">
							<div class="col-sm-12">
								<?php dynamic_sidebar( 'footer_widgets_3' ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</footer><!-- footer -->
	</div><!-- #page -->
	<button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button>
	<!-- MENU FOR SMALL SCREEN -->
	<nav id="mm-menu" class="mm-menu">
		<button> Submit A Claim </button>
		<?php cw_header_menu(); ?>
	</nav><!-- nav -->
	<?php wp_footer(); ?>
	<script type="text/javascript">
	//Fix the position of toggle menu icon
	function fixed_header_with_adminBar() {
		var adminBarHeight	= jQuery('#wpadminbar').height();
		var menuToggleTop 	= 22;
		var topTotal 		= adminBarHeight + menuToggleTop;
		//jQuery('#masthead').css('top',adminBarHeight);
		jQuery('#mm-menu-toggle').css('top',topTotal);
		jQuery('#mm-menu').css('top',adminBarHeight);
	}
	fixed_header_with_adminBar();
	jQuery( window ).resize(function() {
		fixed_header_with_adminBar();
	});
	//Google Analytics Codes

</script>
</body>
</html>