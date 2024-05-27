document.addEventListener('DOMContentLoaded', function () {
    const breadcrumbHome = document.querySelector('.breadcrumb-home');

    breadcrumbHome.addEventListener('click', function (e) {
        e.preventDefault();
        
        breadcrumbHome.classList.add('active');
        
        setTimeout(function () {
            window.location.href = breadcrumbHome.href;
        }, 500); // Sesuaikan durasi dengan animasi
    });
});
