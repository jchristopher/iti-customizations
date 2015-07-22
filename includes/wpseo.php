<?php

/**
 * Filter the contents of the WP SEO option
 *
 * @param array $option The WP SEO main option values
 *
 * @return array
 */
function iti_filter_yst_wpseo_option( $option ) {
	$option['seen_about']          = true; // Prevent redirects to the about page
	$option['ignore_tour']         = true; // Prevent showing the tour popup
	$option['tracking_popup_done'] = true; // Prevent showing the tracking popup
	$option['allow_tracking']      = false;

	return $option;
}

add_filter( 'option_wpseo', 'iti_filter_yst_wpseo_option' );