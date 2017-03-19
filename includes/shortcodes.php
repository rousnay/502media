<?php 

/**
 * Shortcode: Display a List of Child Pages For a Parent Page
 *
 * Code: [company_logo]
 *
 * or <?php affiliation_slider(); ?>
 *
 **/

function affiliation_slider($atts, $content = null){

	ob_start();

	echo '<div class="row"> <div id="company-logo-slider" class="owl-carousel">';

	if( have_rows('company_logo', 'option') ):
		while ( have_rows('company_logo', 'option') ) : the_row();
	$logo_url = get_sub_field('logo');
	$company_link = get_sub_field('link');

	echo '<div class="thumbnail thumbnail-hover">';
	echo '<img class="img-responsive" src=" ' . $logo_url . '">';
	echo '<a href=" ' . $company_link .' " " title=" ' .  $company_link .' " class="link-full"></a>';
	echo '</div>';

	endwhile;
	else :
		echo '<div class="col-xs-12">Affiliations Slider not found! <be> please add some logo in theme setting page</div>';
	endif;
	echo '</div></div>';

	$output = ob_get_clean();
	return $output;
}

add_shortcode('company_logo','affiliation_slider');

