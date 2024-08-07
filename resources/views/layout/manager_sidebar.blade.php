<div class="col-2 px-0 bg-light mt-1" >
    <div id="sidebar" class="collapse collapse-horizontal show border-end bg-light">
        <div class="list-group list-group-flush">
            <a href="#submenu1" data-bs-toggle="collapse" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-user me-2"></i> <span>QL Thành viên</span></a>
            <div class="collapse" id="submenu1">
                <a href="{{ route('usercatalogue.index') }}" class="list-group-item list-group-item-action bg-light">QL Nhóm TV</a>
                <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action bg-light">QL Thành Viên</a>
            </div>
        </div>

        <div class="list-group list-group-flush">
            <a href="#submenu2" data-bs-toggle="collapse" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-suitcase me-2"></i> <span>QL Sản Phẩm</span></a>
            <div class="collapse" id="submenu2">
                <a href="{{ route('productcatalogue.index') }}" class="list-group-item list-group-item-action bg-light">QL Nhóm Sản Phẩm</a>
                <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action bg-light">QL Sản Phẩm</a>
                <a href="{{ route('attribute.index') }}" class="list-group-item list-group-item-action bg-light">QL Nhóm Thuộc tính</a>
                <a href="{{ route('attribute_value.index') }}" class="list-group-item list-group-item-action bg-light">QL Thuộc tính</a>
            </div>
        </div>

        <div class="list-group list-group-flush">
            <a href="#submenu3" data-bs-toggle="collapse" class="list-group-item list-group-item-action bg-light"><i class="fa-solid fa-list-check me-2"></i> <span>QL Đơn Hàng</span></a>
            <div class="collapse" id="submenu3">
                <a href="{{ route('order.index') }}" class="list-group-item list-group-item-action bg-light">QL Đơn Hàng</a>
            </div>
        </div>
    </div>
</div>
