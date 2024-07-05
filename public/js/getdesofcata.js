
$(document).ready(function() {
    // Listen for changes on any .dynamic-select element
    $(document).on('change', '.dynamic-select', function() {
        // Get the selected value
        var selectedValue = $(this).val();
        var currentSelect = $(this);
        $("#products_catalogue_id").attr("value",selectedValue);
        var selectedText = $(this).find("option:selected").text();
        $.ajax({
            url: '/ajax/getdoc/',
            type: 'GET',
            data: jQuery.param({ products_catalogue_id:selectedValue}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                // Check if the selected value is not empty
                if (selectedValue) {
                    if (res != false) {
                        // Remove any subsequent select elements
                        currentSelect.nextAll('.dynamic-select').remove();
            
                        // Create a new select element
                        var newSelect = $('<select class="form-select dynamic-select"></select>');
            
                        // Add options to the new select element
                        newSelect.append('<option value="">Tùy chọn nhóm sản phẩm</option>');
                        $.each(res, function(key, child) {
                            newSelect.append('<option class = "" value="' + child.id + '">' + child.name + '</option>');
                        });
            
                        // Append the new select element after the current one
                        currentSelect.after(newSelect);
                    } 
                }
                else{
                    currentSelect.nextAll('.dynamic-select').remove();
                    var prevSelect = currentSelect.prev('.dynamic-select');
                    $("#products_catalogue_id").attr("value",prevSelect.val());
                    selectedText = prevSelect.find("option:selected").text();
                }
                $('#catalogue_des').empty();
                $('#catalogue_des').append(selectedText);
            },
            error: function(xhr, status, error) {
                // console.error(error);
            }
        });


    });
});
