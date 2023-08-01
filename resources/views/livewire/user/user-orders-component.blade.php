<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All Orders</h5>

                        </div>

                        <div class="col-md-6">

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Order Id</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zipcode</th>
                                <th>status</th>
                                <th>OrderDate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->subtotal}}</td>
                                <td>{{$order->discount}}</td>
                                <td>{{$order->tax}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->zipcode}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{route('user.orderDetails',['order_id'=>$order->id])}}" class="btn btn-sm btn-info">Details</a>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    {{$orders->links()}}

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->

