@extends('layouts.master')

@section('title','EH Press - Posts')
    
@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{url('admin/delete-post')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Press</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="post_delete_id" id ="post_id">
                <h5>Are your sure you want to delete this press?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
    </div>
  </div>
</div>

    <div class="container-fluid px-4">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>View Post <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a></h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-bordered" id="thetable">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Press Title</th>
                            <th>Description</th>
                            <th>File</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $item)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{url('uploads/posts/'.$item->slug.'/'.$item->filename)}}">
                                        <img src="{{asset('uploads/posts/'.$item->slug.'/'.$item->thumbnail)}}" width="50px" alt="IMG">
                                    </a>
                                </td>

                                <td>
                                        {{$item->title}}
                                </td>
                                <td>
                                        {{$item->description}}
                                        <br>
                                        @if( !empty($item->publish_date) )
                                            <p class="published">Published: {!! date("d M Y", strtotime($item->publish_date)) !!}</p>
                                        @endif
                                        @if( !empty($item->author) )
                                            <p class="author">Author: {!! $item->author !!}</p>
                                        @endif 
                                </td>

                                {{-- <td>{{$item->status == '0' ? 'Hidden' : 'Shown'}}</td> --}}
                                <td>
                                    <a target="_blank" href="{{url('uploads/posts/'.$item->slug.'/'.$item->filename)}}">
                                        View Article
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('admin/edit-post/'.$item->id)}}" class="btn btn-success">Edit</a>
                                    {{-- <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a> --}}

                                    <button type="button" class="btn btn-danger deletebtn" value="{{$item->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

       
    </div>

@endsection


  