// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Ensure navbar is visible and items are in a row
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        navbar.style.display = 'block';
        navbar.style.visibility = 'visible';
        navbar.style.backgroundColor = '#FFD700'; // Gold color

        // Ensure navbar items are in a row
        const navbarNav = document.querySelector('.navbar-nav');
        if (navbarNav) {
            navbarNav.style.display = 'flex';
            navbarNav.style.flexDirection = 'row';
            navbarNav.style.flexWrap = 'wrap';
            navbarNav.style.justifyContent = 'center';
        }

        // Update nav links color for better contrast with gold background
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(link => {
            link.style.color = '#333';
        });
    }

    // No need for text shadow with white background
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Add shadow to navbar on scroll
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('shadow');
        } else {
            navbar.classList.remove('shadow');
        }
    });

    // Back to top button
    var backToTopButton = document.getElementById('back-to-top');
    if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Map toggle functionality
    const toggleMapBtn = document.getElementById('toggleMap');
    const mapWrapper = document.getElementById('mapWrapper');

    if (toggleMapBtn && mapWrapper) {
        toggleMapBtn.addEventListener('click', function() {
            mapWrapper.classList.toggle('expanded');

            const toggleIcon = toggleMapBtn.querySelector('.toggle-icon');
            const toggleText = toggleMapBtn.querySelector('.toggle-text');

            if (mapWrapper.classList.contains('expanded')) {
                toggleIcon.classList.remove('fa-chevron-down');
                toggleIcon.classList.add('fa-chevron-up');
                toggleText.textContent = 'Collapse Map';
            } else {
                toggleIcon.classList.remove('fa-chevron-up');
                toggleIcon.classList.add('fa-chevron-down');
                toggleText.textContent = 'Expand Map';
            }
        });
    }

    // Initialize carousel
    var carouselElement = document.getElementById('carouselExampleFade');
    if (carouselElement) {
        var carousel = new bootstrap.Carousel(carouselElement, {
            interval: 3000,
            wrap: true
        });
    }

    // Form validation
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Image lazy loading
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }
});
