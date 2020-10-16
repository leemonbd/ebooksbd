@extends('front-end.master2')
@section('title')
    Details Page - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Book Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row  mb--60">
                <div class="col-lg-5 mb--30">
                    <img src="{{asset($books->bookImage)}}" alt="">
                </div>

                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 ">
                        <p class="tag-block">Category: <a href="{{route('subcategory-page',['id'=>$books->subcategoryId])}}">{{$books->subcategoryName}}</a></p>
                        <h3 class="product-title">{{$books->bookName}}</h3>
                        <p>By <a href="{{route('author-page',['authorName'=>$books->authorName])}}"><strong>{{$books->authorName}}</strong></a></p>
                        <article class="product-details-article">
                            <p></p>
                        </article>
                        <div class="price-block">
                            <span class="price-new">৳0.00</span>
                            <del class="price-old">৳{{$books->bookPrice}}</del>
                        </div>
                        {{Form::open(['route'=>'add-to-cart', 'method'=>'POST'])}}
                        <div class="add-to-cart-row">
                            <div class="add-cart-btn">
                                <input type="submit" name="btn" class="btn btn-outlined--primary" value="Add to Cart">
                                <input type="hidden" name="id"  value="{{$books->id}}">
                            </div>
                        </div>
                        {{Form::close()}}
                        <div class="compare-wishlist-row">
                            <a href="{{route('add-wishlist',['id'=>$books->id])}}" class="add-link"><i class="fas fa-heart"></i>Add to Wish List

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sb-custom-tab review-tab section-padding">
                <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                           aria-controls="tab-1" aria-selected="true">
                            DESCRIPTION
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                           aria-controls="tab-2" aria-selected="true">
                            REVIEWS ({{$commentShow->count()}})
                        </a>
                    </li>
                </ul>

                <div class="tab-content space-db--20" id="myTabContent">
                    <div class="tab-pane fade " id="tab-1" role="tabpanel" aria-labelledby="tab1">
                        <article class="review-article">
                            <h1 class="sr-only">Tab Article</h1>
                            <p>{{$books->bookDescription}}</p>
                        </article>
                    </div>

                    <div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                        <div class="review-wrapper">
                          @if($commentShow->count()==0)
                                <div class="review-comment mb--20">
                                    <h3 class="text-danger">Comment didn't posted yet</h3>
                                </div>
                            @else
                                @foreach($commentShow as $comment)
                                    <div class="review-comment mb--20">
                                        <div class="avatar">
                                            <img src="{{asset($comment->customer_profileImage)}}" alt="" class="rounded-circle">
                                        </div>
                                        <div class="text">
                                            <h6><b>{{$comment->customer_name}}</b> – <span class="font-weight-400">{{ \Carbon\Carbon::parse($comment->created_at)->isoFormat('MMM Do, YYYY')}}</span>
                                            </h6>
                                            <p>{{$comment->customer_comment}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if(Session::get('customerId'))
                                <div class="pt-2">
                                   {!! Form::open(['route'=>'customers-comment', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    <h5 class="text-success">{{Session::get('message')}}</h5>
                                    <div class="mt--15 site-form ">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message"><h2 class="title-lg mb--20 pt--15">COMMENT HERE</h2></label>
                                                    <textarea name="customer_comment" id="asd"  cols="30" rows="10"
                                                              class="form-control"></textarea>
                                                    <input type="hidden" id="customer_id" name="customer_id" value="{{$customer->id}}" class="form-control">
                                                    <input type="hidden" id="book_id" name="book_id" value="{{$books->id}}" class="form-control">
                                                    <input type="hidden" id="customer_email" name="customer_email" value="{{$customer->email}}" class="form-control">
                                                    <input type="hidden" id="customer_profileImage" name="customer_profileImage" value="{{$customer->profileImage}}" class="form-control">
                                                    <input type="hidden" id="customer_name" name="customer_name" value="{{$customer->firstName.' '.$customer->lastName}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="submit-btn">
                                                    <input type="submit" onclick="stop()" class="btn btn-black" id="btn" name="btn" value="Post Comment">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}



                                </div>
                                @else
                                    <h3 class="text-success">Please <a href="{{route('register-login')}}" class="text-info">login</a> your account</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
<!--=================================
RELATED PRODUCTS BOOKS
===================================== -->
        <section class="">
        <div class="container">
        <div class="section-title section-title--bordered">
        <h2>RELATED BOOKS</h2>
        </div>
        <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 4,
        "dots":true
        }' data-slick-responsive='[
        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
        {"breakpoint":992, "settings": {"slidesToShow": 3} },
        {"breakpoint":768, "settings": {"slidesToShow": 2} },
        {"breakpoint":480, "settings": {"slidesToShow": 1} }
        ]'>
        @foreach($relatedBooks as $relatedBook)
        <div class="single-slide">
        <div class="product-card">
        <div class="product-card--body">
            <div class="card-image">
                <img src="{{asset($relatedBook->bookImage)}}" alt="">
                <div class="hover-contents">
                    <a href="{{route('details-page',['id'=>$relatedBook->id,'categoryId'=>$relatedBook->categoryId])}}" class="hover-image">
                        <img src="{{asset($relatedBook->bookImage)}}" alt="">
                    </a>
                    <div class="hover-btns">
                        <a href="{{route('add-cart',['id'=>$relatedBook->id])}}" class="single-btn">
                            <i class="fas fa-shopping-basket"></i>
                        </a>
                        <a href="{{route('add-wishlist',['id'=>$relatedBook->id])}}" class="single-btn">
                            <i class="fas fa-heart"></i>
                        </a>
                        <a href="{{route('details-page',['id'=>$relatedBook->id,'categoryId'=>$relatedBook->categoryId])}}"
                           class="single-btn">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="price-block">
                <span class="price">৳0.00</span>
                <del class="price-old">৳{{$relatedBook->bookPrice}}</del>
                <span class="price-discount">100%</span>
            </div>
            <div class="product-header">
                <a href="{{route('author-page',['authorName'=>$relatedBook->authorName])}}" class="author">
                    {{$relatedBook->authorName}}
                </a>
                <h3><a href="{{route('details-page',['id'=>$relatedBook->id,'categoryId'=>$relatedBook->categoryId])}}">{{$relatedBook->bookName}}</a></h3>
            </div>
        </div>
        </div>
        </div>
        @endforeach
        </div>
        </div>

        </section>
        <hr>
    </main>

    {{--<script type="text/javascript">
        $('#frmComments').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            var customer_id = $('#customer_id').val();
            var book_id = $('#book_id').val();
            var customer_name = $('#customer_name').val();
            var customer_email = $('#customer_email').val();
            var customer_comment = $('#customer_comment').val();
            var customer_profileImage = $('#customer_profileImage').val();
            $.ajax({
                type: "POST",
                url: 'http://localhost/IslamicBookBD/public/',
                data: {customer_id:customer_id, book_id:book_id, customer_name:customer_name, customer_email:customer_email, customer_comment:customer_comment,customer_profileImage:customer_profileImage},
                success: function(msg) {
                    a$("customer_comment").append("<div>"+msg+"</div>");
                }
            });
        });
    </script>--}}
@endsection
