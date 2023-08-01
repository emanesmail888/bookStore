<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>All Books</h5>

                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.addBook')}}" class="btn btn-success pull-right">add book</a>

                        </div>

                    </div><!-- row -->

                </div><!--panel-heading  -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>image</th>
                                <th>id</th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>stock</th>
                                <th>price</th>
                                <th>category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td><img src="{{asset('assets/images/books')}}/{{$book->image}}" style="width: 50px;height:50px;" alt=""></td>
                                <td>{{$book->id}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->slug}}</td>
                                <td>{{$book->stock_status}}</td>
                                <td>{{$book->price}}</td>
                                <td>{{$book->category->name}}</td>
                                <td>{{$book->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editBook',['book_slug'=>$book->slug])}}"><i class=" fa fa-edit fa-2x"></i></a>
                                    <a href="" onclick="confirm('Are You Sure, You Want to delete this Book?')||event.stopImmediatePropagation()" wire:click.prevent="deleteBook({{$book->id}})"><i class=" fa fa-times fa-2x"></i></a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                    {{$books->links()}}

                </div><!-- panel-body -->


            </div><!-- panel -->

        </div><!-- col-md-12 -->

    </div><!-- row -->

</div><!-- container -->

