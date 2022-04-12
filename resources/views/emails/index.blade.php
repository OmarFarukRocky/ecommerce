@extends('layouts.backend.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User List <strong> Total ({{ $users->count() }})</strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
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
                                            <a class="dropdown-item" href="{{ route('emailsend',$user->id) }}" >Send Email</a>                                  
                                    </div>
                                </div>
                            </td>
                        </tr>  
                           @empty
                            <tr>
                                <td>nothing found</td>      
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