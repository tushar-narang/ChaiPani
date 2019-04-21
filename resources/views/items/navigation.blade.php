<div class="row">
    <!-- column -->
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <a href="{{ route('item.index') }}">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-cart"></i></h1>
                <h6 class="text-white">View Products</h6>
            </div>
        </div>
        </a>
    </div>

    <!-- column -->
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <a href="{{ route('item.create') }}">   <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-cart-plus"></i></h1>
                <h6 class="text-white">Add Product</h6>
            </div>
            </div></a>
    </div>

    <!-- column -->
    <div class="col-md-4 col-lg-4 col-xlg-4">
        <a href="{{ route('category.index') }}" id="category"><div class="card card-hover">
            <div class="box bg-cyan text-center" id="manage-category">
                <h1 class="font-light text-white"><i class="mdi mdi-basket"></i></h1>
                <h6 class="text-white">Manage Category</h6>
            </div>
        </div></a>
    </div>




</div>
