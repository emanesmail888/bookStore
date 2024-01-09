<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Edit New Book</h5>

                        </div><!-- col-md-6 1-->
                        <div class="col-md-6">
                            <a href="{{route('admin.books')}}" class="btn btn-success pull-right">all books</a>


                        </div><!-- col-md-6 2-->
                    </div><!-- row -->

                </div><!-- panel-heading -->

                <div class="panel-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success " role="alert">{{Session::get('message')}}
                    </div>

                    @endif



                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateBook">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Book Name</label>
                            <div class="col-md-4">
                                <input type="text" value="" name="name" placeholder="Book Name" id="" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Book Slug</label>
                            <div class="col-md-4">
                                <input type="text" name="slug" placeholder="Book Slug" id="" class="form-control input-md" wire:model="slug" >
                                @error('slug')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description</label>
                            <div class="col-md-4">
                                <input type="text" name="description" placeholder="Description" id="" class="form-control input-md" wire:model="description" >
                                @error('description')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <input type="text" name="price" placeholder="Price" id="" class="form-control input-md" wire:model="price" >
                                @error('price')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text" name="sale_Price" placeholder="sale_price" id="" class="form-control input-md" wire:model="sale_price" >
                                @error('sale_price')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Stock</label>
                            <div class="col-md-4">
                                <select name="stock_status" id="" class="form-control" wire:model="stock_status">
                                    <option value="instock">InStock</option>
                                    <option value="outofstock">OutOfStock</option>
                                </select>
                                @error('stock_status')
                                <p class="text-danger">{{$message}}</p>

                                @enderror

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select name="featured" id="" class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text" name="sale_Price" placeholder="quantity" id="" class="form-control input-md" wire:model="quantity" >
                                @error('quantity')
                                <p class="text-danger">{{$message}}</p>

                                @enderror

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Book image</label>
                            <div class="col-md-4">
                                <input type="file" name="image" id="" class="form-control input-file input-md" wire:model="newImage">
                                @error('image')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                                @if ($newImage)
                                <img src="{{$newImage->temporaryUrl()}}" alt="">
                                @else
                                <img src="{{asset('assets/images/books')}}/{{$image}}" alt="">


                                @endif

                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                    <option value="">Select Category</option>
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
                            <label class="col-md-4 control-label">Subcategory</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="scategory_id">
                                    <option value="0">Select Subcategory</option>
                                    @foreach ($scategories as $scategory)
                                    <option value="{{$scategory->id}}">{{$scategory->name}}</option>

                                    @endforeach
                                </select>
                                @error('scategory_id')
                                <p class="text-danger">{{$message}}</p>

                                @enderror

                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Book Attributes</label>
                            <div class="col-md-3">
                                <select name="" id="" class="form-control" wire:model="attr">
                                    <option  value="0">Select Attribute</option>
                                    @foreach ($battributes as $battribute)
                                    <option value="{{$battribute->id}}">{{$battribute->name}}</option>

                                    @endforeach
                                </select>
                                @error('attr')
                                <p class="text-danger">{{$message}}</p>

                                @enderror

                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-info" wire:click.prevent="add()">Add</button>
                            </div>
                        </div><!-- form-group -->



                        @foreach ($inputs as $key=>$value)
                         <div class="form-group">
                                <label class="col-md-4 text-right {{$battributes->where('id',$attribute_arr[$key])->first()->name}}"></label>
                                <div class="col-md-3">
                                    <input type="text"  placeholder=" {{$battributes->where('id',$attribute_arr[$key])->first()->name}}" id="" class="form-control input-md" wire:model="attribute_values.{{$value}}" >
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>

                                </div>



                        </div><!-- form-group -->
                        @endforeach
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                            <input type="submit" value="Update Book" class="btn btn-success">
                            </div>
                        </div><!-- form-group -->


                    </form>

                </div><!--panel-body  -->

            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->

































