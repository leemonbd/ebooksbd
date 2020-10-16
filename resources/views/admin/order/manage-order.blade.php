@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Striped rows -->
                        <div class="col-md-8  my-4" style="margin: auto">
                            <div class="card shadow text-center" >
                                <div class="card-body">
                                    <h3 class="text-success" id="removeMessage">{{Session::get('message')}}</h3>
                                    <table class="table table-bordered table-responsive"  >
                                        <thead>
                                        <tr role="row">
                                            <th>SL No.</th>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Book Id</th>
                                            <th>Order No.</th>
                                            <th>Order Date</th>
                                            <th>Update Status</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{$orderDetail->id}}</td>
                                                <td>{{$orderDetail->customerId}}</td>
                                                <td>{{$orderDetail->firstName.' '.$orderDetail->lastName}}</td>
                                                <td>{{$orderDetail->bookId}}</td>
                                                <td>#{{$orderDetail->orderNumber}}</td>
                                                <td>{{$orderDetail->created_at}}</td>
                                                <td>{{$orderDetail->status}}</td>
                                                <td>
                                                    {!! Form::open(['route'=>'status-update', 'method'=>'POST']) !!}
                                                    <select name="statusUpdate">
                                                        <option value="Pending">--Select Status--</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="On Hold">On Hold</option>
                                                        <option value="Approved">Approved</option>
                                                    </select>
                                                    <input type="hidden" name="id" value="{{$orderDetail->id}}">
                                                    <input type="submit" class="btn btn-primary btn-block btn-sm" value="Update">
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item text-success" href="{{route('order-details',['id'=>$orderDetail->id])}}">Order Details</a>
                                                        <a class="dropdown-item text-warning" href="{{route('view-invoice',['id'=>$orderDetail->customerId])}}">Order Invoice</a>
                                                        <a class="dropdown-item text-info" href="{{route('download-invoice',['id'=>$orderDetail->customerId])}}">Download Invoice</a>
                                                        <a class="dropdown-item text-danger" href="{{route('order-remove',['id'=>$orderDetail->id])}}" onclick="return confirm('Are you sure, you want to delete this order!!')">Order Remove</a>
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
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection

