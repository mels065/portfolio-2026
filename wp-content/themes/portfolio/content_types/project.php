<?php
register_post_type('project', array(
    'labels' => array(
        'name' => __('Projects'),
        'singular_name' => __('Project'),
    ),
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'projects'),
    'supports' => array('title', 'thumbnail'),
));
