$( document ).ready(function() {
    $('#products_catalogue_id').change(function() {
	//#id_form
        var productCatalogueId = $(this).val();
        $.ajax({
            url: '/ajax/getdoc/',
            type: 'GET',
            data: jQuery.param({ products_catalogue_id:productCatalogueId}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                // alert(12345);
                $('#catalogue_des').empty();
                $('#catalogue_des').append(res.description);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});