<?php
/*
Template Name: Contact Page
*/

get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="main" class="site-main">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        // Contact Form 7 shortcode will be added in WordPress admin
                        if (shortcode_exists('contact-form-7')) {
                            echo do_shortcode('[contact-form-7 id="FORM_ID" title="Contact form"]');
                        } else {
                            echo '<p>' . __('Please install and activate Contact Form 7 plugin.', 'custom-lab-theme') . '</p>';
                        }
                        ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
