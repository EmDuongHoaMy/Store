<div class="col-2 px-0 bg-light mt-1" >
    <div id="sidebar" class="collapse collapse-horizontal show border-end bg-light">
        <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
            <a href="{{ route('user.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-light">
                <i class="fa-solid fa-user me-2"></i> <span>User</span>
            </a>
            <a href="{{ route('usercatalogue.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-light">
                <i class="fa-solid fa-user-group me-2"></i> <span>UserGroup</span>
            </a>
            <a href="{{ route('product.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-light">
                <i class="fa-solid fa-suitcase me-2"></i> <span>Products</span>
            </a>
            <a href="{{ route('productcatalogue.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-light">
                <i class="fa-regular fa-folder-open me-2"></i> <span>ProductsCatalogue</span>
            </a>
        </div>
    </div>
</div>
