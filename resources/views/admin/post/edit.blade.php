@extends('layouts.master')

{{-- @section('title')
    admin-dashboard
@endsection --}}
@section('title', 'Edit Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Edit Post<a href="{{ url('admin/posts') }}"
                        class="btn btn-secondary btn-sm float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-post/' . $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" type="text" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}"
                                    {{ $post->category_id == $cateitem->id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name">Post Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $post->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input class="form-control" type="text" name="slug" value="{{ $post->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea row="3" id="mysummernote" class="form-control" type="text" name="description">{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="yt_iframe">Youtube Iframe Link</label>
                        <input class="form-control" type="text" name="yt_iframe" value="{{ $post->yt_iframe }}">
                    </div>

                    <h6>SEO Tage</h6>
                    <div class="mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input class="form-control" type="text" name="meta_title" value="{{ $post->meta_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" row="3" name="meta_description">{!! $post->meta_description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea class="form-control" row="3" name="meta_keyword">{!! $post->meta_keyword !!}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
