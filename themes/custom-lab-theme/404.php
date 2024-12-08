<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="error-404 not-found text-center">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'custom-lab-theme'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'custom-lab-theme'); ?></p>

                    <?php get_search_form(); ?>

                    <div class="error-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <i class="fa fa-home"></i> <?php _e('Back to Homepage', 'custom-lab-theme'); ?>
                        </a>
                    </div>

                    <div class="recent-posts">
                        <h2><?php _e('Latest Posts', 'custom-lab-theme'); ?></h2>
                        <ul>
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 5,
                                'post_status' => 'publish'
                            ));
                            
                            foreach ($recent_posts as $recent) {
                                echo '<li><a href="' . get_permalink($recent['ID']) . '">' . $recent['post_title'] . '</a></li>';
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
