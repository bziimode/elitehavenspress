@extends('layouts.master')

@section('title','EH Press - Add Post')
    

@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Post</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>                        
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                    @csrf


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
                        <input type="title" name="title" id="title-input" class="form-control" placeholder="Press Entry Title" />
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="title" name="slug" id="slug-output" class="form-control" placeholder="Press slug" />
                    </div>
                    <div class="mb-3">
                        <label>Article Date</label>
                        <input type="date" id="article_date" name="article_date" class="form-control" placeholder="Date of Article. Click to select date" />
                    </div>
                    <div class="mb-3">
                        <label>Publish Date</label>
                        <input type="date" id="publish_date" name="publish_date" class="form-control" placeholder="Click to select a date from calendar or type a specific date" />
                    </div>
                    <div class="mb-3">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Author" />
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" value="" accept="image/x-png,image/gif,image/jpeg" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Article File</label>
                        <input type="file" name="filename" value="" class="form-control" />
                    </div>
                   

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label form="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Keywords</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label form="">Status</label>
                            <input type="checkbox" name="status">
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