@extends('front-end.master2')
@section('title')
    Checkout Page - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form s-->
                    <div class="checkout-form">
                        <div class="row row-40">
                            @if (Session::get('customerId'))
                                <div class="col-lg-5">
                                    <div class="row">
                                        <!-- Cart Total -->
                                        <div class="col-12">
                                            <div class="checkout-cart-total">
                                                <h2 class="checkout-title">YOUR ORDER</h2>
                                                <h4>Books <span>Sale Price</span></h4>
                                                {!! Form::open(['route'=>'complete-order', 'method'=>'POST']) !!}
                                                <ul>
                                                    @foreach($cartBooks as $cartBook)
                                                    <li><span class="left">{{$cartBook->name}}</span>
                                                        <span class="right">৳00.00</span>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                                <p>Sub Total <span>৳00.00</span></p>
                                                <p>Shipping Fee <span>৳00.00</span></p>
                                                <h4>Grand Total <span>৳00.00</span></h4>
                                                <button type="submit" class="place-order w-100" name="btn">Place order</button>
                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <h1 class="quick-title">Checkout</h1>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Returning customer?
                                            <a href="{{route('register-login')}}">Click
                                                here to login</a></p>
                                    </div>
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>New Customer?
                                            <a href="{{route('register-login')}}">
                                                Click here to register
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
