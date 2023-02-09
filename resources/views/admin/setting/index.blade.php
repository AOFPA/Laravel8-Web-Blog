@extends('layouts.master')

{{-- @section('title')
    admin-dashboard
@endsection --}}
@section('title', 'Website Setting')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="row">
            <div class="col-md-12">

                @if (session('message'))
                    <h4 class="alert alert-warning">{{ session('message') }}</h4>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Website Setting</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/setting') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Website Name</label>
                                <input name="website_name" type="text" class="form-control" required
                                    @if ($setting) value="{{ $setting->website_name }}"> @endif </div>
                                <div class="mb-3">
                                    <label for="">Website Logo</label>
                                    <input name="website_logo" type="file" class="form-control" required>
                                    @if ($setting)
                                        <img src="{{ asset('uploads/setting/' . $setting->logo) }}" width="70px"
                                            alt="logo">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Website Favicon</label>
                                    <input name="website_favicon" type="file" class="form-control">
                                    @if ($setting)
                                        <img src="{{ asset('uploads/setting/' . $setting->favicon) }}" width="70px"
                                            alt="favicon">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="3">
@if ($setting)
{{ $setting->description }}
@endif
</textarea>
                                </div>

                                <h4>SEO - Meta Tags</h4>
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input name="meta_title" type="text" class="form-control"
                                        @if ($setting) value="{{ $setting->meta_title }}" @endif>
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="3">
@if ($setting)
{{ $setting->meta_keywords }}
@endif
                            </textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3">
@if ($setting)
{{ $setting->meta_description }}
@endif
</textarea>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
