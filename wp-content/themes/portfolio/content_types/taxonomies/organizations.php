<?php
register_taxonomy('organizations', 'project', array(
    'labels' => array(
        'name' => __('Organizations'),
        'singular_name' => __('Organization'),
    ),
    'hierarchical' => true,
    'rewrite' => array('slug' => 'organizations'),
));
