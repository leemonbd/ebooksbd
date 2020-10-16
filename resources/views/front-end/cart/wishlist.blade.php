@extends('front-end.master3')
@section('title')
    Wishlist Page - Islamic E-Book BD
@endsection

@section('body3')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Cart Page Start -->
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if(count($wishlistBooks)==null)
                            <div class="order-complete-message text-center text-danger">
                                <h1 class="text-danger">Your Wishlist is empty !</h1>
                                <p>Please add some books in Wishlist.</p>
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
                                    @php($z=1)
                                    @foreach($wishlistBooks as $wishlistBook)
                                    <tr>
                                        <td>{{$z++}}</td>
                                        <td class="pro-thumbnail"><a href="#"><img
                                                    src="{{asset($wishlistBook->options->image)}}" alt="book image" class="img-fluid"></a>
                                        </td>
                                        <td class="pro-title"><a href="#">{{$wishlistBook->name}}</a></td>
                                        <td class="pro-title"><a href="#">{{$wishlistBook->options->authorName}}</a></td>
                                        <td class="pro-price"><span>৳{{$wishlistBook->price}}</span></td>
                                        <td class="pro-price"><span>100%</span></td>
                                        <td class="pro-subtotal"><span>৳0.00</span></td>
                                        <td class="pro-remove"><a href="{{route('delete-wishlist-item',['rowId'=>$wishlistBook->rowId])}}"><i class="far fa-trash-alt"></i></a></td>
                                    </tr>
                                    @endforeach
                                    <!-- Product Row -->
                                    <!-- Discount Row  -->
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

