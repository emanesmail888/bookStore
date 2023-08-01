<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                                <h5>Contact Message</h5>



                    </div><!--panel-heading  -->
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td> {{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->comment}}</td>
                                    <td>{{$contact->created_at}}</td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{$contacts->links()}}

                    </div><!-- panel-body -->


                </div><!-- panel -->

            </div><!-- col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
    </div>
