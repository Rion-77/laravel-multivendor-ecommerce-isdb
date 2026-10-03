@extends('frontend.layouts.app')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Vendor Store</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="vendors.html">Vendors</a></li>
            <li class="breadcrumb-item active text-white">Green Valley Farms</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Vendor Storefront Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="position-relative mb-5">
                {{-- <img src="img/banner-fruits.jpg" class="vendor-banner" alt=""> --}}
                <div class="d-flex flex-wrap align-items-center justify-content-between px-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ $vendor->hasMedia('shop_logo') ? $vendor->getFirstMediaUrl('shop_logo', 'logo') : 'https://picsum.photos/200/200' }}"
                            class="vendor-profile-logo" alt="" style="margin-top: 0;">
                        <div class="ms-4 mb-2">
                            <h2 class="mb-1">{{ $vendor->shop_name }}<i class="fas fa-check-circle vendor-badge-verified"
                                    title="Verified Vendor"></i></h2>
                            {{-- <p class="mb-0 text-muted"><i class="fas fa-map-marker-alt me-1"></i>123 Street, New York
                                &nbsp;&bull;&nbsp; Vendor since 2019</p> --}}
                        </div>
                    </div>
                    <div>
                        <div class="d-flex gap-2">
                            
                                <div class="stat-pill">
                                    <h3>{{ $vendor->products()->count() }}</h3>
                                    <p class="mb-0">Products</p>
                                </div>
                           
                            
                                <div class="stat-pill">
                                    <h3>4.5 <i class="fas fa-star text-secondary" style="font-size: 18px;"></i></h3>
                                    <p class="mb-0">1,240 Ratings</p>
                                </div>
                            


                        </div>
                    </div>
                </div>
            </div>



            <nav>
                <div class="nav nav-tabs mb-4">
                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                        data-bs-toggle="tab" data-bs-target="#nav-products">Products</button>
                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" data-bs-toggle="tab"
                        data-bs-target="#nav-about-vendor">About</button>
                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" data-bs-toggle="tab"
                        data-bs-target="#nav-vendor-reviews">Reviews</button>
                </div>
            </nav>
            <div class="tab-content">
                <div class="tab-pane active" id="nav-products" role="tabpanel">
                    <div class="row g-4">
                        {{-- <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="rounded position-relative fruite-item">
                                <div class="fruite-img">
                                    <img src="img/fruite-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; left: 10px;">Fruits</div>
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4>Oranges</h4>
                                    <p>Fresh oranges, hand-picked and quality checked by Green Valley Farms.</p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">$2.99 / kg</p>
                                        <a href="#"
                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        @forelse ($products as $product)
                            <x-frontend.products.card :product="$product" class="col-md-6 col-lg-6 col-xl-4" />
                        @empty
                            <x-frontend.no-data text="No products found..." />
                        @endforelse

                    </div>
                    <x-frontend.pagination :for="$products" />
                    {{--  <div class="pagination d-flex justify-content-center mt-5">
                        <a href="#" class="rounded">&laquo;</a>
                        <a href="#" class="active rounded">1</a>
                        <a href="#" class="rounded">2</a>
                        <a href="#" class="rounded">3</a>
                        <a href="#" class="rounded">&raquo;</a>
                    </div> --}}
                </div>
                <div class="tab-pane" id="nav-about-vendor" role="tabpanel">
                    <p>{{ $vendor->description }}</p>
                    
                </div>
                <div class="tab-pane" id="nav-vendor-reviews" role="tabpanel">
                    <div class="d-flex">
                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;"
                            alt="">
                        <div class="">
                            <p class="mb-2" style="font-size: 14px;">April 12, 2026</p>
                            <div class="d-flex justify-content-between">
                                <h5>Jason Smith</h5>
                                <div class="d-flex mb-3">
                                    <i class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i
                                        class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i
                                        class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>Consistently fresh produce and fast shipping. This is my go-to vendor for weekly groceries.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;"
                            alt="">
                        <div class="">
                            <p class="mb-2" style="font-size: 14px;">March 28, 2026</p>
                            <div class="d-flex justify-content-between">
                                <h5>Sam Peters</h5>
                                <div class="d-flex mb-3">
                                    <i class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i
                                        class="fa fa-star text-secondary"></i><i class="fa fa-star text-secondary"></i><i
                                        class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="text-dark">Great packaging, produce always arrives in great shape.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor Storefront End -->
@endsection
