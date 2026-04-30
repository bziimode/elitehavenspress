@extends('layouts.master')

@section('title','EH Press - Add Category')
    

@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>                        
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label form="">Category Name</label>
                        <input type="text" name="name" id="title-input" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label form="">Slug</label>
                        <input type="text" name="slug" id="slug-output" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label form="">Description</label>
                        <textarea name="description" class="form-control description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label form="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label form="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Description</label>
                        <textarea name="meta_descriptino" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label form="">Meta Keywords</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>
                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label form="">Navbar Status</label>
                            <input type="checkbox" name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label form="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Category</button>
                    </div>
                </form>
            </div>            
        </div>

    </div>

@endsection