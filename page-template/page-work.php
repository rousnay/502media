<?php
/**
 * Template Name: Our Work
 *
 * @package 502MEDIA
 */
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">

		<section class="container page-header">
			<div class="row">
				<div class="col-xs-12">
					<?php //while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
				</div>
			</div>
		</section><!-- .page-header -->

		<section class="container ours-work-contents">
			<div class="row content-holder">
				<div class="col-sm-12">
					<div class="row" id="post-listing-isotope">


						<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array(
							'post_type' => 'our-work',
							'posts_per_page' => 10,
							'paged' => $paged
							);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); 
						$terms = get_the_terms( $post->ID, 'category' );           
						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();
						foreach ( $terms as $term ) {
							$links[] = $term->name;
						}
						$tax_links = join( " ", str_replace(' ', '-', $links));          
						$tax = strtolower($tax_links);
						else :  
							$tax = '';          
						endif; ?>

						<?php
						if(get_field('grid_size')){

							if(get_field('grid_size') == 11){
								$col_size = "col-xs-6 col-sm-4 grid_size_11";
								$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_work_sm');
							}
							elseif (get_field('grid_size') == 12){
								$col_size = "col-xs-6 col-sm-6 grid_size_12";
								$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_work_mid');
							}
							else{
								$col_size = "col-xs-6 col-sm-8 grid_size_22";
								$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_work_big');
							}
						}
						else{
							$col_size = "col-xs-6 col-sm-4 grid_size_11";
							$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_work_sm');
						}
						$thumb_url	= $post_thumb[0];
						$post_url	= get_permalink();
						$content 	= get_the_content();
						?>

						<div class="all post-item <?php echo $col_size; echo $tax; ?> ">

							<div class="thumbnail thumbnail-hover" style="background-image: url('<?php echo $thumb_url; ?>'); ">
								<div class="img-holder">
									<img class="img-responsive" src="<?php echo $thumb_url; ?>" >
								</div>
								<a href="<?php echo $post_url ?>" title="<?php  the_title_attribute() ?>">
								<div class="entry">
									<h3><?php the_title() ?></h3>
									<?php if(get_field('header_subtitle') && get_field('grid_size') != 12)
									{echo '<h5>' . get_field('header_subtitle') . '</h5>';}?>
									
								</div></a>
								<a href="<?php echo $post_url ?>" title="<?php  the_title_attribute() ?>" class="overlay"></a>
							</div>

						</div>
					<?php endwhile; ?>
					<div class="grid-sizer col-xs-12 col-sm-3"></div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?php if (function_exists("pagination")) {
							pagination($loop->max_num_pages);
						} ?>
					</div>
				</div>
			</div>
		</section><!-- .blog-contents -->

		<section class="container page-contents">
			<div class="row content-holder">
				<div class="col-xs-12">
					<?php while ( have_posts() ) : the_post(); 
					the_content(); 
					endwhile; ?>
				</div>
			</div>
		</section><!-- .page-contents -->

	</main><!-- #main -->
</div><!-- .container -->

<?php get_footer(); ?>