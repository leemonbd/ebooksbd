@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-10">
                    {{--<h2 class="page-title">Form Layout</h2>
                    <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>--}}
                    <div class="card-deck">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Update Category Form</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('update-category')}}" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="categoryName" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <h3 class="text-success">{{Session::get('message')}}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categoryName" class="col-sm-3 col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="categoryName" name="categoryName" value="{{$category->categoryName}}">
                                            <input type="hidden" class="form-control" id="categoryId" name="categoryId" value="{{$category->id}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3" for="categoryDescription">Category Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="6">
                                                {{$category->categoryDescription}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Publication Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="1" {{$category->publicationStatus==1 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="publicationStatus"> Published </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="0" {{$category->publicationStatus==0 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="publicationStatus"> Unpublished </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-primary btn-block" name="btn" value="Update Category Info">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- / .card-desk-->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>
@endsection
