<?php
/*
Template Name: Undersida 3
*/

get_header(); ?>

<div class="container">
    <div class="content-area-full-width">
        <main id="main" class="site-main">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
