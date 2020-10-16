@extends('front-end.master')
@section('title')
    Home - Islamic E-Book BD
@endsection

@section('body')
    <section class="hero-area hero-slider-4 section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                        <div class="single-slide bg-image bg-overlay--white"
                             data-bg="{{asset('/')}}front-end/image/bg-images/home-4-slider-1.jpg">
                            <div class="home-content text-left pl--30">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <span class="title-small">100% Sale</span>
                                        <h1>For All Pdf Books.</h1>
                                        <a href="{{route('all-books')}}" class="btn btn--green">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide bg-image bg-overlay--dark"
                             data-bg="{{asset('/')}}front-end/image/bg-images/home-4-slider-2.jpg">
                            <div class="home-content text-center">
                                <div class="row justify-content-end">
                                    <div class="col-lg-5">
                                        <h1 class="v2">ALL PDF BOOKS</h1>
                                        <h2>collected from internet</h2>
                                        <a href="{{route('all-books')}}" class="btn btn--yellow">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>RECENT BOOKS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 5,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>

                @foreach($books as $book)
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{asset($book->bookImage)}}" alt="">
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
                                <span class="price">0.00</span>
                                <del class="price-old">৳{{$book->bookPrice}}</del>
                                <span class="price-discount">100%</span>
                            </div>
                            <div class="product-header">
                                <a href="{{route('author-page',['authorName'=>$book->authorName])}}" class="author">
                                    {{$book->authorName}}
                                </a>
                                <h3><a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}">{{$book->bookName}}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>ORDERED BOOKS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 5,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>



                @foreach($orderedBooks as $book)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{asset($book->bookImage)}}" alt="">
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
                                    <span class="price">0.00</span>
                                    <del class="price-old">৳{{$book->bookPrice}}</del>
                                    <span class="price-discount">100%</span>
                                </div>
                                <div class="product-header">
                                    <a href="{{route('author-page',['authorName'=>$book->authorName])}}" class="author">
                                        {{$book->authorName}}
                                    </a>
                                    <h3><a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}">{{$book->bookName}}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>
        </div>
    </section>

    <section class="section-margin">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>OLD BOOKS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 5,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                @foreach($olderBooks as $book)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{asset($book->bookImage)}}" alt="">
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
                                    <span class="price">0.00</span>
                                    <del class="price-old">৳{{$book->bookPrice}}</del>
                                    <span class="price-discount">100%</span>
                                </div>
                                <div class="product-header">
                                    <a href="{{route('author-page',['authorName'=>$book->authorName])}}" class="author">
                                        {{$book->authorName}}
                                    </a>
                                    <h3><a href="{{route('details-page',['id'=>$book->id,'categoryId'=>$book->categoryId])}}">{{$book->bookName}}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <hr>
        </div>

    </section>








@endsection

