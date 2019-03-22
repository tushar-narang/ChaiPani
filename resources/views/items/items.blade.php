<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Viewing All Users</h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center"> Image </th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Category</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <!-- Row -->
                    <tr>
                        <td class="align-middle text-center"><div class="p-1"><img src="{{ Storage::url($item->item_pic) }}" alt="user" width="50" height="50" class="rounded-circle">  </div></td>
                        <td class="align-middle text-center">{{ $item->name }}</td>
                        <td class="align-middle text-center">{{ ($item->category()->exists())?$item->category->name:"None" }}</td>
                        <td class="align-middle text-center">
                            <form action="{{route('item.destroy',$item->id)}}" method="post">
                                <button type="button" class="btn btn-cyan btn-sm">View Details</button>
                                <a href="{{ route('item.edit', $item->id) }}"><button type="button" class="btn btn-success btn-sm">Edit</button></a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                    </tr>
                @endforeach

                </tbody>
            </table>
            </div>

            <div class="row">
                <div class="col-sm-4 offset-md-4">
                    <div class="text-center">{{ $items->links() }}</div>
                </div>

            </div>

        </div>

    </div>
</div>
