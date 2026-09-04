@extends('admin.layouts.app')

@section('title', 'Add / Edit Vendor')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Vendors"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-8">
                <form>
                  <div class="card card-primary card-outline mb-3">
                    <div class="card-header">
                      <h3 class="card-title">Store Information</h3>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" for="v-store-name">Store name</label>
                          <input type="text" class="form-control" id="v-store-name" placeholder="e.g. Nova Electronics">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-store-slug">Store URL slug</label>
                          <div class="input-group">
                            <span class="input-group-text">marthub.com/</span>
                            <input type="text" class="form-control" id="v-store-slug" placeholder="nova-electronics">
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label" for="v-store-desc">Store description</label>
                          <textarea class="form-control" id="v-store-desc" rows="3" placeholder="Short description shown on the vendor storefront"></textarea>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-category">Primary category</label>
                          <select class="form-select" id="v-category">
                            <option selected="">Electronics</option>
                            <option>Fashion &amp; Apparel</option>
                            <option>Home &amp; Living</option>
                            <option>Beauty &amp; Health</option>
                            <option>Groceries</option>
                            <option>Sports &amp; Outdoors</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-commission">Commission rate (%)</label>
                          <input type="number" class="form-control" id="v-commission" value="12" min="0" max="100">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card card-primary card-outline mb-3">
                    <div class="card-header">
                      <h3 class="card-title">Owner &amp; Contact</h3>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" for="v-owner-name">Owner full name</label>
                          <input type="text" class="form-control" id="v-owner-name" placeholder="Jane Rivera">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-owner-email">Email</label>
                          <input type="email" class="form-control" id="v-owner-email" placeholder="jane@novaelec.com">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-owner-phone">Phone</label>
                          <input type="tel" class="form-control" id="v-owner-phone" placeholder="+1 (555) 010-2938">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-owner-country">Country</label>
                          <select class="form-select" id="v-owner-country">
                            <option selected="">United States</option>
                            <option>Bangladesh</option>
                            <option>United Kingdom</option>
                            <option>Canada</option>
                            <option>Germany</option>
                            <option>India</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <label class="form-label" for="v-address">Business address</label>
                          <input type="text" class="form-control" id="v-address" placeholder="Street address, city, state, ZIP">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card card-primary card-outline mb-3">
                    <div class="card-header">
                      <h3 class="card-title">Payout Details</h3>
                    </div>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" for="v-bank-name">Bank name</label>
                          <input type="text" class="form-control" id="v-bank-name" placeholder="First National Bank">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-account-no">Account number</label>
                          <input type="text" class="form-control" id="v-account-no" placeholder="•••• •••• •••• 4821">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-payout-schedule">Payout schedule</label>
                          <select class="form-select" id="v-payout-schedule">
                            <option selected="">Weekly</option>
                            <option>Bi-weekly</option>
                            <option>Monthly</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="v-min-payout">Minimum payout amount</label>
                          <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="v-min-payout" value="50">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Save Vendor</button>
                    <a href="./vendors-list.html" class="btn btn-outline-secondary">Cancel</a>
                  </div>
                </form>
              </div>

              <div class="col-lg-4">
                <div class="card card-outline card-primary mb-3">
                  <div class="card-header"><h3 class="card-title">Store Logo</h3></div>
                  <div class="card-body text-center">
                    <img src="{{ asset('img/user4-128x128.jpg') }}" class="rounded shadow mb-3" style="width:120px;height:120px;object-fit:cover;" alt="Store logo preview">
                    <div>
                      <label for="v-logo-upload" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-upload me-1"></i>Upload logo
                      </label>
                      <input type="file" id="v-logo-upload" class="d-none" accept="image/*">
                    </div>
                    <p class="text-secondary fs-7 mt-2 mb-0">Recommended: 400×400px, JPG or PNG</p>
                  </div>
                </div>

                <div class="card card-outline card-secondary mb-3">
                  <div class="card-header"><h3 class="card-title">Approval Status</h3></div>
                  <div class="card-body">
                    <label class="form-label" for="v-status">Vendor status</label>
                    <select class="form-select" id="v-status">
                      <option>Pending Approval</option>
                      <option selected="">Approved</option>
                      <option>Suspended</option>
                    </select>
                    <div class="form-check form-switch mt-3">
                      <input class="form-check-input" type="checkbox" role="switch" id="v-featured" checked="">
                      <label class="form-check-label" for="v-featured">Featured vendor</label>
                    </div>
                    <div class="form-check form-switch mt-2">
                      <input class="form-check-input" type="checkbox" role="switch" id="v-verified" checked="">
                      <label class="form-check-label" for="v-verified">Verified badge</label>
                    </div>
                  </div>
                </div>

                <div class="card card-outline card-info">
                  <div class="card-header"><h3 class="card-title">Documents</h3></div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="bi bi-file-earmark-text me-2"></i>Business License</span>
                        <span class="badge text-bg-success">Verified</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="bi bi-file-earmark-text me-2"></i>Tax ID</span>
                        <span class="badge text-bg-success">Verified</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="bi bi-file-earmark-text me-2"></i>ID Proof</span>
                        <span class="badge text-bg-warning">Pending</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </main>
@endsection
