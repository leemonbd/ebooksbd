<footer class="site-footer">
    <div class="container">
        <div class="row justify-content-between  section-padding">
            <div class=" col-xl-3 col-lg-4 col-sm-4 col-6">
                <div class="single-footer pb--40">
                    <div class="brand-footer footer-title">
                        <img src="{{asset('/')}}front-end/image/logo--footer.png" alt="">
                        <a href="#">Logo source Logodesign.net</a>
                    </div>
                    <div class="footer-contact">
                        <p><span class="label">Address:</span><span class="text">Dhaka,
                                    Bangladesh</span></p>
                        <p><span class="label">Phone:</span><span class="text">+880 1918845404</span></p>
                        <p><span class="label">Email:</span><span class="text">limonionfoo@gmail.com</span></p>
                    </div>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6 col-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Information</h3>
                    </div>
                    <ul class="footer-list normal-list">
                        <li><a href="{{route('/')}}">Home</a></li>
                        <li><a href="{{route('all-books')}}">All Books</a></li>
                        <li><a href="{{route('register-login')}}">Login</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                        <li><a href="{{route('show-cart')}}">Cart</a></li>
                        <li><a href="{{route('show-wishlist')}}">Wish List</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-2 col-sm-6 col-6">
                <div class="single-footer pb--40">
                    <div class="footer-title">
                        <h3>Extras</h3>
                    </div>

                    <ul class="footer-list normal-list">
                        <li><a href="{{route('register-login')}}">Register</a></li>
                        <li><a href="{{route('show-cart')}}">Cart Page</a></li>
                        <li><a href="{{route('checkout')}}">Checkout</a></li>
                        <li><a href="{{route('/')}}">Main</a></li>
                        <li><a href="{{route('all-books')}}">Shop Now</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-xl-3 col-lg-4  col-sm-6 col-6">
                <div class="footer-title">
                    <h3>Newsletter Subscribe</h3>
                </div>
                <div class="newsletter-form mb--30">
                    <form action=".{{asset('/')}}front-end//php/mail.php">
                        <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                        <button class="btn btn--primary w-100">Subscribe</button>
                    </form>
                </div>
                <div class="social-block">
                    <h3 class="title">STAY CONNECTED</h3>
                    <ul class="social-list list-inline">
                        <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                        </li>
                        <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                        <li class="single-social google"><a href=""><i
                                    class="ion ion-social-googleplus-outline"></i></a></li>
                        <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="#" class="author">Mohammad Mahbubul Alam</a>. All Right Reserved.</p>
            <div class="social-block">
                <ul class="social-list list-inline">
                    <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                    </li>
                    <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                    <li class="single-social google"><a href=""><i
                                class="ion ion-social-googleplus-outline"></i></a></li>
                    <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
