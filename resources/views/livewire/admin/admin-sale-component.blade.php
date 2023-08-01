<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Sale Setting</h5>

                        </div><!-- col-md-6 1-->

                    </div><!-- row -->

                </div><!-- panel-heading -->

                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success " role="alert">{{Session::get('message')}}
                    </div>

                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSale">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select name="status" id="" class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sale Date</label>
                            <div class="col-md-4">
                                <input type="text" id="sale_date" name="sale_date" placeholder="YYYY/MM/DD H:M:S"  class="form-control input-md" wire:model="sale_date" >

                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                            <input type="submit" value="Update" class="btn btn-success">
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
        $('#sale_date').datetimepicker({
            format:'YYYY-M-D H:m:s',
        })
        .on('dp.change',function(ev){
            var data=$('#sale_date').val();
            @this.set('sale_date',data);
        });

    });
</script>

@endpush
