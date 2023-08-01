<div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Add Book Attribute</h5>
        
                                </div><!-- col-md-6 1-->
                                <div class="col-md-6">
                                    <a href="{{route('admin.attributes')}}" class="btn btn-success pull-right">Show Attributes</a>
        
        
                                </div><!-- col-md-6 2-->
                            </div><!-- row -->
        
                        </div><!-- panel-heading -->
        
                        <div class="panel-body">
                            @if (Session::has('message'))
                            <div class="alert alert-success " role="alert">{{Session::get('message')}}
                            </div>
        
                            @endif
                            <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateAttribute">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Attribute Name</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" placeholder="Attribute Name" id="" class="form-control input-md" wire:model="name" >
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
        
                                        @enderror
                                    </div>
                                </div><!-- form-group -->
                            
        
        
                               
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                    <input type="submit" value="Add Attribute" class="btn btn-success">
                                    </div>
                                </div><!-- form-group -->
        
                            </form>
        
                        </div><!--panel-body  -->
        
                    </div><!-- panel -->
        
                </div><!-- col-md-12 -->
        
            </div><!-- row -->
        
        </div><!-- container -->
        </div></div>
