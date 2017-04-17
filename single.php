<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 502MEDIA
 */

get_header(); ?>

<div id="primary" class="site-content full-width">
	<main id="main" class="site-main" role="main">
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
