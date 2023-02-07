@extends('layouts.app')

@section('title', 'AOFPA WEB IT')
@section('meta_description', 'AOFPA WEB IT')
@section('meta_keyword', 'AOFPA WEB IT')

@section('content')
    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme category-carousel">
                        @foreach ($all_categories as $all_categories_item)
                            <div class="item">
                                <a href="{{ url('tutorial/' . $all_categories_item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img class="category-carousel-img"
                                            src="{{ asset('uploads/category/' . $all_categories_item->image) }}"
                                            alt="Image">
                                        <div class="card-body text-dark">
                                            <h4>{{ $all_categories_item->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
