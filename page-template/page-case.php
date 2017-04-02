<?php
/**
 * Template Name: Case Study
 *
 * @package 502MEDIA
 */
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); //START the_post query
		$thumb_feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_feature_img');
		$url_feature = $thumb_feature[0]; ?>

		<section class="container page-banner" style="background-image: url('<?php echo $url_feature; ?>');">
			<div class="row content-holder">
				<div class="col-sm-12 header-banner">
					<div class="header-banner-text">
						<?php the_title( '<h1>', '</h1>' ); ?>
						<h3>Sub-title to be added here</h3>
					</div>
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