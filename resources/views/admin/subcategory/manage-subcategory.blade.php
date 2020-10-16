@extends('admin.master')
@section('main')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Striped rows -->
                        <div class="col-md-12 my-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3 class="text-success" id="removeMessage">{{Session::get('message')}}</h3>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr role="row">
                                            <th>SL No.</th>
                                            <th>Category Name</th>
                                            <th>Sub-Category Name</th>
                                            <th>Sub-Category Description</th>
                                            <th>Publication Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subcategories as $subcategory)
                                            <tr>
                                                <td>{{$subcategory->id}}</td>
                                                <td>{{$subcategory->categoryName}}</td>
                                                <td>{{$subcategory->subcategoryName}}</td>
                                                <td>{{$subcategory->subcategoryDescription}}</td>
                                                <td>
                                                    @if($subcategory->publicationStatus==1)
                                                        <p class="text-info">Published</p>
                                                    @else<p class="text-warning">Unpublished</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item text-success" href="{{route('edit-subcategory',['id'=>$subcategory->id])}}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{route('delete-subcategory',['id'=>$subcategory->id])}}">Remove</a>
                                                        @if($subcategory->publicationStatus==1)
                                                            <a class="dropdown-item text-warning" href="{{route('unpublished-subcategory',['id'=>$subcategory->id])}}">Unpublished</a>
                                                        @else
                                                            <a class="dropdown-item text-info" href="{{route('published-subcategory',['id'=>$subcategory->id])}}">Published</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
@endsection

