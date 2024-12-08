<?php
/*
Template Name: Undersida
*/

get_header(); ?>

<div class="container">
    <div class="content-area-with-right-sidebar">
        <main id="main" class="site-main">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
        </main>
        <aside class="right-sidebar">
            <?php
            // Display a menu of all pages using the same template
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-templates/undersida.php'
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
    </div>
</div>

<?php get_footer(); ?>
