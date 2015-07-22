<?php

function iti_button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'target' => site_url()
	), $atts );

	ob_start(); ?>
	<a class="button button-from-shortcode" href="<?php echo esc_url( $a['target'] ); ?>"><?php echo esc_html( $content ); ?></a>
	<?php
	return ob_get_clean();
}

add_shortcode( 'button', 'iti_button_shortcode' );
