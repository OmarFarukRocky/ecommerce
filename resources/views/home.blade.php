@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p>{{ Auth::user()->name }} are logged in!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User List <strong> Total ({{ $users->count() }})</strong></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('deleteMarkall') }}" method="post">
                            @csrf
                            @method('DELETE')
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>
                                        <label for="checkall">Check All</label>
                                        <input type="checkbox" name="checkall" >
                                    </th>
                                    <th class="width80">SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Create_at</th>                                
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="check[]" value="{{ $user->id }}">
                                    </td>
                                    <td><strong>{{ $loop->index + 1 }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>        
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="">View</a>
                                                <form action="" method="POST">
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
                        <button type="submit" class="btn btn-danger">Delete check all</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
@endsection




