<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    ?>
                    <h1 class="page-title">
                        <?php echo get_the_author(); ?>
                    </h1>
                    <?php if (get_the_author_meta('description')) : ?>
                        <div class="author-bio">
                            <?php echo get_the_author_meta('description'); ?>
                        </div>
                    <?php endif; ?>
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
