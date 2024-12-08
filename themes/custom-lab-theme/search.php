<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <header class="page-header">
                <h1 class="page-title">
                    <?php printf(
                        esc_html__('Search Results for: %s', 'custom-lab-theme'),
                        '<span>' . get_search_query() . '</span>'
                    ); ?>
                </h1>
            </header>

            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

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
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        </div>

                        <?php if (has_tag()): ?>
                            <ul class="categories">
                                <?php the_tags('<li>', '</li><li>', '</li>'); ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>

                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'custom-lab-theme'),
                    'next_text' => __('Next', 'custom-lab-theme'),
                )); ?>
            <?php else: ?>
                <div class="no-results">
                    <h2><?php _e('Nothing Found', 'custom-lab-theme'); ?></h2>
                    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'custom-lab-theme'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
