<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5> Profile</h5>

                            </div>

                        </div><!-- row -->

                    </div><!--panel-heading  -->
                    <div class="panel-body">
                        <div class="col-md-4">
                            @if ($user->profile->image)
                            <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100%" alt="">
                            @else
                            <img src="{{asset('assets/images/profile/dummy.jpeg')}}" width="100%" alt="">


                            @endif

                        </div>


                        <div class="col-md-8">
                            <p><b>Name:</b>{{$user->name}}</p>
                            <p><b>Email:</b>{{$user->email}}</p>
                            <p><b>Mobile:</b>{{$user->mobile}}</p>
                            <p><b>City:</b>{{$user->city}}</p>
                            <p><b>Line1:</b>{{$user->line1}}</p>
                            <p><b>Line2:</b>{{$user->line2}}</p>
                            <p><b>Province:</b>{{$user->province}}</p>
                            <p><b>Country:</b>{{$user->country}}</p>
                            <p><b>Zipcode:</b>{{$user->zipcode}}</p>

                        </div>

                        <a href="{{route('user.editProfile')}}" class="btn btn-info pull-right">update Profile</a>

                    </div><!-- panel-body -->


                </div><!-- panel -->

            </div><!-- col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->

</div>
