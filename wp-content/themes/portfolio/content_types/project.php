<?php
add_action( 'init', 'portfolio_register_project_cpt' );
function portfolio_register_project_cpt() {
  $labels = array(
    'name'               => 'Projects',
    'singular_name'      => 'Project',
    'add_new_item'       => 'Add New Project',
    'edit_item'          => 'Edit Project',
    'new_item'           => 'New Project',
    'view_item'          => 'View Project',
    'search_items'       => 'Search Projects',
    'not_found'          => 'No projects found',
    'not_found_in_trash' => 'No projects found in trash',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'show_in_rest'       => true,            // expose in REST
    'rest_base'          => 'projects',      // REST endpoint: /wp-json/wp/v2/projects
    'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
    'rewrite'            => array( 'slug' => 'projects' ),
    'capability_type'    => 'post',
    'menu_position'      => 20,
  );

  register_post_type( 'project', $args );  // internal slug is "project"
}

// Ensure theme supports featured images (required for featured media in REST)
add_action( 'after_setup_theme', function() {
  add_theme_support( 'post-thumbnails' );
} );
