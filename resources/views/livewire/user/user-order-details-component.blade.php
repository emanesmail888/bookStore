<div class="container">


    <div class="row">
        @if (Session::has('order_message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('order_message')}}

        </div>

        @endif
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">My orders</a>
                            @if ($order->status=='ordered')
                            <a href="#" class="btn btn-warning pull-right" style="margin-right: 20px;" wire:click.prevent="cancelOrder">cancel Order</a>
                            @endif


                        </div>

                    </div><!-- row -->

                </div>
                <!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $order->id }}</td>

                                <th>OrderDate</th>
                                <td>{{ $order->created_at }}</td>


                                <th>status</th>
                                <td>{{ $order->status }}</td>
                                @if($order->status =="delivered")

                                <th>Delivery Date</th>
                                <td>{{ $order->delivered_date }}</td>
                                @elseif ($order->status =="cancelled")
                                <th>cancelled Date</th>
                                <td>{{ $order->cancelled_date }}</td>
                                @endif


                            </tr>


                    </table>

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Ordered Items</h5>

                        </div>



                    </div><!-- row -->

                </div>
                <!--panel-heading  -->
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
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->discount }}</td>
                                <td>{{ $order->tax }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->firstname }}</td>
                                <td>{{ $order->lastname }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->zipcode }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>


                            </tr>

                        </tbody>

                    </table>

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h5>Shipping Details</h5>



                </div>
                <!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody class="thead-light">
                            <tr>

                                <th>FirstName</th>
                                <td>{{ $order->firstname }}</td>
                                <th>LastName</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>

                            <tr>

                                <th>mobile</th>
                                <td>{{ $order->mobile }}</td>
                                <th>email</th>
                                <td>{{ $order->email }}</td>
                            </tr>

                            <tr>

                                <th>line1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>line2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>

                            <tr>

                                <th>city</th>
                                <td>{{ $order->city }}</td>
                                <th>country</th>
                                <td>{{ $order->country }}</td>
                            </tr>
                            <tr>

                                <th>province</th>
                                <td>{{ $order->province }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>


                        </tbody>



                    </table>

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->


    @if ($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h5>Shipping Details</h5>



                    </div>
                    <!--panel-heading  -->
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>

                                    <th>FirstName</th>
                                    <td>{{ $order->shipping->firstname }}</td>
                                    <th>LastName</th>
                                    <td>{{ $order->shipping->lastname }}</td>
                                </tr>

                                <tr>

                                    <th>mobile</th>
                                    <td>{{ $order->shipping->mobile }}</td>
                                    <th>email</th>
                                    <td>{{ $order->shipping->email }}</td>
                                </tr>

                                <tr>

                                    <th>line1</th>
                                    <td>{{ $order->shipping->line1 }}</td>
                                    <th>line2</th>
                                    <td>{{ $order->shipping->line2 }}</td>
                                </tr>
                                <tr>

                                    <th>city</th>
                                    <td>{{ $order->shipping->city }}</td>
                                    <th>country</th>
                                    <td>{{ $order->shipping->country }}</td>
                                </tr>
                                <tr>

                                    <th>province</th>
                                    <td>{{ $order->shipping->province }}</td>
                                    <th>Zipcode</th>
                                    <td>{{ $order->shipping->zipcode }}</td>
                                </tr>


                            </thead>



                        </table>

                    </div><!-- panel-body -->


                </div><!-- panel -->

            </div><!-- col-md-12 -->

        </div><!-- row -->
    @endif


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h5>Billing Details</h5>



                </div>
                <!--panel-heading  -->

                <div class="panel-body">

                    <div class="wrap-item-in-cart">

                        <div class="table-responsive cart_info">

                            <table class="table table-condensed">
                                {{-- <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Image</td>
                                        <td class="slug">slug</td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="total">Total</td>
                                    </tr>

                                </thead> --}}

                                @foreach ($order->orderItems as $item)
                                    <tbody>
                                        <tr>
                                            <td class="cart">

                                                <div class="product-image">
                                                    <figure><img
                                                            src="{{ asset('assets/images/books') }}/{{ $item->book->image }}"
                                                            alt="{{ $item->book->name }}"
                                                            style="height: 50px; width:50px;">
                                                    </figure>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <p>${{ $item->book->slug }}</p>
                                            </td>
                                            @if($item->options)
                                            <td class="product-name">
                                                @foreach(unserialize($item->options) as $key=>$value )
                                                <p><b>{{$key}}</b>{{$value}}</p>

                                                @endforeach
                                            </td>
                                            @endif
                                            <td class="cart_price">
                                                <p>${{ $item->price }}</p>
                                            </td>
                                            <td class="cart_price">
                                                <p>${{ $item->quantity }}</p>
                                            </td>

                                            <td class="cart_total">
                                                <p class="cart_total_price">${{ $item->price * $item->quantity }}
                                                </p>
                                            </td>
                                            <td class="cart_total">
                                                @if ($order->status=='delivered'&& $item->rstatus==false)
                                                <div class="price-field sub-total">
                                                    <p class="cart_total_price"> <a href="{{route('user.review',['order_item_id'=>$item->id])}}">write Review</a>
                                                    </p>
                                                </div>

                                                @endif

                                            </td>

                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>

                        </div>

                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b
                                        class="index">${{ $order->subtotal }}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b
                                        class="index">${{ $order->tax }}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free
                                        Shipping</b>
                                </p>
                                <p class="summary-info total-info "><span class="title">Total</span><b
                                        class="index">{{ $order->total }}</b></p>
                                </div>

                        </div>


                    </div>
                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h5>transaction Details</h5>



                </div>
                <!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>

                                <th>Transaction Mode</th>
                                <td>{{ $order->transaction->mode }}</td>

                            </tr>

                            <tr>

                                <th>status</th>
                                <td>{{ $order->transaction->status }}</td>

                            </tr>

                            <tr>

                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>

                            </tr>
                        </tbody>







                    </table>

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->






</div>
