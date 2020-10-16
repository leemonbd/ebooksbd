@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <div class="col">
                            <h2 class="h5 page-title">Welcome!</h2>
                            <h2>{{Auth::user()->name}}</h2>
                            <h5>
                                From your account dashboard you can easily check, view, edit, delete customers data, also handle all customers data from backend.
                            </h5>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </main> <!-- main -->
@endsection
