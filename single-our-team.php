<?php
/**
* Template Name: Single Team Member
*
* @package 502MEDIA
*/
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">

		<section class="container page-contents">
			<div class="row content-holder">
				<div class="col-xs-12">
					<?php while ( have_posts() ) : the_post(); 
					the_content(); 
					endwhile; ?>
				</div>
			</div>
		</section><!-- .page-contents -->

		<section class="container team-member-contents">
			<div class="row content-holder">
				<div class="col-xs-12">
					

					
				</div>
			</div>
		</section><!-- .team-member-contents -->

	</main><!-- #main -->
</div><!-- .container -->

<?php get_footer(); ?>