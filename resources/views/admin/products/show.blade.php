@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
    <main class="app-main">

        <x-admin.content-header title="Products"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">
            <!--begin::Title row with quick actions-->
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
              <div>
                <h2 class="fs-4 mb-1">{{ $product->name }}</h2>
                {{-- <div class="d-flex flex-wrap gap-2 align-items-center">
                  <span class="badge text-bg-success">Published</span>
                  <span class="text-secondary fs-7">SKU: WEP-2201</span>
                  <span class="text-secondary fs-7">•</span>
                  <span class="text-secondary fs-7">Product ID: #10245</span>
                </div> --}}
              </div>
              <div class="d-flex gap-2">
                <a href="#" class="btn btn-outline-secondary">
                  <i class="bi bi-arrow-left me-1"></i>Back to list
                </a>
                <a href="#" class="btn btn-primary">
                  <i class="bi bi-pencil-square me-1"></i>Edit Product
                </a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                  <i class="bi bi-trash me-1"></i>Delete
                </button>
              </div>
            </div>
            <!--end::Title row-->

            <div class="row">
              <!--begin::Left column-->
              <div class="col-lg-8">
                <!--begin::Gallery card-->
                <div class="card card-primary card-outline mb-3">
                  <div class="card-header">
                    <h3 class="card-title">Product Image</h3>
                  </div>
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-12">
                        <img id="mainProductImage" src="./assets/img/prod-1.jpg" alt="Wireless Earbuds Pro - main image" class="product-gallery-main">
                      </div>
                      <div class="col-12">
                        <div class="row g-2">
                          <div class="col-3">
                            <img src="./assets/img/prod-1.jpg" alt="Wireless Earbuds Pro thumbnail 1" class="product-gallery-thumb active" onclick="document.getElementById('mainProductImage').src=this.src; document.querySelectorAll('.product-gallery-thumb').forEach(t=&gt;t.classList.remove('active')); this.classList.add('active');">
                          </div>
                          <div class="col-3">
                            <img src="./assets/img/prod-2.jpg" alt="Wireless Earbuds Pro thumbnail 2" class="product-gallery-thumb" onclick="document.getElementById('mainProductImage').src=this.src; document.querySelectorAll('.product-gallery-thumb').forEach(t=&gt;t.classList.remove('active')); this.classList.add('active');">
                          </div>
                          <div class="col-3">
                            <img src="./assets/img/prod-3.jpg" alt="Wireless Earbuds Pro thumbnail 3" class="product-gallery-thumb" onclick="document.getElementById('mainProductImage').src=this.src; document.querySelectorAll('.product-gallery-thumb').forEach(t=&gt;t.classList.remove('active')); this.classList.add('active');">
                          </div>
                          <div class="col-3">
                            <img src="./assets/img/prod-4.jpg" alt="Wireless Earbuds Pro thumbnail 4" class="product-gallery-thumb" onclick="document.getElementById('mainProductImage').src=this.src; document.querySelectorAll('.product-gallery-thumb').forEach(t=&gt;t.classList.remove('active')); this.classList.add('active');">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end::Gallery card-->

                <!--begin::General information card-->
                <div class="card card-primary card-outline mb-3">
                  <div class="card-header">
                    <h3 class="card-title">General Information</h3>
                  </div>
                  <div class="card-body">
                    <dl class="mb-0">
                      <div class="detail-row">
                        <dt>Product name</dt>
                        <dd>Wireless Earbuds Pro</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Vendor</dt>
                        <dd>Nova Electronics</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Category</dt>
                        <dd><span class="badge text-bg-secondary">Electronics &amp; Accessories</span></dd>
                      </div>
                      <div class="detail-row">
                        <dt>Brand</dt>
                        <dd><span class="badge text-bg-secondary">SoundWave</span></dd>
                      </div>
                    </dl>
                    <hr>
                    <h4 class="fs-6 mb-2">Description</h4>
                    <p class="mb-0 text-body">
                      Premium true-wireless earbuds featuring active noise cancellation, 30-hour total
                      battery life with the charging case, IPX5 sweat resistance, and a low-latency
                      gaming mode. Includes three sizes of memory-foam ear tips for a secure,
                      all-day comfortable fit.
                    </p>
                  </div>
                </div>
                <!--end::General information card-->
              </div>
              <!--end::Left column-->

              <!--begin::Right column-->
              <div class="col-lg-4">
                <!--begin::Pricing card-->
                <div class="card card-outline card-success mb-3">
                  <div class="card-header">
                    <h3 class="card-title">Pricing &amp; Inventory</h3>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-baseline gap-2 mb-1">
                      <span class="price-offer text-success">$79.00</span>
                      <span class="price-base-struck">$89.00</span>
                    </div>
                    <span class="badge text-bg-danger mb-3">11% OFF</span>
                    <dl class="mb-0">
                      <div class="detail-row">
                        <dt>Base price</dt>
                        <dd>$89.00</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Offer price</dt>
                        <dd>$79.00</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Stock quantity</dt>
                        <dd>142 units</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Weight</dt>
                        <dd>0.25 kg</dd>
                      </div>
                    </dl>
                  </div>
                </div>
                <!--end::Pricing card-->

                <!--begin::Status card-->
                <div class="card card-outline card-secondary mb-3">
                  <div class="card-header">
                    <h3 class="card-title">Status</h3>
                  </div>
                  <div class="card-body">
                    <dl class="mb-0">
                      <div class="detail-row">
                        <dt>Visibility</dt>
                        <dd><span class="badge text-bg-success">Published</span></dd>
                      </div>
                      <div class="detail-row">
                        <dt>Featured</dt>
                        <dd><span class="badge text-bg-info">Homepage</span></dd>
                      </div>
                      <div class="detail-row">
                        <dt>Created</dt>
                        <dd>Aug 14, 2026</dd>
                      </div>
                      <div class="detail-row">
                        <dt>Last updated</dt>
                        <dd>Sep 10, 2026</dd>
                      </div>
                    </dl>
                  </div>
                </div>
                <!--end::Status card-->

                <!--begin::Quick actions card-->
                <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                  </div>
                  <div class="card-body d-grid gap-2">
                    <a href="#" class="btn btn-primary">
                      <i class="bi bi-pencil-square me-1"></i>Edit Product
                    </a>
                    <a href="#" class="btn btn-outline-secondary">
                      <i class="bi bi-arrow-left me-1"></i>Back to Product List
                    </a>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                      <i class="bi bi-trash me-1"></i>Delete Product
                    </button>
                  </div>
                </div>
                <!--end::Quick actions card-->
              </div>
              <!--end::Right column-->
            </div>
          </div>
        </div>
    </main>
@endsection
