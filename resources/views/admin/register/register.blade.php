@extends('admin.authLayouts.layout')

@section('content')

<div class="wrapper vh-100">
    <div class="row align-items-center h-100">

        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('register') }}" method="post">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                  <g>
                      <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                      <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                      <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                  </g>
                </svg>
            </a>
            <h1 class="h6 mb-3">Sign Up</h1>

                    <div class="form-group">
                        <label for="name" class="sr-only">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror form-control-lg" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">{{ __('New Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" name="password" required autocomplete="new-password" placeholder="New Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" class="sr-only">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Sign up') }}</button>
                    </div>
                    <div class="form-group">
                        <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
                    </div>


        </form>
    </div>
</div>
@endsection


