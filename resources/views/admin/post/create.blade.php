@extends('layouts.master')

{{-- @section('title')
    admin-dashboard
@endsection --}}
@section('title', 'Add Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Add Post</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" type="text" name="category_id">
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name">Post Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea row="3" class="form-control" type="text" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="yt_iframe">Youtube Iframe Link</label>
                        <input class="form-control" type="text" name="yt_iframe">
                    </div>

                    <h6>SEO Tage</h6>
                    <div class="mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input class="form-control" type="text" name="meta_title">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" row="3" name="meta_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea class="form-control" row="3" name="meta_keyword"></textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
