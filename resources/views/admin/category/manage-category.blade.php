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
                                                <th >SL No.</th>
                                                <th>Category Name</th>
                                                <th>Category Description</th>
                                                <th>Publication Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->categoryName}}</td>
                                                <td>{{$category->categoryDescription}}</td>
                                                <td>
                                                    @if($category->publicationStatus==1)
                                                        <p class="text-info">Published</p>
                                                    @else<p class="text-warning">Unpublished</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item text-success" href="{{route('edit-category',['id'=>$category->id])}}">Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{route('delete-category',['id'=>$category->id])}}">Remove</a>
                                                        @if($category->publicationStatus==1)
                                                            <a class="dropdown-item text-warning" href="{{route('unpublished-category',['id'=>$category->id])}}">Unpublished</a>
                                                        @else
                                                            <a class="dropdown-item text-info" href="{{route('published-category',['id'=>$category->id])}}">Published</a>
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
    </main>
    <!-- main -->
@endsection

