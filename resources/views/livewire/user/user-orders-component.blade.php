<div>
    <style>
        nav svag{
            height:20px;

        }
        nav.hidder{
            display:block !important;
        }
    </style>
  <div class="container" style="padding:30px 0;">

    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Orders
            </div>
            <div class="panel-body">
                @if(Session::has('message'))
                    <p class="alert alert-success" role="alert">{{Session::get('message')}}</p>
                @endif
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Subtotal</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>ORD_{{$order->id}}</td>
                                <td>{{$order->subtotal}}</td>
                                <td>{{$order->discount}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
    </div>
</div>
</div>
