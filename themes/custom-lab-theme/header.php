<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <!-- Top Bar - Social & Search Only -->
        <div class="navbar-top">
            <div class="container">
                <div class="top-menu">
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="search-form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <nav class="main-navigation">
            <div class="container nav-container">
                <div class="site-branding">
                    <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
                        Labboration-1-Melker
                    </a>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-icon"></span>
                </button>

                <!-- Desktop Navigation -->
                <div class="nav-menu-wrapper">
                    <ul class="nav-menu">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo home_url('/undersida-1'); ?>">Undersida 1</a></li>
                                <li><a href="<?php echo home_url('/undersida-2'); ?>">Undersida 2</a></li>
                                <li><a href="<?php echo home_url('/undersida-3'); ?>">Undersida 3</a></li>
                                <li><a href="<?php echo home_url('/undersida-4'); ?>">Undersida 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Blog Links Section -->
        <div class="blog-section">
            <div class="container">
                <?php if (is_front_page()): ?>
                    <div class="blog-links">
                        <div class="blog-links-wrapper">
                            <p class="blog-link-title">Recent Posts:</p>
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 5,
                                'post_status' => 'publish'
                            ));
                            
                            foreach($recent_posts as $post) : ?>
                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                    <?php echo $post['post_title']; ?>
                                </a>
                            <?php endforeach;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="breadcrumbs">
                        <a href="<?php echo home_url(); ?>">Home</a>
                        <?php
                        if (is_category() || is_single()) {
                            echo ' / ';
                            the_category(' / ');
                            if (is_single()) {
                                echo ' / ';
                                the_title();
                            }
                        } elseif (is_page()) {
                            echo ' / ';
                            echo get_the_title();
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
