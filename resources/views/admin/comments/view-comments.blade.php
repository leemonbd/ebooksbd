@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <a href="{{route('truncate-comments')}}"><button class="btn btn-danger">Delete All Comments</button></a>
                                <h3 class="text-success mt-2" id="removeMessage">{{Session::get('message')}}</h3>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr role="row">
                                        <th>SL No.</th>
                                        <th>Book Id</th>
                                        <th>Customer Id</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer Comments</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($viewComments as $viewComment)
                                        <tr>
                                            <td>{{$viewComment->id}}</td>
                                            <td>{{$viewComment->book_id}}</td>
                                            <td>{{$viewComment->customer_id}}</td>
                                            <td>{{$viewComment->customer_name}}</td>
                                            <td>{{$viewComment->customer_email}}</td>
                                            <td>{{$viewComment->customer_comment}}</td>
                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item text-danger" href="{{route('remove-comments',['id'=>$viewComment->id])}}">Remove</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection

