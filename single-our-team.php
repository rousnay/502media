<?php
/**
* Template Name: Single Team Member
*
* @package 502MEDIA
*/
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php if( has_post_thumbnail() ): 
		$thumb_feature = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_feature_img');
		$url_feature = $thumb_feature[0]; ?> 
		<section class="container page-banner" style="background-image: url('<?php echo $url_feature; ?>');">
			<div class="col-sm-12 header-banner">
				<div class="header-banner-text">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<h3>Sub-title to be added here</h3>
				</div>
			</div>
		</section><!-- .page-banner -->
	<?php else : ?>
		<!--    NO THUMBNAIL -->
	<?php endif; ?>

	<section class="container page-header">
		<div class="row">
			<div class="col-xs-12">
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
			</div>
		</div>
	</section><!-- .page-header -->

</main><!-- #main -->
</div><!-- .container -->

<?php get_footer(); ?>