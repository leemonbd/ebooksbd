@extends('front-end.master2')
@section('title')
    Login Register Page - Islamic E-Book BD
@endsection

@section('body2')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                    <h5 class="text-success">{{Session::get('message')}}</h5>
                    <!-- Login Form s-->
                    {!! Form::open(['route'=>'register-customer', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        <div class="login-form">
                            <h4 class="login-title">New Customer</h4>
                            <p><span class="font-weight-bold">I am a new customer</span></p>
                            <div class="row">
                                <div class="col-md-6 col-6 mb--20">
                                    <label for="firstName">First Name</label>
                                    <input class="mb-0 form-control" type="text" id="firstName" name="firstName"
                                           placeholder="Enter your first name">
                                    <span class="text-danger">{{ $errors->has('firstName') ? $errors->first('firstName') : ''}}</span>
                                </div>
                                <div class="col-md-6 col-6 mb--20">
                                    <label for="lastName">Last Name</label>
                                    <input class="mb-0 form-control" type="text" id="lastName" name="lastName"
                                           placeholder="Enter your last name">
                                    <span class="text-danger">{{ $errors->has('lastName') ? $errors->first('lastName') : ''}}</span>
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control" type="email" name="email" placeholder="Enter Your Email Address Here..">
                                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                                </div>
                                <div class="col-lg-12 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                    <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                                </div>
                                <div class="col-lg-12 mb--20">
                                    <label for="profileImage">Profile Image</label>
                                    <input type="file" name="profileImage" class="form-control" id="profileImage" accept="image/*">
                                    <span class="text-danger">{{ $errors->has('profileImage') ? $errors->first('profileImage') : ''}}</span>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-outlined" value="Register">
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <h5 class="text-success">{{Session::get('loginErrorMessage')}}</h5>
                    {!! Form::open(['route'=>'customer-login', 'method'=>'POST']) !!}
                        <div class="login-form">
                            <h4 class="login-title">Returning Customer</h4>
                            <p><span class="font-weight-bold">I am a returning customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="email">Enter your email address here...</label>
                                    <input class="mb-0 form-control" name="email" type="email" id="email1"
                                           placeholder="Enter you email address here...">
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control" type="password" name="password" id="password" placeholder="Enter your password">
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="btn" class="btn btn-outlined" value="Login">
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </main>


@endsection
