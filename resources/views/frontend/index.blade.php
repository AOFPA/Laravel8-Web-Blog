@extends('layouts.app')

@section('title', 'AOFPA WEB IT')
@section('meta_description', 'AOFPA WEB IT')
@section('meta_keyword', 'AOFPA WEB IT')

@section('content')
    {{-- Hero Section --}}
    <div class="bg-dark py-5">
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

    {{-- Ads --}}
    <div class="py-1 bg-light">
        <div class="container">
            <div class="border p-3 text-center">
                <h3>Ads Here</h3>
            </div>
        </div>
    </div>

    {{-- Detial --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>AOFPA of Web IT</h4>
                    <div class="underline"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, saepe quia reiciendis similique
                        quos blanditiis? Dolore ducimus minus molestiae a inventore totam, incidunt dolor? Nihil saepe
                        provident dicta numquam aperiam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, saepe quia reiciendis similique
                        quos blanditiis? Dolore ducimus minus molestiae a inventore totam, incidunt dolor? Nihil saepe
                        provident dicta numquam aperiam.
                    </p>


                </div>
            </div>
        </div>
    </div>

    {{-- Category List --}}
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Category List</h4>
                    <div class="underline"></div>
                    <div class="row">
                        @foreach ($all_categories as $all_categories_item)
                            <div class="col-md-3 mt-2">
                                <div class="card card-body card-shadow">
                                    <a class="text-decoration-none"
                                        href="{{ url('tutorial/' . $all_categories_item->slug) }}">
                                        <h6 class="text-dark">{{ $all_categories_item->name }}</h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Latest Posts --}}
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-8">
                    @foreach ($latest_post as $latest_post_item)
                        <div class="col-md-12 mt-2">
                            <div class="card card-body card-shadow">
                                <a class="text-decoration-none"
                                    href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}">
                                    <h5 class="text-dark">{{ $latest_post_item->name }}</h5>
                                </a>
                                <h6>Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border p-3 text-center">
                        <h3>Ads Here</h3>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
