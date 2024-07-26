
$( document ).ready(function() {
    $('.confirm-button').click(function() {
        var orderId = $(this).data('order-id');
        var button = document.querySelector('.confirm-button');
        var statusElement = $(this).closest('tr').find('.order-status');
        $.ajax({
            url: '/order/updateStatus/' + orderId ,
            type: 'GET',
            data: jQuery.param({ status:statusElement.text() }) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                statusElement.text(res.status);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});