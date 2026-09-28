@extends('frontend.layouts.app')

@section('content')
    <!-- Become Vendor Hero Start -->
    <div class="container-fluid py-5 hero-header mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <h4 class="mb-3 text-primary">Grow your business with Fruitables</h4>
                    <h1 class="mb-4 display-4 text-primary">Sell Your Fresh Produce to Thousands of Buyers</h1>
                    <p class="mb-4">Join our multivendor marketplace and reach customers looking for fresh,
                        organic fruits and vegetables. Simple onboarding, transparent fees, weekly payouts.</p>
                    <a href="#apply" class="btn btn-primary rounded-pill px-4 py-3 text-white">Start Selling Today</a>
                </div>
                <div class="col-lg-5">
                    <img src="img/hero-img-1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Become Vendor Hero End -->

    <!-- Why Sell Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>Why Sell on Fruitables?</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-users fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Massive Reach</h5>
                            <p class="mb-0">Get discovered by thousands of active fruit &amp; veg shoppers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-hand-holding-usd fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Low Commission</h5>
                            <p class="mb-0">Keep more of every sale with our transparent, low seller fees.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-chart-line fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Vendor Dashboard</h5>
                            <p class="mb-0">Track orders, earnings and customer reviews in one place.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-truck fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Flexible Fulfillment</h5>
                            <p class="mb-0">Ship it yourself or use our logistics network.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Sell End -->

    <!-- Steps Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>Start Selling in 3 Steps</h1>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="stat-pill h-100 bg-white">
                        <h3>01</h3>
                        <h5>Apply</h5>
                        <p class="mb-0">Tell us about your farm or business using the form below.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-pill h-100 bg-white">
                        <h3>02</h3>
                        <h5>Get Verified</h5>
                        <p class="mb-0">Our team reviews your application, usually within 2 business days.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-pill h-100 bg-white">
                        <h3>03</h3>
                        <h5>List &amp; Sell</h5>
                        <p class="mb-0">Set up your storefront, add products, and start receiving orders.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Steps End -->

    <!-- Application Form Start -->
    <div class="container-fluid py-5" id="apply">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="auth-card">
                        <h1 class="mb-2 text-center">Vendor Application</h1>
                        <p class="text-center mb-4">Fill out the form below and our marketplace team will be in touch.</p>
                        <form action="#">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <input type="text" class="form-control rounded-input"
                                        placeholder="Business / Farm Name *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control rounded-input" placeholder="Contact Person *">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control rounded-input" placeholder="Email Address *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control rounded-input" placeholder="Phone Number *">
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select rounded-input">
                                        <option>Category: Fruits</option>
                                        <option>Category: Vegetables</option>
                                        <option>Category: Organic Mixed</option>
                                        <option>Category: Bread &amp; Bakery</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control rounded-input" placeholder="City, State">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="4" placeholder="Tell us about your products *"></textarea>
                                </div>
                                <div class="col-12 form-check ps-4">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms">
                                    <label class="form-check-label" for="agreeTerms">
                                        I agree to the Fruitables Vendor Guidelines and Terms of Service.
                                    </label>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 text-white">Submit
                                        Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Application Form End -->
@endsection
