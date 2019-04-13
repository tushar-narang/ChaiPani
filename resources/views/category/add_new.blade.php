<div class="row">
    <div class="col-md-6">
        <div class="card">

            <form class="form-horizontal" action="{{route('category.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Category Name Here">
                        </div>
                    </div>


                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" id='add-category' class="btn btn-primary">Add Category!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        @include('category.categories')


    </div>
</div>
