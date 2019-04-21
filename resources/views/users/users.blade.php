<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Viewing All Users</h4>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Roll No</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Total Sales</th>
                    <th scope="col" class="text-center">Fines</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <!-- Row -->
                    <tr>
                        <th scope="row" class="align-middle text-center">{{ $user->roll_no }}</th>
                        <td class="align"><div class="p-1"><img src="{{ $user->profile_pic }}" alt="user" width="35" height="35" class="rounded-circle">  <span style="margin-left: 5px;">{{ $user->name }}</span></div></td>
                        <td class="align-middle text-center"><p class="text-success">{{ $user->orders()->count() }}</p></td>
                        <td class="align-middle text-center"><p class="text-danger">{{ $user->fine }}</p></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
