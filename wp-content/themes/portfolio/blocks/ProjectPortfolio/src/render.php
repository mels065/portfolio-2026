<?php
$projects_title = $attributes['title'] ?? 'Recent projects';
$projects = $projects ?? array();

if ( empty( $projects ) ) {
    $projects = get_posts( array(
        'post_type'      => 'project',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
    ) );
}

$normalize_project_tags = static function ( $tags ) {
    if ( is_array( $tags ) ) {
        return array_values( array_filter( array_map( 'trim', $tags ) ) );
    }

    if ( is_string( $tags ) ) {
        return array_values( array_filter( array_map( 'trim', preg_split( '/[\r\n,]+/', $tags ) ) ) );
    }

    return array();
};
?>

<section id="work" class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Featured work</p>
            <h2 class="mt-2 text-3xl font-semibold text-white">
                <?php echo esc_html( $projects_title ); ?>
            </h2>
        </div>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        <?php if ( ! empty( $projects ) ) : ?>
            <?php foreach ( $projects as $index => $project ) : ?>
                <?php
                if ( $project instanceof WP_Post ) {
                    $project_id = $project->ID;
                    $project_title = get_the_title( $project ) ?: 'Project';
                    $project_description = get_post_meta( $project_id, 'description', true );
                    if ( empty( $project_description ) ) {
                        $project_description = get_the_excerpt( $project );
                    }
                    $project_tags = $normalize_project_tags( get_post_meta( $project_id, 'tags', true ) );
                } else {
                    $project_title = $project['title'] ?? 'Project';
                    $project_description = $project['description'] ?? '';
                    $project_tags = $normalize_project_tags( $project['tags'] ?? array() );
                }
                ?>
                <article class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20">
                    <div class="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20"></div>
                    <h3 class="text-xl font-semibold text-white">
                        <?php echo esc_html( $project_title ); ?>
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-400">
                        <?php echo esc_html( $project_description ); ?>
                    </p>

                    <?php if ( ! empty( $project_tags ) ) : ?>
                        <div class="mt-6 flex flex-wrap gap-2">
                            <?php foreach ( $project_tags as $tag_index => $tag ) : ?>
                                <span class="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">
                                    <?php echo esc_html( trim( (string) $tag ) ); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <?php for ( $i = 0; $i < 3; $i++ ) : ?>
                <article class="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20">
                    <div class="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20"></div>
                    <h3 class="text-xl font-semibold text-white">
                        Project <?php echo esc_html( $i + 1 ); ?>
                    </h3>
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