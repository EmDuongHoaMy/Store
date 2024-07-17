function addCart(){
    var qtt = $('#quantity').val();
    var attribute = $('#attribute').val();
    var id = $('#product_id').val();
    var cartItemId = $(this).data("cart-item-id");
    var _token = $('meta[name="csrf-token"]').attr('content');

    let option = {
        // _token: '{{ csrf_token() }}',
        'id' : id,
        'attribute' : attribute,
        'quantity':qtt,
        'cart_item_id': cartItemId
    }
    $.ajax({
        url: "/store/add_to_cart",
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: jQuery.param(option) ,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(res) {
            confirm('Thêm vào giỏ hàng thành công');
            $('#cart-quantity').text(res.cartCount);
            console.table(res);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}