<?php
/**
 * Template Name: Undersida 3 (Full Width)
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
