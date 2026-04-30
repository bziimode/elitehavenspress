@extends('layouts.master')

@section('title','EH Press - Users')
    
@section('content')

    <div class="container-fluid px-4">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>View Users</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role_as == '1' ? 'Admin' : 'Editor'}}</td>
                                {{-- <td>
                                    <a target="_blank" href="{{asset('uploads/posts/'.$item->slug)}}">
                                        {{$item->title}}
                                    </a>
                                </td>
                                <td>
                                    <a target="_blank" href="{{url('posts/'.$item->slug)}}">
                                        <img src="{{asset('uploads/posts/'.$item->slug.'/'.$item->thumbnail)}}" width="50px" alt="IMG">
                                    </a>
                                </td> --}}
                                
                                <td>
                                    <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
    </div>

@endsection


  