    </main>
<footer id="footer" class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 footer-about">
                    <h4 class="footer-title">About Us</h4>
                    <p>Custom WordPress theme for lab assignment. Built with modern design principles and attention to detail.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-sm-4 footer-links">
                    <h4 class="footer-title">Quick Links</h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>
                <div class="col-sm-4 footer-contact">
                    <h4 class="footer-title">Contact</h4>
                    <ul class="footer-contact-list">
                        <li><i class="fas fa-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a></li>
                        <li><i class="fas fa-phone"></i> <a href="tel:+1234567890">+123 456 7890</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> <span>123 Street Name, City, Country</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                </div>
                <div class="col-sm-6">
                    <nav class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
