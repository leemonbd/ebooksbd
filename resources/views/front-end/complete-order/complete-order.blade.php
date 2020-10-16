@extends('front-end.master2')
@section('title')
    Order Complete Page - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Order Complete</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="order-complete inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(count($cartBooks)==null)
                        <div class="order-complete-message text-center">
                            <h1 class="text-danger">Your order is empty !</h1>
                            <p class="text-danger">Please order some books.</p>
                        </div>
                    @else
                    <div class="order-complete-message text-center">
                        <h1>Thank you !</h1>
                        <p>Your order has been received.</p>
                    </div>
                    <h3 class="order-table-title">Order Details</h3>
                    <div class="table-responsive">
                        <table class="table order-details-table">
                            <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Book Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($cartBooks as $cartBook)
                                <tr>
                                    <td><p>#{{$cartBook->options->orderNumber}}</p></td>
                                    <td><p>{{$cartBook->name}}</p></td>
                                    <td><span>৳00.00</span></td>
                                </tr>
                            @endforeach
                            </tbody>


                            <thead>
                        </table>
                        <table class="table order-details-table">
                            <tfoot>
                            <tr>
                                <th>Subtotal:</th>
                                <td><span>৳00.00</span></td>
                            </tr>
                            <tr>
                                <th>Shipping Cost:</th>
                                <td>৳00.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><span>৳00.00</span></td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
