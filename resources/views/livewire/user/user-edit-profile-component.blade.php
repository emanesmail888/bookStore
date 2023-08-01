<div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Edit Profile</h5>

                                </div>

                            </div><!-- row -->

                        </div><!--panel-heading  -->
                        <div class="panel-body">
                            <div class="col-md-4">

                                {{-- @if ($user->profile->image)
                                <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100%" alt="">
                                @else
                                <img src="{{asset('assets/images/profile/dummy.jpeg')}}" width="100%"  alt="">


                                @endif --}}


                                    @if ($newImage)
                                    <img src="{{$newImage->temporaryUrl()}}" width="100%" alt="">
                                    @elseif($user->profile->image)
                                    <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" alt="">
                                    @else
                                    <img src="{{asset('assets/images/profile/dummy.jpeg')}}" alt="">



                                    @endif





                            </div>


                            <div class="col-md-8">
                                @if (Session::has('message'))
                                <div class="alert alert-success " role="alert">{{Session::get('message')}}
                                </div>

                                @endif
                                <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProfile">
                                    <input type="file" name="image" id="" class="form-control input-file input-md" wire:model="newImage">

                                <p><b>Name:</b><input type="text" name="name" placeholder="Name" id="" class="form-control input-md" wire:model="name" >
                                </p>
                                <p><b>Email:</b>{{$user->email}}</p>
                                <p><b>Mobile:</b><input type="text" name="mobile" placeholder="mobile" id="" class="form-control input-md" wire:model="mobile" >
                                </p>
                                <p><b>City:</b><input type="text" name="city" placeholder="city" id="" class="form-control input-md" wire:model="city" >
                                </p>
                                <p><b>Line1:</b><input type="text" name="line1" placeholder="line1" id="" class="form-control input-md" wire:model="line1" >
                                </p>
                                <p><b>Line2:</b><input type="text" name="line2" placeholder="line2" id="" class="form-control input-md" wire:model="line2" >
                                </p>
                                <p><b>Province:</b><input type="text" name="province" placeholder="province" id="" class="form-control input-md" wire:model="province" >
                                </p>
                                <p><b>Country:</b><input type="text" name="country" placeholder="country" id="" class="form-control input-md" wire:model="country" >
                                </p>
                                <p><b>Zipcode:</b><input type="text" name="zipcode" placeholder="zipcode" id="" class="form-control input-md" wire:model="zipcode" >
                                </p>
                                <input type="submit" value="Update " class="btn btn-info pull-right">
                                </form>


                            </div>
                        </div><!-- panel-body -->


                    </div><!-- panel -->

                </div><!-- col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->

    </div>
    </div>
