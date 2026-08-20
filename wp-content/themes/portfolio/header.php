<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio of a front-end engineer building thoughtful, fast, and accessible digital experiences.">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-950 text-slate-100 antialiased'); ?>>
<?php wp_body_open(); ?>
<header class="border-b border-white/10 bg-slate-950/80 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-lg font-semibold tracking-wide text-white">
            <?php bloginfo('name'); ?>
        </a>
        <nav class="hidden items-center gap-6 text-sm text-slate-300 md:flex">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'   => false,
                'items_wrap'     => '<ul class="flex gap-6">%3$s</ul>',
            ));
            ?>
        </nav>
    </div>
</header>
