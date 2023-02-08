<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex">
                {{-- <img src="{{ asset('assets/images/logo.jpg') }}" style="max-width: 50px" class="w-100" alt="logo"> --}}
                <h3 class="text-danger my-auto ms-2">AOFPA <span class="text-dark">OF WEB IT</span></h3>
            </div>
            <div class="col-md-8 my-auto">
                <div class="p-2 border text-center">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>


                    @php
                        $categories = App\Models\Category::where('navbar_status', '0')
                            ->where('status', '0')
                            ->get();
                    @endphp

                    @foreach ($categories as $cateitem)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ url('tutorial/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </nav>
</div>
