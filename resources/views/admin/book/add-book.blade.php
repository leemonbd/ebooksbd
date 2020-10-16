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
                                <h3 class="card-title">Add Book Form</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route'=>'new-book', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                                    <div class="form-group row">
                                        <label for="categoryName" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <h3 class="text-success">{{Session::get('message')}}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categoryId" class="col-sm-3 col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="categoryId" id="categoryId">
                                                <option>---Select Category Name---</option>
                                                @foreach($categories as $category)
                                                 <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->has('categoryId') ? $errors->first('categoryId') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subcategoryId" class="col-sm-3 col-form-label">Sub-Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="subcategoryId" id="subcategoryId">
                                                <option>---Select Sub-Category Name---</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->has('subcategoryId') ? $errors->first('subcategoryId') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookName" class="col-sm-3 col-form-label">Book Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bookName" class="form-control" id="bookName" >
                                            <span class="text-danger">{{ $errors->has('bookName') ? $errors->first('bookName') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authorName" class="col-sm-3 col-form-label">Book Author Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="authorName" class="form-control" id="authorName" >
                                            <span class="text-danger">{{ $errors->has('authorName') ? $errors->first('authorName') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookPrice" class="col-sm-3 col-form-label">Book Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" step="any" name="bookPrice" class="form-control" id="bookPrice" >
                                            <span class="text-danger">{{ $errors->has('bookPrice') ? $errors->first('bookPrice') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookQuantity" class="col-sm-3 col-form-label">Book Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="bookQuantity" class="form-control" id="bookQuantity" >
                                            <span class="text-danger">{{ $errors->has('bookQuantity') ? $errors->first('bookQuantity') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookDescription" class="col-sm-3 col-form-label">Book Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="bookDescription" id="bookDescription"  rows="6"></textarea>
                                            <span class="text-danger">{{ $errors->has('bookDescription') ? $errors->first('bookDescription') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookImage" class="col-sm-3 col-form-label">Book Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="bookImage" class="form-control" id="bookImage" accept="image/*">
                                            <span class="text-danger">{{ $errors->has('bookImage') ? $errors->first('bookImage') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bookPdf" class="col-sm-3 col-form-label">Book PDF</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="bookPdf" class="form-control" id="bookPdf" accept= "application/pdf">
                                            <span class="text-danger">{{ $errors->has('bookPdf') ? $errors->first('bookPdf') : ''}}</span>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Publication Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="1" checked>
                                                    <label class="form-check-label" for="publicationStatus"> Published </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="0">
                                                    <label class="form-check-label" for="publicationStatus"> Unpublished </label>
                                                </div>
                                                <span class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}}</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-primary btn-block" name="btn" value="Add Book Info">
                                        </div>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div> <!-- / .card-desk-->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main>

@endsection
