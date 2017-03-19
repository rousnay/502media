<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CW
 */

get_header(); ?>

<div id="primary" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php if( has_post_thumbnail() ): 
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
	<?php else : ?>
		<!--    NO THUMBNAIL -->
	<?php endif; ?>
	<section class="container page-header">
		<div class="row content-holder">
			<div class="col-xs-12 content-header">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</section><!-- .page-header -->
	<section class="container single-post-contents">
		<div class="row content-holder">
		<div class="col-xs-12">
				<?php
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</section><!-- .single-post-contents -->
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
