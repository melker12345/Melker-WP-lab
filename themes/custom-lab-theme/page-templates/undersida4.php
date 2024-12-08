<?php
/*
Template Name: Undersida 4
*/

get_header(); ?>

<div class="container">
    <div class="content-area-with-image">
        <div class="content-column">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="image-column">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
