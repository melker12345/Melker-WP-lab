/**
 * Navigation functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenuWrapper = document.querySelector('.nav-menu-wrapper');
    const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');
    let isMenuOpen = false;

    // Toggle mobile menu
    if (menuToggle && navMenuWrapper) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            isMenuOpen = !isMenuOpen;
            
            // Toggle active classes
            this.classList.toggle('active');
            navMenuWrapper.classList.toggle('active');
            
            // Update ARIA attributes
            this.setAttribute('aria-expanded', isMenuOpen);
            
            // Prevent body scroll when menu is open
            document.body.style.overflow = isMenuOpen ? 'hidden' : '';
        });
    }

    // Handle dropdown menus for mobile
    menuItemsWithChildren.forEach(item => {
        const link = item.querySelector('a');
        const subMenu = item.querySelector('.sub-menu');
        
        if (window.innerWidth <= 768) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close other open submenus
                menuItemsWithChildren.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                        if (otherItem.querySelector('.sub-menu')) {
                            otherItem.querySelector('.sub-menu').style.display = 'none';
                        }
                    }
                });
                
                // Toggle current submenu
                item.classList.toggle('active');
                if (subMenu) {
                    subMenu.style.display = subMenu.style.display === 'none' || !subMenu.style.display ? 'block' : 'none';
                }
            });
        }
    });

    // Handle desktop dropdown menus
    if (window.innerWidth > 768) {
        menuItemsWithChildren.forEach(item => {
            item.addEventListener('mouseenter', function() {
                const subMenu = this.querySelector('.sub-menu');
                if (subMenu) {
                    subMenu.style.display = 'block';
                }
            });

            item.addEventListener('mouseleave', function() {
                const subMenu = this.querySelector('.sub-menu');
                if (subMenu) {
                    subMenu.style.display = 'none';
                }
            });
        });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (isMenuOpen && !navMenuWrapper.contains(e.target) && !menuToggle.contains(e.target)) {
            menuToggle.classList.remove('active');
            navMenuWrapper.classList.remove('active');
            isMenuOpen = false;
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            menuToggle.classList.remove('active');
            navMenuWrapper.classList.remove('active');
            isMenuOpen = false;
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            menuToggle.focus();
        }
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth > 768 && isMenuOpen) {
                menuToggle.classList.remove('active');
                navMenuWrapper.classList.remove('active');
                isMenuOpen = false;
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        }, 250);
    });
});
