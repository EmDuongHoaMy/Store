let sizeIndex = 1;
    function addColor() {
        const sizesDiv = document.getElementById('sizes');
        const newSize = document.createElement('div');
        newSize.className = 'row mb-2';
        newSize.innerHTML = `
            <div class="col">
                <select name="sizes[${sizeIndex}][size]" id="" class="form-control">
                    <option value="">Chọn kích thước</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="sizes[${sizeIndex}][quantity]" placeholder="Quantity" required>
            </div>
        `;
        sizesDiv.appendChild(newSize);
        sizeIndex++;
    }