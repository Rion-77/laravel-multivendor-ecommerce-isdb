@extends('frontend.layouts.app')

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Our Vendors</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Vendors</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Vendors Directory Start -->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4 mb-4">
                <div class="col-lg-4 text-start">
                    <h1 class="mb-0">Our Vendors</h1>
                    <p class="mb-0">Browse 10+ verified sellers on Fruitables</p>
                </div>
                <div class="col-lg-4">
                    <div class="input-group w-100 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="Search vendors"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                        <label for="sortlist">Sort By:</label>
                        <select id="sortlist" name="sortlist" class="border-0 form-select-sm bg-light me-3">
                            <option>Most Popular</option>
                            <option>Top Rated</option>
                            <option>Newest</option>
                            <option>Most Products</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @forelse ($vendors as $vendor)
                    <x-frontend.vendor-card :vendor="$vendor" class="col-md-6 col-lg-4 col-xl-3" />
                @empty
                    <x-frontend.no-data text="No vendor found..." />
                @endforelse
            </div>
            <x-frontend.pagination :for="$vendors"/>
        </div>
    </div>
    <!-- Vendors Directory End -->
@endsection
