
$( document ).ready(function() {
    $('.confirm-button').click(function() {
        var orderId = $(this).data('order-id');
        var button = $(this);
        $.ajax({
            url: '/order/updateStatus/' + orderId ,
            type: 'GET',
            data: jQuery.param({ status: "Đã xác nhận"}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                confirm("Xác nhận đơn hàng thành công");
                button.closest('tr').find('.order-status').text(res.status);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});