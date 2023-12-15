
$(document).ready(function () {
    $('#searchInput').on('keyup', function () {
        var value = $(this).val().toLowerCase();
        $('tbody tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $('.remove-btn').on('click', function () {
        $(this).closest('tr').remove();
    });
});

function updateLikedUserStatus() {
    $.ajax({
        url: 'check_status.php',
        method: 'GET',
        success: function (status) {
            console.log('Liked User Status Response:', status);

            var statusElement = $('#liked-user-status');

            if (status === 'online') {
                statusElement.removeClass('offline').addClass('online').text('Online');
            } else {
                statusElement.removeClass('online').addClass('offline').text('Offline');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

$(document).ready(function () {
    console.log('Page loaded');
    updateLikedUserStatus();
    setInterval(updateLikedUserStatus, 5000);
});
