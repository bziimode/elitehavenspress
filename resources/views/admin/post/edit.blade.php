@extends('layouts.master')

@section('title','EH Press - Edit Post')
    

@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Post</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>                        
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- This line fixes the error -->

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="title" id="title-input" name="title" value="{{ $post->title }}" class="form-control" placeholder="Press Entry Title" />
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="title" id="slug-output" name="slug" value="{{ $post->slug }}" class="form-control" placeholder="Press slug" />
                    </div>
                    <div class="mb-3">
                        <label>Article Date</label>
                        <input type="text" id="article_date" value="{!! date("m/d/Y", strtotime($post->article_date)) !!}" name="article_date" class="datepicker form-control" placeholder="Date of Article. Click to select date" />
                    </div>
                    <div class="mb-3">
                        <label>Publish Date</label>
                        <input type="text" id="publish_date" value="{!! date("m/d/Y", strtotime($post->publish_date)) !!}" name="publish_date" class="datepicker form-control" placeholder="Click to select a date from calendar or type a specific date" />
                    </div>
                    <div class="mb-3">
                        <label>Author</label>
                        <input type="text" name="author" value="{{ $post->author }}" class="form-control" placeholder="Author" />
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control description">{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" value="{{ $post->thumbnail }}" accept="image/x-png,image/gif,image/jpeg" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label>Article File</label>
                        <input type="file" name="filename" value="" class="form-control"/>
                    </div>
                   

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label form="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $post->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Keywords</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">{{ $post->meta_keyword }}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label form="">Status</label>
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }} >
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-primary" type="submit">Save Post</button>
                    </div>
                </form>
            </div>            
        </div>

    </div>

@endsection