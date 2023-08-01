
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All Attributes</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.add_attribute')}}" class="btn btn-success pull-right">add Attribute</a>

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th> Name</th>
                                <th> Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attributes as $attribute)
                            <tr>
                                <td>{{$attribute->id}}</td>
                                <td>{{$attribute->name}}</td>
                                <td>{{$attribute->created_at}}</td>
                               
                                <td>
                                    <a href="{{route('admin.edit_attribute',['attribute_id'=>$attribute->id])}}"><i class=" fa fa-edit fa-2x"></i></a>
                                    <a href=""onclick="confirm('Are You Sure, You Want to delete this attribute?')||event.stopImmediatePropagation()" wire:click.prevent="deleteattribute"><i class=" fa fa-times fa-2x"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    {{$attributes->links()}}

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
