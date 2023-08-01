<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All Coupons</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.addCoupon')}}" class="btn btn-success pull-right">add Coupon</a>

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>value</th>
                                <th>cart_value</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->code}}</td>

                                @if ($coupon->type=='fixed')
                                <td>${{$coupon->value}}</td>
                                @else
                                <td>{{$coupon->value}}%</td>
                                @endif

                                <td>{{$coupon->value}}</td>
                                <td>{{$coupon->cart_value}}</td>
                                <td>{{$coupon->expiry_date}}</td>
                                <td>
                                    <a href="{{route('admin.editCoupon',['coupon_id'=>$coupon->id])}}"><i class=" fa fa-edit fa-2x"></i></a>
                                    <a href=""onclick="confirm('Are You Sure, You Want to delete this Coupon?')||event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})"><i class=" fa fa-times fa-2x"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
