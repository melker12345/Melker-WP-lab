<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="title"><?php the_title(); ?></h1>
                    
                    <div class="content">
                        <?php the_content(); ?>
                        
                        <?php
                        $form_submitted = false;
                        $form_error = false;

                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
                            // Basic form validation
                            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                                $form_submitted = true;
                            } else {
                                $form_error = true;
                            }
                        }
                        ?>

                        <?php if ($form_submitted): ?>
                            <div class="alert alert-success">
                                Thank you for your message! We'll get back to you soon.
                            </div>
                        <?php else: ?>
                            <?php if ($form_error): ?>
                                <div class="alert alert-danger">
                                    Please fill in all required fields.
                                </div>
                            <?php endif; ?>

                            <form method="post" class="contact-form">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                                </div>

                                <button type="submit" name="contact_submit" class="btn btn-primary">Send Message</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <div class="col-sm-4">
            <div class="contact-info">
                <h3><?php _e('Contact Information', 'custom-lab-theme'); ?></h3>
                <ul>
                    <li><i class="fa fa-map-marker"></i> <?php echo get_theme_mod('contact_address', '123 Street Name, City, Country'); ?></li>
                    <li><i class="fa fa-phone"></i> <?php echo get_theme_mod('contact_phone', '+1 234 567 890'); ?></li>
                    <li><i class="fa fa-envelope"></i> <?php echo get_theme_mod('contact_email', 'info@example.com'); ?></li>
                </ul>
                
                <div class="social-links">
                    <h3><?php _e('Follow Us', 'custom-lab-theme'); ?></h3>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
