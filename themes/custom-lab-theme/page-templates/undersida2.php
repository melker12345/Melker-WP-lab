<?php
/*
Template Name: Undersida 2
*/

get_header(); ?>

<div class="container">
    <div class="content-area-with-left-sidebar">
        <aside class="left-sidebar">
            <?php
            // Display a menu of all pages using the same template
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-templates/undersida2.php'
            ));
            
            if ($pages) : ?>
                <nav class="sidemenu">
                    <ul>
                        <?php foreach ($pages as $page) : ?>
                            <li>
                                <a href="<?php echo get_permalink($page->ID); ?>">
                                    <?php echo $page->post_title; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </aside>
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
