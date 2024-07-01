$( document ).ready(function() {
    $('#search').change(function() {
        var keyword = $(this).val();
        $.ajax({
            url: '/ajax/complete_search/',
            type: 'GET',
            data: jQuery.param({ keyword:keyword}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                // $('#catalogue_des').empty();
                // alert('123');
                $('#search').typeahead(
                    { hint: true, highlight: true, minLength: 1 },
                    { name: 'states', source: substringMatcher(res) }
                );
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});