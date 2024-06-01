@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Course</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Course</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Course</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Course Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Course Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" placeholder="Category Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="Category Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" name="image" type="file">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
