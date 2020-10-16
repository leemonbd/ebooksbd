@extends('front-end.master2')
@section('title')
    Author Page - Islamic E-Book BD
@endsection
@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Books</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="shop-toolbar mb--30">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            {{--<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>--}}
                            <a href="#" class="sorting-btn active" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                            </a>
                            <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">

                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">

                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">

                    </div>
                </div>
            </div>
            <div class="shop-toolbar d-none">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            {{--<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>--}}
                            <a href="#" class="sorting-btn active" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                            </a>
                            <a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">

                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">

                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">

                    </div>
                </div>
            </div>
            <div class="shop-product-wrap grid-four with-pagination row space-db--30 shop-border">
                @foreach($books as $book)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-card">
                            <div class="product-grid-content">
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{asset($book->bookImage)}}" class="img-fluid" alt="">
                                        <div class="hover-contents">
                                            <a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}" class="hover-image">
                                                <img src="{{asset($book->bookImage)}}" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('add-cart',['id'=>$book->id])}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="{{route('add-wishlist',['id'=>$book->id])}}" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}"
                                                   class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">৳0.00</span>
                                        <del class="price-old">৳{{$book->bookPrice}}</del>
                                        <span class="price-discount">100%</span>
                                    </div>
                                    <div class="product-header">
                                        <a href="" class="author">
                                            {{$book->authorName}}
                                        </a>
                                        <h3><a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}">{{$book->bookName}}</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="product-list-content">
                                <div class="card-image">
                                    <img src="{{asset($book->bookImage)}}" alt="">
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            {{$book->authorName}}
                                        </a>
                                        <h3><a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}" tabindex="0">{{$book->bookName}}</a></h3>
                                    </div>
                                    <article>
                                        <h2 class="sr-only">Card List Article</h2>
                                        <p>{{$book->bookDescription}}</p>
                                    </article>
                                    <div class="price-block">
                                        <span class="price">৳0.00</span>
                                        <del class="price-old">৳{{$book->bookPrice}}</del>
                                        <span class="price-discount">100%</span>
                                    </div>
                                    <div class="btn-block">
                                        <a href="{{route('add-cart',['id'=>$book->id])}}" class="btn btn-outlined">Add To Cart</a>
                                        <a href="{{route('add-wishlist',['id'=>$book->id])}}" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination Block -->
            <div class="row pt--30">
                <div class="col-md-12">
                    <div class="pagination-block">
                        <ul class="pagination-btns flex-center">
                            {{--<li>
                                {{$books->links()}}
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
    </main>
@endsection
