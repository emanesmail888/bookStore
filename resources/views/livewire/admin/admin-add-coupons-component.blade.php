<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Add New Coupon</h5>

                        </div><!-- col-md-6 1-->
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">Show Coupons</a>


                        </div><!-- col-md-6 2-->
                    </div><!-- row -->

                </div><!-- panel-heading -->

                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success " role="alert">{{Session::get('message')}}
                    </div>

                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="storeCoupon">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Coupon Code</label>
                            <div class="col-md-4">
                                <input type="text" name="code" placeholder="Coupon Code" id="" class="form-control input-md" wire:model="code">
                                @error('code')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Coupon Type</label>
                            <div class="col-md-4">
                                <select name="type" id="" class="form-control" wire:model="type">
                                    <option value="">Select</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                               @error('type')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Coupon Value</label>
                            <div class="col-md-4">
                                <input type="text" name="value" placeholder="Coupon Value" id="" class="form-control input-md" wire:model="value">
                                @error('value')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cart Value</label>
                            <div class="col-md-4">
                                <input type="text" name="cart_value" placeholder="Cart Value" id="" class="form-control input-md" wire:model="cart_value">
                                @error('cart_value')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Expiry Date</label>
                            <div class="col-md-4 " wire:ignore>
                                <input type="text" name="expiry_date" placeholder="Expiry Date" id="expiry_date" class="form-control input-md" wire:model="expiry_date">
                                @error('expiry_date')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                            <input type="submit" value="Add Coupon" class="btn btn-success">
                            </div>
                        </div><!-- form-group -->

                    </form>

                </div><!--panel-body  -->

            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
@push('scripts')
<script>
    $(function(){
        $('#expiry_date').datetimepicker({
            format:'YYYY-M-D H:m:s',
        })
        .on('dp.change',function(ev){
            var data=$('#expiry_date').val();
            @this.set('expiry_date',data);
        });

    });
</script>

@endpush
