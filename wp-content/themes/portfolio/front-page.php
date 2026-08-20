<?php get_header(); ?>

<?php
$hero_badge = function_exists('get_field') ? get_field('hero_badge', 'option') : '';
$hero_title = function_exists('get_field') ? get_field('hero_title', 'option') : 'I build polished interfaces that feel as good as they look.';
$hero_description = function_exists('get_field') ? get_field('hero_description', 'option') : 'I design and ship accessible, performance-focused web experiences for startups, agencies, and ambitious brands.';
$hero_primary_label = function_exists('get_field') ? get_field('hero_primary_cta_label', 'option') : 'View projects';
$hero_primary_url = function_exists('get_field') ? get_field('hero_primary_cta_url', 'option') : '#work';
$hero_secondary_label = function_exists('get_field') ? get_field('hero_secondary_cta_label', 'option') : 'Let’s talk';
$hero_secondary_url = function_exists('get_field') ? get_field('hero_secondary_cta_url', 'option') : '#contact';
$focus_title = function_exists('get_field') ? get_field('focus_title', 'option') : 'Selected focus';
$focus_items = function_exists('get_field') ? get_field('focus_items', 'option') : array();
$projects_title = function_exists('get_field') ? get_field('projects_title', 'option') : 'Recent projects';
$projects = function_exists('get_field') ? get_field('projects', 'option') : array();
$about_title = function_exists('get_field') ? get_field('about_title', 'option') : 'I make interfaces feel effortless.';
$about_description = function_exists('get_field') ? get_field('about_description', 'option') : 'I’m a front-end engineer who enjoys turning ideas into clear, high-quality interfaces. My work blends strategy, interaction design, and implementation to create experiences that feel refined and useful.';
$contact_title = function_exists('get_field') ? get_field('contact_title', 'option') : 'Ready to build something memorable?';
$contact_description = function_exists('get_field') ? get_field('contact_description', 'option') : 'If you need a thoughtful front-end partner for your next product, campaign, or portfolio experience, I’d love to hear about it.';
$contact_cta_label = function_exists('get_field') ? get_field('contact_cta_label', 'option') : 'Say hello';
$contact_cta_url = function_exists('get_field') ? get_field('contact_cta_url', 'option') : 'mailto:hello@example.com';
?>

<main>
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.24),_transparent_45%)]"></div>
        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.2fr_0.8fr] lg:px-8 lg:py-28">
            <div class="max-w-3xl">
                <?php if (!empty($hero_badge)) : ?>
                    <p class="mb-5 inline-flex rounded-full border border-sky-400/30 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                        <?php echo esc_html($hero_badge); ?>
                    </p>
                <?php endif; ?>
                <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    <?php echo esc_html($hero_title); ?>
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="<?php echo esc_url($hero_primary_url); ?>" class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                        <?php echo esc_html($hero_primary_label); ?>
                    </a>
                    <a href="<?php echo esc_url($hero_secondary_url); ?>" class="rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        <?php echo esc_html($hero_secondary_label); ?>
                    </a>
                </div>
            </div>

            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-slate-950/30 backdrop-blur">
                <p class="text-sm uppercase tracking-[0.3em] text-slate-400"><?php echo esc_html($focus_title); ?></p>
                <ul class="mt-6 space-y-4 text-sm text-slate-300">
                    <?php if (!empty($focus_items)) : ?>
                        <?php foreach ($focus_items as $item) : ?>
                            <li class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                                <div class="font-semibold text-white"><?php echo esc_html($item['title'] ?? ''); ?></div>
                                <div class="mt-1"><?php echo esc_html($item['description'] ?? ''); ?></div>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <div class="font-semibold text-white">Design systems</div>
                            <div class="mt-1">Re-usable components, visual consistency, and scalable UI foundations.</div>
                        </li>
                        <li class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <div class="font-semibold text-white">Performance</div>
                            <div class="mt-1">Fast-loading pages, careful asset strategy, and smooth interactions.</div>
                        </li>
                        <li class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <div class="font-semibold text-white">Accessibility</div>
                            <div class="mt-1">Inclusive experiences that work beautifully for every user.</div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <section id="work" class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
        <div class="flex items-end justify-between gap-6">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Featured work</p>
                <h2 class="mt-2 text-3xl font-semibold text-white"><?php echo esc_html($projects_title); ?></h2>
            </div>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            <?php if (!empty($projects)) : ?>
                <?php foreach ($projects as $project) : ?>
                    <article class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20">
                        <div class="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20"></div>
                        <h3 class="text-xl font-semibold text-white"><?php echo esc_html($project['title'] ?? 'Project'); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-slate-400">
                            <?php echo esc_html($project['description'] ?? ''); ?>
                        </p>
                        <?php if (!empty($project['tags'])) : ?>
                            <div class="mt-6 flex flex-wrap gap-2">
                                <?php foreach (explode(',', $project['tags']) as $tag) : ?>
                                    <span class="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">
                                        <?php echo esc_html(trim($tag)); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <article class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20">
                        <div class="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20"></div>
                        <h3 class="text-xl font-semibold text-white">Project <?php echo esc_html($i + 1); ?></h3>
                        <p class="mt-3 text-sm leading-7 text-slate-400">
                            A focused product launch experience with streamlined interactions and a design-forward layout.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-2">
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">React</span>
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">Tailwind</span>
                        </div>
                    </article>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
        <div class="grid gap-8 rounded-3xl border border-white/10 bg-white/5 p-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">About</p>
                <h2 class="mt-2 text-3xl font-semibold text-white"><?php echo esc_html($about_title); ?></h2>
            </div>
            <div class="space-y-4 text-slate-300">
                <?php echo wp_kses_post($about_description); ?>
            </div>
        </div>
    </section>

    <section id="contact" class="mx-auto max-w-7xl px-6 pb-24 lg:px-8">
        <div class="rounded-3xl border border-sky-400/20 bg-sky-500/10 p-8 text-center shadow-lg shadow-sky-950/20">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Let’s collaborate</p>
            <h2 class="mt-3 text-3xl font-semibold text-white"><?php echo esc_html($contact_title); ?></h2>
            <p class="mx-auto mt-4 max-w-2xl text-slate-300"><?php echo esc_html($contact_description); ?></p>
            <a href="<?php echo esc_url($contact_cta_url); ?>" class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                <?php echo esc_html($contact_cta_label); ?>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
