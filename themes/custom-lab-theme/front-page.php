<?php get_header(); ?>

<div class="hero">
    <div class="hero-content">
        <h1><?php echo get_theme_mod('hero_title', get_bloginfo('name')); ?></h1>
        <p><?php echo get_theme_mod('hero_text', get_bloginfo('description')); ?></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="post-meta">
                            <span><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            <span><i class="fas fa-user"></i> <?php the_author(); ?></span>
                            <?php if (has_category()) : ?>
                                <span><i class="fas fa-folder"></i> <?php the_category(', '); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p><?php _e('No posts found.', 'custom-lab-theme'); ?></p>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
