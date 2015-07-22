<?php

/**
 * Retrieve an image's ALT text by passing it's URL
 *
 * @param string $url
 *
 * @return mixed
 */
function iti_get_image_alt_from_url( $url = '' ) {
	global $wpdb;

	$url        = esc_url( $url );

	/** @noinspection PhpUndefinedMethodInspection */
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ) );

	$post_id    = isset( $attachment[0] ) ? $attachment[0] : 0;
	$alt        = get_post_meta( absint( $post_id ), '_wp_attachment_image_alt', true );

	return $alt;
}