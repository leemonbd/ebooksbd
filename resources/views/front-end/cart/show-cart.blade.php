@extends('front-end.master2')
@section('title')
    Cart Page - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="route{{'/'}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Cart Page Start -->
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(count($cartBooks)==null)
                            <div class="order-complete-message text-center text-danger">
                                <h1 class="text-danger">Your Cart is empty !</h1>
                                <p>Please add some books in cart.</p>
                            </div>
                        @else
                        <form action="#" class="">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <!-- Head Row -->
                                    <thead>
                                    <tr>
                                        <th class="pro-remove">SL No.</th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Book Name</th>
                                        <th class="pro-price">Author Name</th>
                                        <th class="pro-quantity">Price</th>
                                        <th class="pro-quantity">Discount</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Product Row -->
                                    @php($j=1)
                                    @foreach($cartBooks as $cartBook)
                                    <tr>
                                        <td>{{$j++}}</td>
                                        <td class="pro-thumbnail"><a href="#"><img
                                                    src="{{asset($cartBook->options->image)}}" alt="book image" class="img-fluid"></a>
                                        </td>
                                        <td class="pro-title"><a href="#">{{$cartBook->name}}</a></td>
                                        <td class="pro-title"><a href="#">{{$cartBook->options->authorName}}</a></td>
                                        <td class="pro-price"><span>৳{{$cartBook->price}}</span></td>
                                        <td class="pro-price"><span>100%</span></td>
                                        <td class="pro-subtotal"><span>৳0.00</span></td>
                                        <td class="pro-remove"><a href="{{route('delete-cart-item',['rowId'=>$cartBook->rowId])}}"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                    <!-- Product Row -->
                                    <!-- Discount Row  -->
                                    <tr>
                                        <td colspan="8" class="actions">
                                            <div class="cart-section-2">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                                                        </div>
                                                        <!-- Cart Summary -->
                                                        <div class="col-lg-6 col-12 d-flex">
                                                            <div class="cart-summary">
                                                                <div class="cart-summary-wrap">
                                                                    <h4><span>Cart Summary</span></h4>
                                                                    <p>Sub Total <span class="text-primary">৳0.00</span></p>
                                                                    <p>Shipping Cost <span class="text-primary">৳0.00</span></p>
                                                                    <h2>Grand Total <span class="text-primary">৳0.00</span></h2>
                                                                </div>
                                                                <div class="cart-summary-button">
                                                                    <a href="{{route('checkout')}}" class="checkout-btn c-btn btn--primary">Checkout</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

