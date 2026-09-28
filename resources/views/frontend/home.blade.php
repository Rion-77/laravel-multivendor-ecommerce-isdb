@extends('frontend.layouts.app')

@section('title', 'ShopSphere')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <span class="badge bg-secondary text-white rounded-pill px-3 py-2 mb-3"
                        style="font-size: 13px; letter-spacing: .4px;"><i class="fas fa-store me-2"></i>480+ Verified
                        Local Vendors</span>
                    <h1 class="mb-4 display-3 text-primary">Everything You Love, From Sellers You Trust</h1>
                    <p class="mb-4" style="max-width: 520px;">Discover everyday essentials, unique finds, and local
                        favorites from independent sellers in one easy-to-shop marketplace.</p>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-0 shadow-sm w-75 py-3 px-4 rounded-pill" type="text"
                            placeholder="Search products, categories, or stores...">
                        <button type="submit"
                            class="btn btn-primary py-3 px-4 position-absolute rounded-pill text-white h-100"
                            style="top: 0; right: 25%;">Search</button>
                    </div>
                    <div class="hero-trust-bar">
                        <div class="item"><i class="fas fa-truck"></i> Fast, reliable delivery</div>
                        <div class="item"><i class="fas fa-shield-alt"></i> Secure payments</div>
                        <div class="item"><i class="fas fa-undo"></i> Easy returns</div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="{{ asset('img/hero-img-1.png') }}"
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Shop fresh picks</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{ asset('img/hero-img-2.jpg') }}" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Explore local stores</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Shop Popular Categories-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Shop Popular Categories</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">Home &amp; Living</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Fashion</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Beauty</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                    <span class="text-dark" style="width: 130px;">Electronics</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            @forelse ($products as $product)
                                <x-frontend.products.card :product="$product" />
                            @empty
                                <x-frontend.no-data text="No products found..." />
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Featurs Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="{{ asset('img/featur-1.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h5 class="text-white">Weekly Marketplace Deals</h5>
                                    <h3 class="mb-0">Up to 20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-dark rounded border border-dark">
                            <img src="{{ asset('img/featur-2.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-light text-center p-4 rounded">
                                    <h5 class="text-primary">Shop Local Sellers</h5>
                                    <h3 class="mb-0">New finds daily</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="{{ asset('img/featur-3.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">Limited-Time Offers</h5>
                                    <h3 class="mb-0">Save up to $30</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs End -->


    <!-- Trending-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Trending From Independent Sellers</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">

                @forelse ($products as $product)
                    <x-frontend.products.card-carousel :product="$product" />
                @empty
                    <x-frontend.no-data text="No products found..." />
                @endforelse


            </div>
        </div>
    </div>
    <!-- Tredig End -->


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Find Your Next Favorite</h1>
                        <p class="fw-normal display-3 text-dark mb-4">all in one place</p>
                        <p class="mb-4 text-dark">Compare products from trusted sellers, discover something new, and enjoy
                            a simpler way to shop online.</p>
                        <a href="#"
                            class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">SHOP NOW</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('img/baner-1.png') }}" class="img-fluid w-100 rounded" alt="">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                            style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 100px;">1</h1>
                            <div class="d-flex flex-column">
                                <span class="h2 mb-0">50$</span>
                                <span class="h4 text-muted mb-0">kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->


    <!-- Bestseller Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Bestsellers This Week</h1>
                <p>Popular picks from our community of shoppers, featuring quality products from independent stores.</p>
            </div>
            <div class="row g-4">
                @forelse ($products as $product)
                    @if ($loop->index <= 5)
                        <x-frontend.products.card-best-seller :product="$product" />
                    @else
                        <x-frontend.products.card-best-seller-secondary :product="$product" />
                    @endif

                @empty
                    <x-frontend.no-data text="No products found..." />
                @endforelse
            </div>
        </div>
    </div>
    <!-- Bestseller Product End -->



    <!-- Top Vendors Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4 mb-3">
                <div class="col-lg-6 text-start">
                    <h1>Meet Our Top Vendors</h1>
                    <p class="mb-0">Meet trusted stores offering quality products across every category.</p>
                </div>
                <div class="col-lg-6 text-lg-end my-auto">
                    <a href="vendors.html" class="btn btn-primary rounded-pill px-4 py-2 text-white">View All Vendors
                        <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="row g-4">
                @forelse ($vendors as $vendor)
                    <x-frontend.vendor-card :vendor="$vendor" />
                @empty
                    <x-frontend.no-data text="No vendor found..." />
                @endforelse
            </div>
        </div>
    </div>
    <!-- Top Vendors End -->


@endsection
