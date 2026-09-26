@extends('frontend.layouts.app')

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
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @forelse ($products as $product)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    @if ($product->hasMedia('product_image'))
                                                        <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    @else
                                                        <img src="https://picsum.photos/300/{{ $product->id + 150 }}"
                                                            class="img-fluid w-100 rounded-top">
                                                    @endif

                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">Fruits</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                            href="vendor-detail.html">{{ $product->vendor->shop_name }}</a>
                                                    </div>
                                                    <p>{{ $product->description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ (int) $product->base_price }}tk</p>
                                                        <a href="#"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse


                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-5.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Green Valley Farms</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-2.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Sunny Orchards Co.</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-1.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Oranges</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Harvest Hub</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-6.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apple</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Nature's Basket</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-5.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Golden Fields Organic</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-4.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apricots</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Fresh Route Traders</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-3.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Banana</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Evergreen Growers</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-2.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Orchard & Vine</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset('img/fruite-item-1.jpg') }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Oranges</h4>
                                                <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                        href="vendor-detail.html">Green Valley Farms</a></div>
                                                <p>Thoughtfully selected by independent sellers and ready to ship.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                        cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


    <!-- Treding-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Trending From Independent Sellers</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">

                @forelse ($products as $product)
                    <div class="border border-primary rounded position-relative vesitable-item overflow-hidden">
                        <div class="vesitable-img">
                            @if ($product->hasMedia('product_image'))
                                <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            @else
                                <img src="https://picsum.photos/300/{{ $product->id + 150 }}"
                                    class="img-fluid w-100 rounded-top">
                            @endif
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                            style="top: 10px; right: 10px;">{{ $product->category->name }}</div>
                        <div class="p-4 rounded-bottom">
                            <h4>{{ $product->name }}</h4>
                            <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                    href="vendor-detail.html">{{ $product->vendor->shop_name }}.</a></div>
                            <p>{{ $product->description }}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">{{ (int) $product->base_price }}tk</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No products to show here</p>
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
                {{-- 
                
                <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    @if ($product->hasMedia('product_image'))
                                                        <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    @else
                                                        <img src="https://picsum.photos/300/{{ $product->id + 150 }}">
                                                    @endif

                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">Fruits</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                                                            href="vendor-detail.html">{{ $product->vendor->shop_name }}</a>
                                                    </div>
                                                    <p>{{ $product->description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{ (int)$product->base_price }}tk</p>
                                                        <a href="#"
                                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                --}}
                @forelse ($products as $product)
                    @if ($loop->index <= 5)
                        <div class="col-lg-6 col-xl-4">
                            <div class="p-4 rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        @if ($product->hasMedia('product_image'))
                                            <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                                class="img-fluid rounded-circle w-100" alt="{{ $product->name }}">
                                        @else
                                            <img src="https://picsum.photos/{{ $product->id + 150 }}/{{ $product->id + 150 }}"
                                                class="img-fluid rounded-circle w-100" alt="{{ $product->name }}">
                                        @endif

                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="h5">Classic Cotton T-Shirt</a>
                                        <div class="d-flex my-3">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4 class="mb-3">3.12 $</h4>
                                        <a href="#"
                                            class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="text-center">

                                @if ($product->hasMedia('product_image'))
                                    <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                        class="img-fluid rounded" alt="{{ $product->name }}">
                                @else
                                    <img src="https://picsum.photos/300/{{ $product->id + 180 }}"
                                        class="img-fluid rounded" alt="{{ $product->name }}">
                                @endif
                                <div class="py-4">
                                    <a href="#" class="h5">Ceramic Serving Bowl</a>
                                    <div class="d-flex my-3 justify-content-center">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">3.12 $</h4>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endif

                @empty
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
                    <div class="col-md-6 col-lg-3">
                        <div class="vendor-card">
                            {{-- <img src="{{ asset('img/baner-1.png') }}" class="vendor-cover" alt=""> --}}
                            <div class="text-center px-3 pb-4">
                                @if ($product->hasMedia('shop_logo'))
                                    <img src="{{ $user->getFirstMediaUrl('shop_logo', 'logo') }}"
                                        class="vendor-logo mb-2" alt="{{ $vendor->name }}">
                                @else
                                    <img src="https://picsum.photos/{{ $vendor->id + 100 }}/{{ $vendor->id + 100 }}"
                                        class="vendor-logo mb-2" alt="{{ $product->name }}">
                                @endif
                                {{-- <img src="{{ asset('img/testimonial-1.jpg') }}" class="vendor-logo mb-2" alt=""> --}}
                                <h5 class="mb-0">Green Valley Farms <i
                                        class="fas fa-check-circle vendor-badge-verified"></i></h5>
                                <div class="rating d-flex justify-content-center my-2">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    <span class="rating-count">(4.5)</span>
                                </div>
                                <p class="vendor-stats mb-3">128 Products</p>
                                <a href="vendor-detail.html"
                                    class="btn border border-secondary rounded-pill px-4 py-1 text-primary">Visit
                                    Store</a>
                            </div>
                        </div>
                    </div>

                @empty
                <p>No vendor found...</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Top Vendors End -->


@endsection
