    $(document).ready(function () {
        $('#logoutButton').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Logout',
                text: 'Are you sure you want to Logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF9209',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        });
    });
