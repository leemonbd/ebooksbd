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
                                        <td>{{$orderDetails->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Id</th>
                                        <td>{{$orderDetails->customerId}}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>{{$orderDetails->firstName.' '.$orderDetails->lastName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Id</th>
                                        <td>{{$orderDetails->bookId}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Name</th>
                                        <td>{{$orderDetails->bookName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Author Name</th>
                                        <td>{{$orderDetails->authorName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Price</th>
                                        <td>{{$orderDetails->bookPrice}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Quantity</th>
                                        <td>{{$orderDetails->bookQuantity}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$orderDetails->status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Book Image</th>
                                        <td>
                                            {{$orderDetails->bookImage}}<br>
                                            <img src="{{asset($orderDetails->bookImage)}}" alt="bookImage" class="img-fluid" height="231px" width="150px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Book PDF</th>
                                        <td>{{$orderDetails->bookPdf}}<br>
                                            <iframe src="{{asset($orderDetails->bookPdf)}}"></iframe>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>
                                            {{$orderDetails->created_at}}
                                        </td>
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

