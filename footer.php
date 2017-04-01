<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 502MEDIA
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="container">
		<div class="row">
			<div class="col-sm-12 footer-banner">
				<div class="footer-banner-text">
					<h1>Ready to See More</h1>
					<h3>Learn our Process</h3>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 social-media-links">
				<div class="row">
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
			<div class="col-sm-6 get-in-touch">
				<div class="row">
					<div class="col-sm-12">
						<?php dynamic_sidebar( 'footer_widgets_3' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</footer><!-- footer -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
	//Fix the position of toggle menu icon
	function fixed_header_with_adminBar() {
		var adminBarHeight	= jQuery('#wpadminbar').height();
		var menuToggleTop 	= 22;
		var topTotal 		= adminBarHeight + menuToggleTop;
		var containerHeight	= jQuery( window ).height();
		var pageHeight		= containerHeight - adminBarHeight;
		pageHeight = parseInt(pageHeight, 10);

		// jQuery('#mm-menu-toggle').css('top',topTotal);
		jQuery('#page').css('minHeight', pageHeight);

		console.log(pageHeight);
	}
	fixed_header_with_adminBar();
	jQuery( window ).resize(function() {
		fixed_header_with_adminBar();
	});
	//Google Analytics Codes

</script>
</body>
</html>