document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll('.check-login');

    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            fetch('/check-login')
                .then(response => response.json())
                .then(data => {
                    if (data.logged_in) {
                        window.location.href = event.target.closest('a').href;
                    } else {
                        Swal.fire({
                            title: 'Login Required',
                            text: 'Anda harus login terlebih dahulu',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            cancelButtonText: 'Cancel',
                            customClass: {
                                confirmButton: 'btn-login',
                                cancelButton: 'btn-cancel',
                                popup: 'login-popup',
                                content: 'login-content'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/login';
                            }
                        });
                    }
                });
        });
    });
});
