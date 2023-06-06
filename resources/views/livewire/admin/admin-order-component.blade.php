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
                <div class="row">
                    <div class="col-md-4">
                        All Orders
                    </div>
                   
                    <div class="col-md-4">
                        <label class="control-label pull-right" >Search Order By Date</label>
                    </div>  
                    <div class="col-md-4">
                        <input type="date" placeholder="Search......" class="form-control pull-right" wire:model="searchItem"/>
                    </div>
                   
                </div>
            </div>
            <div class="panel-body">
                @if(Session::has('order_message'))
                <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
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
                            {{-- <th>Shippingaddress</th> --}}
                            <th>Status</th>
                            <th>Order Date</th>
                            <th colspan="2" class="text-center">Action</th>
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
                                {{-- <td class="text-center">{{$order->is_shipping_address}}</td> --}}
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                            <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                        </ul>
                                    </div>
                                </td>
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
