<div class="card">
    <div class="card-body">
        <h4 class="card-title">Viewing All Categories</h4>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <!-- Row -->
            <tr>
                <th scope="row" class="align-middle text-center">{{ $category->id }}</th>
                <td class="align"><div class="p-1">{{ $category->name }}</div></td>
                <td class="align-middle text-center">
                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
