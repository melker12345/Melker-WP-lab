jQuery(document).ready(function($) {
    // Smooth scroll for anchor links
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
            location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        }
    });

    // Add responsive table class
    $('table').wrap('<div class="table-responsive"></div>');

    // Add active class to current menu item
    var currentPage = window.location.pathname;
    $('.primary-menu a').each(function() {
        if ($(this).attr('href') === currentPage) {
            $(this).addClass('active');
        }
    });

    // Initialize lightbox for gallery images
    if ($.fn.magnificPopup) {
        $('.gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
});
