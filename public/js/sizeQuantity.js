let sizeIndex = 1;
    function addColor() {
        const sizesDiv = document.getElementById('attribute');
        const newSize = document.createElement('div');
        newSize.className = 'col mb-2';
        newSize.innerHTML = `
            <div class="d-flex">
                <select name="attribute[${sizeIndex}][size]" id="" class="form-control">
                    <option value="">Chọn kích thước</option>
                    <option value="1">S</option>
                    <option value="2">M</option>
                    <option value="3">L</option>
                    <option value="4">XL</option>
                </select>
                <select name="attribute[${sizeIndex}][color]" id="" class="form-control">
                    <option value="">Chọn màu săc</option>
                    <option value="5">Xanh</option>
                    <option value="6">Đỏ</option>
                    <option value="7">Vàng</option>
                </select>

                <input type="number" class="form-control" name="attribute[${sizeIndex}][quantity]" placeholder="Quantity" required>
            </div>

        `;
        sizesDiv.appendChild(newSize);
        sizeIndex++;
    }