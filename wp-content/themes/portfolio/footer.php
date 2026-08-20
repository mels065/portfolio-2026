<footer class="border-t border-white/10 bg-slate-950">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-10 text-sm text-slate-400 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <p>© <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. Crafted for modern web experiences.</p>
        <div class="flex gap-4">
            <a href="mailto:hello@example.com" class="transition hover:text-white">Email</a>
            <a href="https://github.com" target="_blank" rel="noreferrer" class="transition hover:text-white">GitHub</a>
            <a href="https://www.linkedin.com" target="_blank" rel="noreferrer" class="transition hover:text-white">LinkedIn</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
