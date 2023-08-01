<div>
    <div class="container" style="padding: 30px 0px;">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Change Password</h5>

                            </div><!-- col-md-6 1-->

                        </div><!-- row -->

                    </div><!-- panel-heading -->

                    <div class="panel-body">
                        @if (Session::has('password_success'))
                        <div class="alert alert-success " role="alert">{{Session::get('password_success')}}
                        </div>
                        @elseif (Session::has('password_error'))
                        <div class="alert alert-danger " role="alert">{{Session::get('password_error')}}
                        </div>

                        @endif
                        <form class="form-horizontal"  wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Current Password </label>
                                <div class="col-md-4">
                                    <input type="password" name="current_password" placeholder="Current Password" id="" class="form-control input-md" wire:model="current_password" >
                                    @error('current_password')
                                    <p class="text-danger">{{$message}}</p>

                                    @enderror
                                </div>
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-md-4 control-label">New Password </label>
                                <div class="col-md-4">
                                    <input type="password" name="password" placeholder="New Password" id="" class="form-control input-md" wire:model="password" >
                                    @error('password')
                                    <p class="text-danger">{{$message}}</p>

                                    @enderror
                                </div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password </label>
                                <div class="col-md-4">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" id="" class="form-control input-md" wire:model="password_confirmation" >
                                    @error('password_confirmation')
                                    <p class="text-danger">{{$message}}</p>

                                    @enderror
                                </div>
                            </div><!-- form-group -->


                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                <input type="submit" value="Change Password" class="btn btn-success">
                                </div>
                            </div><!-- form-group -->

                        </form>

                    </div><!--panel-body  -->

                </div><!-- panel -->

            </div><!-- col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
    </div>
