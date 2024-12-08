<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php while (have_posts()): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="title"><?php the_title(); ?></h1>

                    <ul class="meta">
                        <li>
                            <i class="fa fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </li>
                        <li>
                            <i class="fa fa-user"></i>
                            <?php the_author_posts_link(); ?>
                        </li>
                        <li>
                            <i class="fa fa-folder"></i>
                            <?php the_category(', '); ?>
                        </li>
                        <?php if (comments_open()): ?>
                            <li>
                                <i class="fa fa-comments"></i>
                                <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <div class="content">
                        <?php 
                        the_content();
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Pages:', 'custom-lab-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php if (has_tag()): ?>
                        <div class="tags">
                            <h4><?php _e('Tags:', 'custom-lab-theme'); ?></h4>
                            <?php the_tags('<span>', '</span><span>', '</span>'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-navigation">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> %title'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title <i class="fa fa-angle-right"></i>'); ?>
                        </div>
                    </div>

                    <?php
                    if (comments_open() || get_comments_number()):
                        comments_template();
                    endif;
                    ?>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
