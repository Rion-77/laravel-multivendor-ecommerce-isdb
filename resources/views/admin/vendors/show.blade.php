@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Vendor Profile"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-4">
                <div class="card card-primary card-outline">
                  <div class="card-body text-center">
                    <img src="{{ asset('img/user4-128x128.jpg') }}" alt="Nova Electronics logo" class="rounded-circle shadow" style="width:100px;height:100px;object-fit:cover;">
                    <h3 class="mt-3 mb-0">Nova Electronics</h3>
                    <p class="text-secondary mb-2">marthub.com/nova-electronics</p>
                    <span class="badge text-bg-success mb-3"><i class="bi bi-patch-check-fill me-1"></i>Verified Vendor</span>
                    <div class="d-flex justify-content-center gap-2">
                      <a href="./vendor-add.html" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil me-1"></i>Edit</a>
                      <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-slash-circle me-1"></i>Suspend</button>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between px-3">
                      <span class="text-secondary"><i class="bi bi-envelope me-2"></i>Email</span>
                      <span>contact@novaelec.com</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-3">
                      <span class="text-secondary"><i class="bi bi-telephone me-2"></i>Phone</span>
                      <span>+1 (555) 010-2938</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-3">
                      <span class="text-secondary"><i class="bi bi-tags me-2"></i>Category</span>
                      <span>Electronics</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-3">
                      <span class="text-secondary"><i class="bi bi-percent me-2"></i>Commission</span>
                      <span>12%</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-3">
                      <span class="text-secondary"><i class="bi bi-calendar3 me-2"></i>Joined</span>
                      <span>Feb 03, 2024</span>
                    </li>
                  </ul>
                </div>

                <div class="card card-outline card-secondary">
                  <div class="card-header"><h3 class="card-title">Payout Summary</h3></div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                      <span class="text-secondary">Available balance</span>
                      <span class="fw-semibold">$4,210.50</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span class="text-secondary">Pending clearance</span>
                      <span class="fw-semibold">$1,020.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="text-secondary">Lifetime payouts</span>
                      <span class="fw-semibold">$92,410.00</span>
                    </div>
                    <a href="./payouts.html" class="btn btn-sm btn-outline-secondary w-100 mt-3">View Payout History</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="row mb-3 g-3">
                  <div class="col-6 col-md-3">
                    <div class="card text-center">
                      <div class="card-body py-3">
                        <div class="fs-4 fw-semibold">189</div>
                        <div class="text-secondary fs-7">Products</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="card text-center">
                      <div class="card-body py-3">
                        <div class="fs-4 fw-semibold">980</div>
                        <div class="text-secondary fs-7">Orders</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="card text-center">
                      <div class="card-body py-3">
                        <div class="fs-4 fw-semibold">4.6<i class="bi bi-star-fill text-warning ms-1 fs-7"></i></div>
                        <div class="text-secondary fs-7">Rating</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="card text-center">
                      <div class="card-body py-3">
                        <div class="fs-4 fw-semibold">$92.4k</div>
                        <div class="text-secondary fs-7">Revenue</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="vendor-tabs" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-products-btn" data-bs-toggle="tab" data-bs-target="#tab-products" type="button" role="tab" aria-selected="true">Products</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-orders-btn" data-bs-toggle="tab" data-bs-target="#tab-orders" type="button" role="tab" aria-selected="false" tabindex="-1">Recent Orders</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-reviews-btn" data-bs-toggle="tab" data-bs-target="#tab-reviews" type="button" role="tab" aria-selected="false" tabindex="-1">Reviews</button>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="tab-products" role="tabpanel" aria-labelledby="tab-products-btn">
                        <div class="row g-3">
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-1.jpg') }}" class="card-img-top" alt="Wireless Earbuds Pro" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">Wireless Earbuds Pro</div>
                                <div class="text-secondary fs-7">$79.00</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-2.jpg') }}" class="card-img-top" alt="Smart Watch Series 5" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">Smart Watch Series 5</div>
                                <div class="text-secondary fs-7">$149.00</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-3.jpg') }}" class="card-img-top" alt="4K Action Camera" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">4K Action Camera</div>
                                <div class="text-secondary fs-7">$219.00</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-4.jpg') }}" class="card-img-top" alt="Portable SSD 1TB" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">Portable SSD 1TB</div>
                                <div class="text-secondary fs-7">$95.00</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-5.jpg') }}" class="card-img-top" alt="Bluetooth Speaker" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">Bluetooth Speaker</div>
                                <div class="text-secondary fs-7">$59.00</div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-md-4">
                            <div class="card h-100">
                              <img src="{{ asset('img/prod-1.jpg') }}" class="card-img-top" alt="Noise Cancelling Headset" style="height:120px;object-fit:cover;">
                              <div class="card-body p-2">
                                <div class="fs-7 fw-medium text-truncate">Noise Cancelling Headset</div>
                                <div class="text-secondary fs-7">$189.00</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a href="./products-list.html" class="btn btn-sm btn-outline-secondary mt-3">View all products</a>
                      </div>

                      <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-btn">
                        <div class="table-responsive">
                          <table class="table table-sm table-hover align-middle" role="table">
                            <thead>
                              <tr><th scope="col">Order</th><th scope="col">Customer</th><th scope="col">Amount</th><th scope="col">Status</th><th scope="col">Date</th></tr>
                            </thead>
                            <tbody>
                              <tr><td>#ORD-10234</td><td>Michael Reyes</td><td>$149.00</td><td><span class="badge text-bg-success">Delivered</span></td><td>Sep 02, 2026</td></tr>
                              <tr><td>#ORD-10229</td><td>Sara Ahmed</td><td>$79.00</td><td><span class="badge text-bg-info">Shipped</span></td><td>Sep 01, 2026</td></tr>
                              <tr><td>#ORD-10218</td><td>Daniel Kim</td><td>$219.00</td><td><span class="badge text-bg-warning">Processing</span></td><td>Aug 30, 2026</td></tr>
                              <tr><td>#ORD-10201</td><td>Lena Fischer</td><td>$95.00</td><td><span class="badge text-bg-danger">Cancelled</span></td><td>Aug 28, 2026</td></tr>
                            </tbody>
                          </table>
                        </div>
                        <a href="./orders-list.html" class="btn btn-sm btn-outline-secondary">View all orders</a>
                      </div>

                      <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-btn">
                        <article class="d-flex gap-3 mb-4">
                          <img src="{{ asset('img/user4-128x128.jpg') }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;" alt="">
                          <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                              <span class="fw-medium">Priya Nair</span>
                              <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                            </div>
                            <p class="mb-0 text-secondary fs-7">Fast shipping and the earbuds sound amazing. Will order again.</p>
                          </div>
                        </article>
                        <article class="d-flex gap-3">
                          <img src="{{ asset('img/user5-128x128.jpg') }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;" alt="">
                          <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                              <span class="fw-medium">Tom Becker</span>
                              <span class="text-warning"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i></span>
                            </div>
                            <p class="mb-0 text-secondary fs-7">Good product, packaging could be better.</p>
                          </div>
                        </article>
                        <a href="./reviews.html" class="btn btn-sm btn-outline-secondary mt-3">View all reviews</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </main>
@endsection
