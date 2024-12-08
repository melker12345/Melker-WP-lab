<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php while (have_posts()): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
