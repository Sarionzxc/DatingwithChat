        function updateOnlineStatus() {
            $.ajax({
                url: 'check_status.php',
                method: 'GET',
                success: function (status) {
                    console.log('Status Response:', status);

                    if (status === 'online') {
                        $('#online-status').removeClass('offline').addClass('online');
                    } else {
                        $('#online-status').removeClass('online').addClass('offline');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        $(document).ready(function () {

            updateOnlineStatus();

            setInterval(updateOnlineStatus, 5000);
        });