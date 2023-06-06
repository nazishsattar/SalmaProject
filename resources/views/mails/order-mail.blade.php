<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation From Salma Super Market</title>
</head>
<body>
   <p>Hi {{$order->firstname}} {{$order->lastname}},</p>
   <p>Thank you for placing an order with us. </b></p>
   <p>We are excited for you to receive your Order No # <b>ORD_{{$order->id}}</b>.We will notify you once it’s on its way. We hope you had a great shopping experience with us.</p> 
   <br>
   <table style="width:600px;text-align:right"> 
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>      
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
              <tr>
                <td><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="100px"/></td>
                <td>{{$item->product->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price*$item->quantity}}</td>
                </tr>  
            @endforeach
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size=15px;font-weight:bold;border-top:1px solid #ccc;">Subtotal: {{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size=15px;font-weight:bold;">Shipping: Shipping Charges depend on distance</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td style="font-size=22px;font-weight:bold;">Total: {{$order->total}}</td>
            </tr>
        </tbody>
   </table>
</body>
</html>