<?php
/**
* Template Name: Home
*
* @package 502MEDIA
*/
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); //START the_post query?>

			<section class="container banner-text">
				<h1>
					We Grew Midwest Brands Through the Power of Story
					</h1>
			</section><!-- .page-contents -->


			<section class="container content-holder page-contents">
				<?php the_content(); ?>
			</section><!-- .page-contents -->


		<?php  endwhile;  //END the_post query ?>
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>