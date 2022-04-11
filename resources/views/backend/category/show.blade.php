@extends('layouts.backend.app')
@section('content')
<div class="row justify-content-center">
<div class="col-xl-6 ">
    <div class="card ">
        <div class="card-header">
            <h5 class="card-title">Category detail <strong> ({{ $categories->category_name }})</strong> </h5>
        </div>
        <div class="card-body">
            <p class="card-text"> Category id: {{ $categories->id }}</p>
            <p class="card-text"> Category name: {{ $categories->category_name }}</p>
            <label for="">Category Image</label> <br>
            <img src="{{ asset('uploads/category_photos/'.$categories->image_path) }}" alt="{{ $categories->category_name }}">
        </div>
        <div class="card-footer d-sm-flex justify-content-between align-items-center">
            <div class="card-footer-link mb-4 mb-sm-0">
                <p class="card-text text-dark d-inline">Created at: {{ $categories->created_at->diffForHumans() }}</p>
            </div>

            <a href="{{ route('category.destroy',$categories->id) }}" class="btn btn-danger">Delete</a>
            <a href="{{ route('category.edit',$categories->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>  
</div> 

@endsection
