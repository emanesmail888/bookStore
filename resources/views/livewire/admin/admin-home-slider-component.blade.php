<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All sliders</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.addHomeSlider')}}" class="btn btn-success pull-right">add New Slide</a>

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>image</th>
                                <th>id</th>
                                <th>title</th>
                                <th>subtitle</th>
                                <th>price</th>
                                <th>link</th>
                                <th>status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slide)
                            <tr>
                                <td><img src="{{asset('assets/images/sliders')}}/{{$slide->image}}" style="width: 50px;height:50px;" alt=""></td>
                                <td>{{$slide->id}}</td>
                                <td>{{$slide->title}}</td>
                                <td>{{$slide->subtitle}}</td>
                                <td>{{$slide->price}}</td>
                                <td>{{$slide->link}}</td>
                                <td>{{$slide->status==1?'Active':'Inactive'}}</td>
                                <td>{{$slide->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editHomeSlider',['slide_id'=>$slide->id])}}"><i class=" fa fa-edit fa-2x"></i></a>
                                    <a href="" wire:click.prevent="deleteSlide({{$slide->id}})"><i class=" fa fa-times fa-2x"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    {{$sliders->links()}}

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->


