<?php

/**
 * Plugin Name: Voilà!Collage
 * Plugin URI: https://github.com/WordPress/gutenberg-examples
 * Description: Place interactive collages in your posts
 * Version: 0.0.1
 * Author: Voilà!Collage
 * Author URI: https://voilacollage.com
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers Voilà!Collage as a whitelisted oEmbed provider
 *
 */

wp_oembed_add_provider( 'https://voilacollage.com/collages/*', 'https://api.voilacollage.com/api/oembed.{format}', false );


/**
 * Registers custom Gutenberg block
 *
 */
function voilacollage_embed_register_block() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	wp_register_script(
		'voilacollage-embed',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element', 'lodash' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ),
		true
	);

	register_block_type( 'voillacollage/voilacollage-embed', array(
		'editor_script' => 'voilacollage-embed',
	) );

}
add_action( 'init', 'voilacollage_embed_register_block' );
