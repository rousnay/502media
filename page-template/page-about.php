<?php
/**
 * Template Name: About Us
 *
 * @package 502MEDIA
 */
get_header(); ?>

<div id="content" class="site-content full-width">
	<main id="main" class="site-main" role="main">

	<section class="container blog-contents">
		<div class="row content-holder">
			<div class="col-sm-12">
				<div class="row" id="team-listing-isotope">
					<?php 
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args = array(
						'post_type' => 'our-team',
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
					$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'theme_502media_team_member');
					$thumb_url	= $post_thumb[0];
					$post_url	= get_permalink();
					$content 	= get_the_content();
					?>
					<div class="all post-item 
					<?php if ( has_post_thumbnail() ) {
						echo "col-xs-6 col-sm-4";
					} else {
						echo "col-xs-6 col-sm-4";
					} ?>
					<?php echo $tax; ?> ">
					<?php if( has_post_thumbnail() ): ?>
						<div class="thumbnail thumbnail-hover" style="background-image: url('<?php echo $thumb_url; ?>'); ">
							<div class="blog-img">
								<img class="img-responsive" src="<?php echo $thumb_url; ?>" >
							</div>
							<a href="<?php echo $post_url ?>" title="<?php  the_title_attribute() ?>" class="overlay"></a>
						</div>
					<?php else : ?>
						<!--    NO THUMBNAIL -->
					<?php endif; ?>
					<div class="entry" style="
					<?php if( has_post_thumbnail() ): ?>
					width: 50%;
				<?php else : ?>
				width: 100%;
			<?php endif; ?>
			">
			<h3><a href="<?php echo $post_url ?>"> <?php the_title() ?> </a></h3>
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