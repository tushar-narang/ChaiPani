<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Viewing Currently Active Orders</h4>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">SR No.</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Order Info</th>
                    <th scope="col" class="text-center">Amount</th>
                    <th scope="col" class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <!-- Row -->
                    <tr>
                        <td scope="row" class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle text-center">{{ $order->user->name  }}</td>
                        <td class="align-middle text-center">
                            @foreach($order->items as $item)
                                {{ $item->item->name }} : {{ $item->quantity }}
                                <br/>
                            @endforeach

                        </td>
                        <td class="align-middle text-center">
                            {{ $order->amount }}
                        </td>
                        <td class="align-middle text-center">
                            @if($order->order_status == "NOT ACCEPTED")
                                <form action="{{route('order.accept',$order->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                </form>
                                <form action="{{route('order.decline',$order->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                </form>
                            @endif

                            @if($order->order_status == "ACCEPTED")
                                 <form action="{{route('order.complete',$order->id)}}" method="post">
                                     @csrf
                                     <button type="submit" class="btn btn-success btn-sm">Completed</button>
                                 </form>
                            @endif

                                @if($order->order_status == "READY")
                                    <form action="{{route('order.finish',$order->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Finished</button>
                                    </form>
                                @endif
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
