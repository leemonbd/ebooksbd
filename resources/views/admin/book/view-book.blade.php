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
                                    <tr>
                                        <th>SL No.</th>
                                        <td>{{$book->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <td>{{$book->categoryName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Subcategory Name</th>
                                        <td>{{$book->subcategoryName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Name</th>
                                        <td>{{$book->bookName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Author Name</th>
                                        <td>{{$book->authorName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Price</th>
                                        <td>{{$book->bookPrice}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Quantity</th>
                                        <td>{{$book->bookQuantity}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Description</th>
                                        <td>{{$book->bookDescription}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Image</th>
                                        <td>
                                            {{$book->bookImage}}<br>
                                            <img src="{{asset($book->bookImage)}}" alt="bookImage" class="img-fluid" height="231px" width="150px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Book PDF</th>
                                        <td>{{$book->bookPdf}}<br>
                                            <iframe src="{{asset($book->bookPdf)}}"></iframe>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Publication Status</th>
                                        <td>
                                            @if($book->publicationStatus==1)
                                                <p class="text-info">Published</p>
                                            @else<p class="text-warning">Unpublished</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{$book->created_at}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div>
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection

