<?php
/**
 * Template Name: Affiliations
 *
 * @package CW
 */
get_header(); ?>

<div id="content" class="site-content full-width">
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
		<div class="row">
			<div class="col-xs-12">
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
			</div>
		</div>
	</section><!-- .page-header -->

	<section class="container affiliation-contents">
		<div class="row content-holder">
			<div class="col-xs-12">
				<div id="logo-listing-isotope" class="row">
					<?php if( have_rows('company_logo', 'option') ): ?> <!-- START company_logo query -->
						<?php while( have_rows('company_logo', 'option') ): the_row(); 
						$logo_url = get_sub_field('logo');
						$company_link = get_sub_field('link');
						?>
						<div class="all isotope-item col-xs-6 col-sm-4">
							<div class="thumbnail thumbnail-hover">
								<div class="logo-img">
									<img class="img-responsive" src="<?php echo $logo_url; ?>" >
								</div>
								<a href="<?php echo $company_link ?>" class="overlay"></a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?> <!-- END company_logo query -->

				<div class="all isotope-item col-xs-6 col-sm-4">
					<div class="affiliation-started">
						<h2>READY TO GET STARTED?</h2>
						<button>REQUEST A QUOTE</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- .affiliation-contents -->

</main><!-- #main -->
</div><!-- .container -->

<?php get_footer(); ?>