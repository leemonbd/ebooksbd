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
                                    <h3 class="text-success" id="removeMessage">{{Session::get('message')}}</h3>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr role="row">
                                            <th>SL No.</th>
                                            <th>Category Id</th>
                                            <th>Sub-Category Id</th>
                                            <th>Book Name</th>
                                            <th>Book Author Name</th>
                                            <th>Book Price</th>
                                            <th>Book Quantity</th>
                                            <th>Publication Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{$book->id}}</td>
                                                <td>{{$book->categoryName}}</td>
                                                <td>{{$book->subcategoryName}}</td>
                                                <td>{{$book->bookName}}</td>
                                                <td>{{$book->authorName}}</td>
                                                <td>{{$book->bookPrice}}</td>
                                                <td>{{$book->bookQuantity}}</td>
                                                <td>
                                                    @if($book->publicationStatus==1)
                                                        <p class="text-info">Published</p>
                                                    @else<p class="text-warning">Unpublished</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item text-info-dark" href="{{route('view-books',['id'=>$book->id])}}">View</a>
                                                        <a class="dropdown-item text-success" href="{{route('edit-book',['id'=>$book->id])}}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{route('delete-books',['id'=>$book->id])}}">Remove</a>
                                                        @if($book->publicationStatus==1)
                                                            <a class="dropdown-item text-warning" href="{{route('unpublished-book',['id'=>$book->id])}}">Unpublished</a>
                                                        @else
                                                            <a class="dropdown-item text-info" href="{{route('published-book',['id'=>$book->id])}}">Published</a>
                                                        @endif
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

