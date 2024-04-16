<div class="col-auto px-0" style="margin-top:20px">
    <div id="sidebar" class="collapse collapse-horizontal show border-end">
        <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
            <a href="{{ route('user.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-user"></i> <span>User</span> </a>
            <a href="{{ route('usercatalogue.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-user-group"></i> <span>UserGroup</span></a>
            <a href="{{ route('product.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-suitcase"></i> <span>Products</span></a>
            <a href="{{ route('productcatalogue.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-regular fa-folder-open"></i> <span>ProductsCatalogue</span></a>
        </div>
    </div>
</div>