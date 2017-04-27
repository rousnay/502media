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
	<?php
	if(get_field('footer_background_image')){
		$footer_bg_url = get_field('footer_background_image');
	}
	else{
		$footer_bg_url = get_template_directory_uri() . '/images/footer-placeholder-img.png';
	}
	?>
	<section class="container">
		<div class="row">
			<div class="col-sm-12 footer-banner" style="background-image: url('<?php echo $footer_bg_url; ?>');">
				<div class="footer-banner-text">
					<?php
					if(get_field('footer_title')){
						echo '<h1>' . get_field('footer_title') . '</h1>';
					}
					if(get_field('footer_subtitle')){
						echo '<h3>' . get_field('footer_subtitle') . '</h3>';
					}?>
				</div>
			</div>
		</div>
		<div class="row footer-edge">
			<div class="col-xs-6 social-media-links">

				<?php if( have_rows('social_media_links', 'option') ): 
				while ( have_rows('social_media_links', 'option') ) : the_row();
				$media_link = get_sub_field('media_link', 'option');
				$social_media = get_sub_field('social_media', 'option');
				?> 
				<a href="<?php echo $media_link ?>">
					<span class="fa-stack fa-1x">
						<i class="fa fa-circle-thin fa-stack-2x icon-background6"></i>
						<i class="fa fa-<?php echo $social_media ?> fa-stack-1x"></i>
					</span>
				</a>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
	<div class="col-xs-6 get-in-touch">
		<a  href="<?php the_field('get_in_touch_link', 'option') ?>"> <span>Let's Get In Touch </span> <i class="fa fa-comment-o" aria-hidden="true"></i> </a>
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