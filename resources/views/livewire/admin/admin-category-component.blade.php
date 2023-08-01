<style>
    .sclist{
        list-style: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All Categories</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.addCategory')}}" class="btn btn-success pull-right">add Category</a>

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>image</th>
                                <th>id</th>
                                <th>category Name</th>
                                <th>slug</th>
                                <th>subCategory</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td><img src="{{asset('assets/images/categories')}}/{{$category->image}}" style="width: 50px;height:50px;" alt=""></td>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <ul class="sclist">
                                        @foreach ($category->subCategories as $scategory)
                                        <li><i class="fa fa-caret-right"></i> {{$scategory->name}}
                                            <a href="{{route('admin.editCategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}"><i class="fa fa-edit"></i></a>
                                            <a href="" onclick="confirm('Are You Sure, You Want to delete this subCategory?')||event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{$scategory->id}})"><i class=" fa fa-times "></i></a>

                                        </li>

                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{route('admin.editCategory',['category_slug'=>$category->slug])}}"><i class=" fa fa-edit fa-2x"></i></a>
                                    <a href=""onclick="confirm('Are You Sure, You Want to delete this Category?')||event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})"><i class=" fa fa-times fa-2x"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    {{$categories->links()}}

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
