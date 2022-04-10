@extends('layouts.backend.app')
@section('content')
    

 <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Create Category</h4>
               
            </div>
            <div class="card-body">
            @if (session('successfull'))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session('successfull') }}</strong>
                </div>
            @endif
                <div class="basic-form">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" class="form-control input-default">
                            @error('category_name')
                               <strong class="text-danger">{{ $message }}</strong> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <div>
                                <img src="" id="pic" alt="" width="100">
                            </div>
                            <label for="">Upload Category photo</label>
                            <input type="file" class="form-control input-rounded" name="category_photo"  oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            @error('category_photo')
                            <strong class="text-danger">{{ $message }}</strong> 
                         @enderror
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection