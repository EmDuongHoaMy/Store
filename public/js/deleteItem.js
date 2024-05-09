function deleteItem(){
    var id = $('#product_id').val();
    var _token = $('meta[name="csrf-token"]').attr('content');

    let option = {
        // _token: '{{ csrf_token() }}',
        'id' : id,
    }
    $.ajax({
        url: "/store/delete_item",
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: jQuery.param(option) ,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(res) {
            $('#cart-quantity').text(response.cartCount);
            alert('Cart Updated');
            console.table(res);
        },
        error: function(xhr, status, error) {
            // console.error(error);
        }
    });
}