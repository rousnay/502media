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
		<div class="row footer-edge">
			<div class="col-sm-6 social-media-links">

				<a href="#">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle-thin fa-stack-2x icon-background6"></i>
						<i class="fa fa-facebook fa-stack-1x"></i>
					</span>
				</a>
				<a href="#">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle-thin fa-stack-2x icon-background6"></i>
						<i class="fa fa-twitter fa-stack-1x"></i>
					</span>
				</a>
				<a href="#">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle-thin fa-stack-2x icon-background6"></i>
						<i class="fa fa-instagram fa-stack-1x"></i>
					</span>
				</a>

			</div>
			<div class="col-sm-6 get-in-touch">
				<a  href="#"> <span>Let's Get In Touch </span> <i class="fa fa-comment-o" aria-hidden="true"></i> </a>
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