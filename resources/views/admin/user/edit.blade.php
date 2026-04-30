@extends('layouts.master')

@section('title','EH Press - Users')
    
@section('content')

    <div class="container-fluid px-4">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p class="form-control">
                        {{$user->name}}
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <p class="form-control">
                        {{$user->email}}
                    </p>
                </div>
                <div class="mb-3">
                    <label for="">Created At</label>
                    <p class="form-control">
                        {{$user->created_at->format('d/m/Y')}}
                    </p>
                </div>

                <form action="{{ url('admin/update-user/'.$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Role as</label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{$user->role_as == '1' ? 'selected' : ''}}>Admin</option>
                            <option value="0" {{$user->role_as == '0' ? 'selected' : ''}}>Editor</option>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"> Update User Role</button>
                    </div>
                </form>


            </div>
        </div>

       
    </div>

@endsection


  