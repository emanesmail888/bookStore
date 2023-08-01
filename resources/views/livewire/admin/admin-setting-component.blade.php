<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Settings</h5>
    
                            </div><!-- col-md-6 1-->
                            <div class="col-md-6">
    
    
                            </div><!-- col-md-6 2-->
                        </div><!-- row -->
    
                    </div><!-- panel-heading -->
    
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success " role="alert">{{Session::get('message')}}
                        </div>
    
                        @endif
    
    
    
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="saveSettings">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="email" name="email" placeholder="Email" id="" class="form-control input-md" wire:model="email" >
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">phone</label>
                                <div class="col-md-4">
                                    <input type="text" name="phone" placeholder="phone" id="" class="form-control input-md" wire:model="phone" >
                                    @error('phone')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">phone2</label>
                                <div class="col-md-4">
                                    <input type="text" name="phone2" placeholder="phone2" id="" class="form-control input-md" wire:model="phone2" >
                                    @error('phone2')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" name="address" placeholder="Address" id="" class="form-control input-md" wire:model="address" >
                                    @error('address')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Map</label>
                                <div class="col-md-4">
                                    <input type="text" name="map" placeholder="Map" id="" class="form-control input-md" wire:model="map" >
                                    @error('map')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Twitter</label>
                                <div class="col-md-4">
                                    <input type="text" name="twitter" placeholder="Twitter" id="" class="form-control input-md" wire:model="twitter" >
                                    @error('twitter')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Facebook</label>
                                <div class="col-md-4">
                                    <input type="text" name="facebook" placeholder="Facebook" id="" class="form-control input-md" wire:model="facebook" >
                                    @error('facebook')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">pinterest</label>
                                <div class="col-md-4">
                                    <input type="text" name="pinterest" placeholder="pinterest" id="" class="form-control input-md" wire:model="pinterest" >
                                    @error('pinterest')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Instagram</label>
                                <div class="col-md-4">
                                    <input type="text" name="instagram" placeholder="Instagram" id="" class="form-control input-md" wire:model="instagram" >
                                    @error('instagram')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Youtube</label>
                                <div class="col-md-4">
                                    <input type="text" name="youtube" placeholder="Youtube" id="" class="form-control input-md" wire:model="youtube" >
                                    @error('youtube')
                                    <p class="text-danger">{{$message}}</p>
    
                                    @enderror
    
                                </div>
                            </div><!-- form-group -->
                           
                           
                          
                            
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                <input type="submit" value="Save" class="btn btn-success">
                                </div>
                            </div><!-- form-group -->
    
    
                        </form>
    
                    </div><!--panel-body  -->
    
                </div><!-- panel -->
    
            </div><!-- col-md-12 -->
    
        </div><!-- row -->
    
    </div><!-- container -->
    
    
    
</div>
