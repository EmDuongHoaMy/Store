$( document ).ready(function() {
    $('#parent_id').change(function() {
        var productCatalogueId = $(this).val();
        $.ajax({
            url: '/ajax/getdoc/',
            type: 'GET',
            data: jQuery.param({ products_catalogue_id:productCatalogueId}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                $('#catalogue_des').empty();
                $('#catalogue_des').append(res.description);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});