@extends('layouts.master')

@section('title','EH Press - Category')
    

@section('content')

    <div class="container-fluid px-4">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>View Category <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->image}}
                                    <img src="{{asset('uploads/category/'.$item->image)}}" width="50px" alt="IMG">
                                </td>
                                <td>{{$item->status == '0' ? 'Hidden' : 'Shown'}}</td>
                                <td>
                                    <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
    </div>

@endsection