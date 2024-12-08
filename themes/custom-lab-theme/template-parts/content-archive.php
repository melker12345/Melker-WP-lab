<?php
/**
 * Template part for displaying posts in an archive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <?php echo get_the_date(); ?>
                </span>
                <span class="byline">
                    <?php the_author_posts_link(); ?>
                </span>
                <span class="categories">
                    <?php the_category(', '); ?>
                </span>
            </div>
        <?php endif; ?>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php echo __('Read More', 'custom-lab-theme'); ?>
        </a>
    </div>
</article>
