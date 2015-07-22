<?php

/**
 * Prevent parent and child themes from being auto-updated from .org
 *
 * @link https://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param $r
 * @param $url
 *
 * @return mixed
 */
function iti_hide_themes_from_auto_update( $r, $url ) {
	if ( false === strpos( $url, '://api.wordpress.org/themes/update-check' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}

	$themes = maybe_unserialize( $r['body']['themes'] );

	if ( is_array( $themes ) ) {
		unset( $themes[ get_option( 'template' ) ] );
		unset( $themes[ get_option( 'stylesheet' ) ] );
		$r['body']['themes'] = serialize( $themes );
	} else {
		// wasn't serialized, it was JSON
		$themes = json_decode( $r['body']['themes'] );

		if ( isset( $themes->themes ) ) {

			$parent_theme_name = get_option( 'template' );
			$child_theme_name = get_option( 'stylesheet' );

			// remove child theme
			if ( isset( $themes->themes->$child_theme_name ) ) {
				unset( $themes->themes->$child_theme_name );
			}

			// remove parent theme
			if ( isset( $themes->themes->$parent_theme_name ) ) {
				unset( $themes->themes->$parent_theme_name );
			}
		}

		$r['body']['themes'] = json_encode( $themes );
	}
	
	return $r;
}

add_filter( 'http_request_args', 'iti_hide_themes_from_auto_update', 5, 2 );