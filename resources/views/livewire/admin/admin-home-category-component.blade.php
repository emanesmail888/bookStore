
<div>
   <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Home Categories

                </div><!-- panel-heading -->
                <div class="panel-body">

                </div><!-- panel-body -->
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>

                @endif
              <form  class="form-horizontal" wire:submit.prevent="updateHomeCategory" >
                <div class="form-group">
                    <label class="col-md-4 control-label">Choose Categories</label>
                    <div class="col-md-4"  wire:ignore>
                    <select class="sel_categories  "  name="categories[]" multiple="multiple" wire:model="selected_categories">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>
                   </div>
                 </div><!-- form-group -->

                <div class="form-group">
                    <label for="my-input" class="col-md-4 control-label">No Of Books </label>
                    <div class="col-md-4">
                   <input type="text" class="form-control input-md" wire:model="numberOfBooks" name="" id="">
                   </div>
                 </div><!-- form-group -->

                <div class="form-group">
                    <label for="my-input" class="col-md-4 control-label"> </label>
                    <div class="col-md-4">
                   <button type="submit" class=" btn  btn-primary " > Save</button>
                   </div>
                 </div><!-- form-group -->



              </form>

            </div>


        </div><!-- col-md-12 -->

    </div><!-- row -->





   </div><!-- container -->
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        $('.sel_categories').select2();
        $('.sel_categories').on('change',function(e){
            var data=$('.sel_categories').select2("val");
            @this.set('selected_categories',data);

        });


    });
</script>

@endpush
