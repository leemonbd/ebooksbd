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
                                <h3 class="card-title">Add Subcategory Form</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route'=>'update-subcategory', 'method'=>'POST','name'=>'editBookForm']) !!}
                                    <div class="form-group row">
                                        <label for="categoryName" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <h3 class="text-success">{{Session::get('message')}}</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categoryId" class="col-sm-3 col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="categoryId">
                                                <option>---Select Category Name---</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->has('categoryId') ? $errors->first('categoryId') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subcategoryName" class="col-sm-3 col-form-label">Subcategory Name</label>
                                        {{--{!! Form::label('bookName', 'Book Name', ['class'=>'col-sm-3 col-form-label']) !!}--}}
                                        <div class="col-sm-9">
                                            <input type="text" name="subcategoryName" class="form-control" id="subcategoryName" value="{{$subcategory->subcategoryName}}">
                                            <input type="hidden" name="subcategoryId" class="form-control" id="subcategoryId" value="{{$subcategory->id}}">
                                            <span class="text-danger">{{ $errors->has('subcategoryName') ? $errors->first('subcategoryName') : ''}}</span>
                                           {{-- {!! Form::text('bookName', '', ['class'=>'form-control']) !!}--}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subcategoryDescription" class="col-sm-3 col-form-label">Subcategory Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="subcategoryDescription" id="subcategoryDescription"  rows="6">{{$subcategory->subcategoryDescription}}</textarea>
                                            <span class="text-danger">{{ $errors->has('subcategoryDescription') ? $errors->first('subcategoryDescription') : ''}}</span>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label class="col-form-label col-sm-3 pt-0">Publication Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="1" {{$subcategory->publicationStatus==1?'checked':''}}>
                                                    <label class="form-check-label" for="publicationStatus"> Published </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publicationStatus" id="publicationStatus" value="0" {{$subcategory->publicationStatus==0?'checked':''}}>
                                                    <label class="form-check-label" for="publicationStatus"> Unpublished </label>
                                                </div>
                                                <span class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : ''}}</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-primary btn-block" name="btn" value="Save Subcategory Info">
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
    <script>
        document.forms['editBookForm'].elements['categoryId'].value='{{$subcategory->categoryId}}';
    </script>
@endsection
