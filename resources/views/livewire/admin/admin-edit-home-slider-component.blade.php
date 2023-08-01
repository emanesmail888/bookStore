<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Add New Slider</h5>

                        </div><!-- col-md-6 1-->
                        <div class="col-md-6">
                            <a href="{{route('admin.homeSlider')}}" class="btn btn-success pull-right">all Slides</a>


                        </div><!-- col-md-6 2-->
                    </div><!-- row -->

                </div><!-- panel-heading -->

                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success " role="alert">{{Session::get('message')}}
                    </div>

                    @endif



                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" name="title" placeholder="Title" id="" class="form-control input-md" wire:model="title" >

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">SubTitle</label>
                            <div class="col-md-4">
                                <input type="text" name="subtitle" placeholder="SubTitle" id="" class="form-control input-md" wire:model="subtitle" >

                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="text" name="price" placeholder="Price" id="" class="form-control input-md" wire:model="price" >

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Link</label>
                            <div class="col-md-4">
                                <input type="text" name="link" placeholder="Link" id="" class="form-control input-md" wire:model="link" >

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select name="status" id="" class="form-control" wire:model="status">
                                    <option value="0">InActive</option>
                                    <option value="1">Active</option>
                                </select>

                            </div>
                        </div><!-- form-group -->


                        <div class="form-group">
                            <label class="col-md-4 control-label"> image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="" class="form-control input-file input-md" wire:model="newImage">
                                @if ($newImage)
                                <img src="{{$newImage->temporaryUrl()}}" alt="">
                                @else
                                <img src="{{asset('assets/images/sliders')}}/{{$image}}" alt="">


                                @endif

                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                            <input type="submit" value="Add Book" class="btn btn-success">
                            </div>
                        </div><!-- form-group -->


                    </form>

                </div><!--panel-body  -->

            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
