function addCart(){
    var qtt = $('#quantity').val();
    var sz = $('#size').val();
    var id = $('#product_id').val();
    var _token = $('meta[name="csrf-token"]').attr('content');

    let option = {
        'id' : id,
        'size' : sz,
        'quatity':qtt,
    }
    $.ajax({
        url: '/ajax/thanhtoan/',
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: jQuery.param(option) ,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(res) {
            console.table(res);
        },
        error: function(xhr, status, error) {
            // console.error(error);
        }
    });
}