<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php single_post_title(); ?>
                    </h1>
                </header>

                <div class="blog-posts">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'archive');
                    endwhile;

                    the_posts_pagination(array(
                        'prev_text' => __('Previous page', 'custom-lab-theme'),
                        'next_text' => __('Next page', 'custom-lab-theme'),
                    ));
                    ?>
                </div>

            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
