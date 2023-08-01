<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Add New Category</h5>

                        </div><!-- col-md-6 1-->
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">Show Categories</a>


                        </div><!-- col-md-6 2-->
                    </div><!-- row -->

                </div><!-- panel-heading -->

                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success " role="alert">{{Session::get('message')}}
                    </div>

                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="storeCategory">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" placeholder="Category Name" id="" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category Slug</label>
                            <div class="col-md-4">
                                <input type="text" name="slug" placeholder="Category Slug" id="" class="form-control input-md" wire:model="slug" >
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="" class="form-control input-file input-md" wire:model="image">
                                @error('image')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->


                        <div class="form-group">
                            <label class="col-md-4 control-label"> Parent Category</label>
                            <div class="col-md-4">

                               <select name="" class="form-control input-md" wire:model="category_id">
                                <option value="">Non</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach

                               </select>

                               @error('category_id')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                            <input type="submit" value="Add Category" class="btn btn-success">
                            </div>
                        </div><!-- form-group -->

                    </form>

                </div><!--panel-body  -->

            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->
