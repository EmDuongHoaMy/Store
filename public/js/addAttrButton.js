var sizeIndex = 0;
function addAttr(){
    var option = document.querySelectorAll('.btn-check:checked');
    const optionChecked = Array.from(option).map(checkbox => checkbox.value);

    var option = {
        // _token: '{{ csrf_token() }}',
        'option' : optionChecked,
        // 'cart_item_id': cartItemId
    }
    

    $.ajax({
        url: "/ajax/addAttrButton/",
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: jQuery.param(option) ,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(res) {
            if (optionChecked.length !=0 ) {
                const sizesDiv = document.getElementById('attribute');
            const newSize = document.createElement('div');
            newSize.className = 'col mb-2 d-flex';

            $.each(res, function(key, attribute) {
                $.each(attribute,function(key,attr){
                    var attrSelect = document.createElement('select');
                    attrSelect.className = 'form-select';
                    attrSelect.name = `attribute[${sizeIndex}][${attr.name}]`;
                    const newOption = document.createElement('option');
                    newOption.textContent = `Chọn ${attr.name}`;
                    attrSelect.appendChild(newOption);
                    $.each(attr.value, function(key, attribute_value) {
                        const option = document.createElement("option");
                        option.value = attribute_value.id;
                        option.textContent = `${attribute_value.attribute_value}`;
                        attrSelect.appendChild(option);
                        newSize.appendChild(attrSelect);
                    });
                });
            });
            var newInput = document.createElement('input');
                        newInput.className = 'form-control';
                        newInput.type = 'number';
                        newInput.placeholder = 'Quantity';
                        newInput.name = `attribute[${sizeIndex}][quantity]`;
                        newInput.required = 'true';
                        newSize.appendChild(newInput); 
            sizesDiv.appendChild(newSize);
            sizeIndex++;
            }
        },
        error: function(xhr, status, error) {
        }
    });
}