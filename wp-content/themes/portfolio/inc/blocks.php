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

function portfolio_register_interactivity_config() {
    // Register a global state that contains all projects from the database
    wp_interactivity_config('portfolioProjects', array_map(
        function($project) {
            return array(
                'title' => get_the_title($project),
                'description' => get_post_meta($project->ID, 'description', true),
                'tags' => get_post_meta($project->ID, 'tags', true)
            );
        },
        get_posts(array(
            'post_type' => 'project',
            'post_status' => 'publish',
            'numberposts' => -1,
        ))
    ));
}
add_action( 'init', 'portfolio_register_blocks' );
add_action( 'init', 'portfolio_register_interactivity_config' );
