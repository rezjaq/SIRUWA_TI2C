

        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.querySelector('.navbar');
            const isHomePage = window.location.pathname === '/'; // Adjust this if your home route is different

            function checkScroll() {
                if (window.scrollY > 50 || !isHomePage) {
                    navbar.classList.add('scroll-nav-active');
                } else {
                    navbar.classList.remove('scroll-nav-active');
                }
            }

            // Initial check when the page loads
            checkScroll();

            // Event listener for scroll to toggle scroll-nav-active class
            window.addEventListener('scroll', checkScroll);
        });