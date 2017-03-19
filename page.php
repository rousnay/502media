<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
	<section class="container default-page-contents">
		<div class="row content-holder">
			<div class="col-xs-12">
				<?php
				while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</section><!-- .default-page-contents -->
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
