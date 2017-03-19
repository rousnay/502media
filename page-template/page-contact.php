<?php
/**
 * Template Name: Contact
 *
 * @package CW
 */
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); //START the_post query
		$thumb_feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'cw_feature_img');
		$url_feature = $thumb_feature[0]; ?>

		<section class="container page-banner" style="background-image: url('<?php echo $url_feature; ?>');">
			<div class="row content-holder">
				<div class="col-xs-12 banner-holder">
					<?php
						if(get_field('banner_card')){
							echo '<div class="banner-card">' . get_field('banner_card') . '</div>';
						}?>
				</div>
			</div>
		</section><!-- .page-banner -->

		<section class="container page-contents">
					<?php the_content(); ?>
		</section><!-- .page-contents -->

		<?php endwhile; //END the_post query ?>
	</main><!-- #main -->
</div><!-- .container -->

<?php get_footer(); ?>