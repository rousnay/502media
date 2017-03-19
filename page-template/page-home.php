<?php
/**
* Template Name: Home
*
* @package CW
*/
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); //START the_post query?>
			<section class="container slider-contents">
				<div class="row">
					<div class="col-xs-12">
						<div class="slider-inner">
							<?php $slider_code = get_field('slider_shortcode'); 
							echo do_shortcode( $slider_code ) ?>
						</div>
					</div>
				</div>
			</section><!-- .slider-contents -->

			<section class="container get-started">
				<div class="row content-holder">
					<div class="col-xs-12">
						<h2>GET STARTED</h2>
						<div class="feature">

							<div class="blooks">
								<a href="<?php the_field('link_auto'); ?>">
									<div class="feature-icons feature-car">
									</div>
									<div class="feature-text">
										Auto
									</div>
								</a>
							</div>

							<div class="blooks">
								<a href="<?php the_field('link_home'); ?>">
									<div class="feature-icons feature-home">
									</div>
									<div class="feature-text">
										Home
									</div>
								</a>
							</div>

							<div class="blooks">
								<a href="<?php the_field('link_life'); ?>">
									<div class="feature-icons feature-life">
									</div>
									<div class="feature-text">
										Life
									</div>
								</a>
							</div>

							<div class="blooks">
								<a href="<?php the_field('link_commercial'); ?>">
									<div class="feature-icons feature-commercial">
									</div>
									<div class="feature-text">
										Commercial
									</div>
								</a>
							</div>

						</div>
					</div>
				</div>
			</section><!-- .get-started -->

		<section class="container content-holder page-contents">
			<?php the_content(); ?>
		</section><!-- .page-contents -->

			<section class="container affiliation-logos">
				<div class="row content-holder">
					<div class="col-xs-12">
						<h2>OUR AFFILIATIONS</h2>
						<?php $slider_code = get_field('affiliation_slider'); 
						echo do_shortcode( $slider_code ) ?>
					</div>
					<div class="col-xs-12">
						<button><a href="<?php the_field('affiliation_button_link'); ?>">VIEW OUR AFFILIATIONS</a></button>
					</div>
				</div>
			</section><!-- .affiliation-logos -->
			<?php  endwhile;  //END the_post query ?>
		</main><!-- #main -->
	</div><!-- #content -->

	<?php get_footer(); ?>