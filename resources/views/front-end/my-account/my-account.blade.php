@extends('front-end.master2')
@section('title')
    My Account - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="page-section inner-page-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                                <img src="{{asset($customer->profileImage)}}" alt="profileImage" class="img-fluid" >
                            <a href="#dashboad" class="active" data-toggle="tab"><i
                                    class="fas fa-tachometer-alt"></i>
                                Dashboard</a>
                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                            <a href="#download" data-toggle="tab"><i class="fas fa-download"></i> Download</a>
                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                                Details</a>
                            <a href="#" onclick="document.getElementById('customerLogoutForm').submit()"><i class="fas fa-sign-out-alt"></i> Logout
                                {!! Form::open(['route'=>'customer-logout', 'method'=>'POST', 'id'=>'customerLogoutForm']) !!}

                                {!! Form::close() !!}
                            </a>

                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                        <p>Hello, <strong>{{$customer->lastName}}</strong></p>
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                        your recent orders, edit your password and account details. You will
                                        also get invoice, able to download your pdf books within short time,
                                        when admin approved your status.
                                    </p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        @if(count($orderDetails)==null)
                                            <div class="order-complete-message text-center">
                                                <h1 class="text-danger">Your order is empty !</h1>
                                                <p class="text-danger">Please order some books.</p>
                                            </div>
                                        @else
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Book Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Invoice</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td>#{{$orderDetail->orderNumber}}</td>
                                                <td>{{$orderDetail->bookName}}</td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($orderDetail->updated_at)->isoFormat('MMM Do, YYYY')}}

                                                </td>
                                                <td>{{$orderDetail->status}}</td>
                                                <td>TK.0</td>
                                                @if($orderDetail->status=='Approved')
                                                <td>
                                                    <a href="{{route('download-invoice',['id'=>$orderDetail->customerId])}}" class="btn">View Invoice</a>
                                                </td>
                                                @else
                                                    <td class="text-muted">
                                                        Available Soon
                                                    </td>
                                                @endif

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        @if(count($orderDetails)==null)
                                            <div class="order-complete-message text-center">
                                                <h1 class="text-danger">Nothings to download !</h1>
                                                <p class="text-danger">Please order some books.</p>
                                            </div>
                                        @else
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{$orderDetail->bookName}}</td>
                                                <td>{{ \Carbon\Carbon::parse($orderDetail->updated_at)->isoFormat('MMM Do, YYYY')}}</td>
                                                <td>Yes</td>
                                                @if($orderDetail->status=='Approved' && \Carbon\Carbon::parse($orderDetail->updated_at)->addDay(1))
                                                    <td>
                                                        <a href="{{route('download-book',['id'=>$orderDetail->id])}}" class="btn">
                                                            Download File
                                                        </a>
                                                    </td>
                                                @else
                                                    @if(\Carbon\Carbon::parse($orderDetail->updated_at)->addDay(1))
                                                        <td class="text-muted">
                                                            Available Soon
                                                        </td>
                                                    @else
                                                        <td class="text-muted">
                                                            Expired
                                                        </td>
                                                    @endif
                                                @endif
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                        {!! Form::open(['route'=>'update-customer-info', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                                        <div class="col-lg-12 col-12  mb--30">
                                            <h5 class="text-success">{{Session::get('editMessage')}}</h5>
                                        </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="firstName" type="text" name="firstName" value="{{$customer->firstName}}">
                                                    <input id="id" type="hidden" name="id" value="{{$customer->id}}">
                                                </div>
                                                <div class="col-lg-6 col-12  mb--30">
                                                    <input id="lastName"  type="text" name="lastName" value="{{$customer->lastName}}" >
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="email" type="email" name="email" value="{{$customer->email}}">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="password" type="password" name="password" value="{{$customer->password}}">
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <input id="profileImage" type="file" name="profileImage" value="{{$customer->profileImage}}">
                                                    <img src="{{asset($customer->profileImage)}}" alt="profileImage" class="img-fluid" height="100" width="100">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn--primary" name="btn" id="btn">Save Changes</button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
        <hr>
    </div>

    </div>

@endsection
