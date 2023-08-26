<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Product Menus</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a class="nav-link btn btn-primary" href="{{ url('admin/product/'. $productID .'/edit') }}">Product Detail</a>
            <a class="nav-link btn  btn-secondary mt-3" href="{{ url('admin/product/'. $productID .'/images') }}">Product Images</a>
        </nav>
    </div>
</div>