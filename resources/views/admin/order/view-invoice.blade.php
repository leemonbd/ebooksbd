@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h2 class="h5 page-title"><small class="text-muted text-uppercase">Invoice</small><br />#1806</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-secondary">Print</button>
                            <button type="button" class="btn btn-primary">Pay</button>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body p-5">
                            <div class="row mb-5">
                                <div class="col-12 text-center mb-4">
                                    <img src="{{asset('/')}}admin/assets/images/logo.png" class="navbar-brand-img brand-md mx-auto mb-4" alt="logo">
                                    <h2 class="mb-0 text-uppercase">Invoice</h2>
                                    <p class="text-muted"> Altavista<br /> 9022dddd Suspendisse Rd. </p>
                                </div>
                                <div class="col-md-7">
                                    <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                                    <p class="mb-4">
                                        <strong>Islamic Pdf Books Bd</strong><br /> limoninfoo@gmail.com
                                    </p>
                                    <p>
                                        <span class="small text-muted text-uppercase">Invoice #</span><br />
                                        <strong>1806</strong>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                                    <p class="mb-4">
                                        <strong>{{$orderDetailss->firstName.' '.$orderDetailss->lastName}}</strong><br />{{$orderDetailss->email}}
                                    </p>
                                    <p>
                                        <small class="small text-muted text-uppercase">Due date</small><br />
                                        <strong>April, 20, 2020</strong>
                                    </p>
                                </div>
                            </div> <!-- /.row -->
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order No</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($z=1)
                                @foreach($orderDetails as $orderDetail)
                                <tr>
                                    <th scope="row">{{$z++}}</th>
                                    <td>{{$orderDetail->orderNumber}}</td>
                                    <td>{{$orderDetail->bookName}}</td>
                                    <td>{{$orderDetail->updated_at}}</td>
                                    <td>৳00.00</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="text-right mr-2">
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Subtotal : </span>
                                            <strong>৳00.00</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Shipping Cost : </span>
                                            <strong>৳00.00</strong>
                                        </p>
                                        <p class="mb-2 h6">
                                            <span class="text-muted">Total : </span>
                                            <span>৳00.00</span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>

@endsection
