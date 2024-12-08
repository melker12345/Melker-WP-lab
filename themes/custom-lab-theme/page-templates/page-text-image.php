<?php
/**
 * Template Name: Undersida 4 (Text + Image)
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="col-sm-6">
            <?php if (has_post_thumbnail()): ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
