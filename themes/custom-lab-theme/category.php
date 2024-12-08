<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_cat_title(); ?></h1>
                    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                </header>

                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', 'archive');
                endwhile;

                the_posts_pagination();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>