<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register blocks by scanning the /blocks directory for block.json files.
 */
function portfolio_register_blocks() {
    if ( ! function_exists( 'register_block_type_from_metadata' ) ) {
        return;
    }

    $blocks_dir = get_template_directory() . '/blocks';

    if ( ! is_dir( $blocks_dir ) ) {
        return;
    }

    register_block_type_from_metadata($blocks_dir . "/HeroBanner/block.json");
    register_block_type_from_metadata($blocks_dir . "/ProjectPortfolio/block.json");
}
add_action( 'init', 'portfolio_register_blocks' );
