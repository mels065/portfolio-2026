<?php
if (!defined('ABSPATH')) {
    exit;
}

// Load post types
require_once get_template_directory() . '/content_types/index.php';

// Load block registration helpers
require_once get_template_directory() . '/inc/blocks.php';

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'portfolio'),
    ));
});

function portfolio_enqueue_assets() {
    wp_enqueue_style('portfolio-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('portfolio-tailwind', get_template_directory_uri() . '/build.css', array(), filemtime(get_template_directory() . '/build.css'));
}
add_action('wp_enqueue_scripts', 'portfolio_enqueue_assets');

function portfolio_editor_enqueue_assets() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_editor_style(get_template_directory_uri() . '/build.css');
}
add_action('after_setup_theme', 'portfolio_editor_enqueue_assets');

add_action('acf/init', function () {
    if (!function_exists('acf_add_options_page') || !function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_options_page(array(
        'page_title'  => __('Portfolio Front Page', 'portfolio'),
        'menu_title'  => __('Portfolio Front Page', 'portfolio'),
        'menu_slug'   => 'portfolio-front-page',
        'capability'  => 'edit_posts',
        'redirect'    => false,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_portfolio_front_page',
        'title' => __('Portfolio Front Page', 'portfolio'),
        'fields' => array(
            array(
                'key' => 'field_portfolio_hero_badge',
                'label' => __('Hero badge', 'portfolio'),
                'name' => 'hero_badge',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_hero_title',
                'label' => __('Hero title', 'portfolio'),
                'name' => 'hero_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_hero_description',
                'label' => __('Hero description', 'portfolio'),
                'name' => 'hero_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_portfolio_hero_primary_cta_label',
                'label' => __('Primary CTA label', 'portfolio'),
                'name' => 'hero_primary_cta_label',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_hero_primary_cta_url',
                'label' => __('Primary CTA URL', 'portfolio'),
                'name' => 'hero_primary_cta_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_portfolio_hero_secondary_cta_label',
                'label' => __('Secondary CTA label', 'portfolio'),
                'name' => 'hero_secondary_cta_label',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_hero_secondary_cta_url',
                'label' => __('Secondary CTA URL', 'portfolio'),
                'name' => 'hero_secondary_cta_url',
                'type' => 'url',
            ),
            array(
                'key' => 'field_portfolio_focus_title',
                'label' => __('Focus panel title', 'portfolio'),
                'name' => 'focus_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_focus_items',
                'label' => __('Focus items', 'portfolio'),
                'name' => 'focus_items',
                'type' => 'repeater',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_portfolio_focus_item_title',
                        'label' => __('Title', 'portfolio'),
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_focus_item_description',
                        'label' => __('Description', 'portfolio'),
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                ),
            ),
            array(
                'key' => 'field_portfolio_projects_title',
                'label' => __('Projects section title', 'portfolio'),
                'name' => 'projects_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_projects',
                'label' => __('Projects', 'portfolio'),
                'name' => 'projects',
                'type' => 'repeater',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_portfolio_project_title',
                        'label' => __('Project title', 'portfolio'),
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_portfolio_project_description',
                        'label' => __('Project description', 'portfolio'),
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_portfolio_project_tags',
                        'label' => __('Project tags', 'portfolio'),
                        'name' => 'tags',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_portfolio_about_title',
                'label' => __('About title', 'portfolio'),
                'name' => 'about_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_about_description',
                'label' => __('About description', 'portfolio'),
                'name' => 'about_description',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_portfolio_contact_title',
                'label' => __('Contact title', 'portfolio'),
                'name' => 'contact_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_contact_description',
                'label' => __('Contact description', 'portfolio'),
                'name' => 'contact_description',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_portfolio_contact_cta_label',
                'label' => __('Contact CTA label', 'portfolio'),
                'name' => 'contact_cta_label',
                'type' => 'text',
            ),
            array(
                'key' => 'field_portfolio_contact_cta_url',
                'label' => __('Contact CTA URL', 'portfolio'),
                'name' => 'contact_cta_url',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'portfolio-front-page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
});
