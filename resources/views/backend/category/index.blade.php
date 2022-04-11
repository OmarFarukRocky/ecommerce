@extends('layouts.backend.app')
@section('content')       
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category List <strong> Total ({{ $categories->count() }})</strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th class="width80">SL</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>DATE</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/category_photos/'.$category->image_path) }}" alt="">
                                </td>
                                <td>{{ $category->created_at }}</td>
                                {{-- <td><span class="badge light badge-success">Successful</span></td> --}}
                                
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100">Nothing Found</td>
                                </tr>
                            @endforelse
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection

