<?php get_header(); ?>

<div class="container">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php if (is_singular()) : ?>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php else : ?>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        <?php endif; ?>

                        <?php if ('post' === get_post_type()) : ?>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="byline">
                                    <?php the_author(); ?>
                                </span>
                                <span class="categories">
                                    <?php the_category(', '); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </header>

                    <?php if (has_post_thumbnail() && !is_singular()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        if (is_singular()) {
                            the_content();
                        } else {
                            the_excerpt();
                            echo '<a href="' . get_permalink() . '" class="read-more">Read More</a>';
                        }
                        ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p><?php _e('No posts found.', 'custom-lab-theme'); ?></p>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
