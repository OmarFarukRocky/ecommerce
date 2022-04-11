@extends('layouts.backend.app')
@section('content')
    

 <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Edit Category</h4>
               
            </div>
            <div class="card-body">
            @if (session('successfull'))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session('successfull') }}</strong>
                </div>
            @endif
                <div class="basic-form">
                    <form action="{{ route('category.update',$categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" class="form-control input-default" value="{{  $categories->category_name }}">
                            @error('category_name')
                               <strong class="text-danger">{{ $message }}</strong> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="">Old photo</label>
                            </div>
                            <div>
                                <img src="{{ asset('uploads/category_photos/'.$categories->image_path) }}" id="pic" alt="{{  $categories->category_name }}" width="100">
                            </div>
                            <label for="">Upload Category new photo</label>
                            <input type="file" class="form-control input-rounded" name="new_category_photo"  oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            @error('new_category_photo')
                            <strong class="text-danger">{{ $message }}</strong> 
                         @enderror
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection