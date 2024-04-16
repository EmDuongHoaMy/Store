    // {{-- ajax bat sk bat quan huyen --}}
    $( document ).ready(function() {
    $('#province').change(function() {
        var provinceId = $(this).val();
        $.ajax({
            url: '/ajax/location/district/',
            type: 'GET',
            data: jQuery.param({ province_code:provinceId}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                $('#district').empty();
                $('#ward').empty();
                $('#district').append('<option value="">Chọn Quận/Huyện</option>');
                $('#ward').append('<option value="">Chọn Phường/Xã</option>');
                $.each(res, function(key, district) {
                    $('#district').append('<option value="' + district.code + '">' + district.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                // console.error(error);
            }
        });
    });
    $('#district').change(function() {
	//#id_form
        var districtId = $(this).val();
        $.ajax({
            url: '/ajax/location/ward/',
            type: 'GET',
            data: jQuery.param({ district_code:districtId}) ,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(res) {
                $('#ward').empty();
                $('#ward').append('<option value="">Chọn Phường/Xã</option>');
                $.each(res, function(key, ward) {
                    $('#ward').append('<option value="' + ward.code + '">' + ward.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                // console.error(error);
            }
        });
    });

});