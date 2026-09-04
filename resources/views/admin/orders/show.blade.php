@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Order #ORD-10234"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Order #ORD-10234</h3>
                    <span class="badge text-bg-success fs-7">Delivered</span>
                  </div>
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <h6 class="text-secondary text-uppercase fs-7">Customer</h6>
                        <p class="mb-1 fw-medium">Michael Reyes</p>
                        <p class="mb-0 text-secondary fs-7">michael.reyes@example.com</p>
                        <p class="mb-0 text-secondary fs-7">+1 (555) 320-7743</p>
                      </div>
                      <div class="col-md-4">
                        <h6 class="text-secondary text-uppercase fs-7">Shipping Address</h6>
                        <p class="mb-0 fs-7">2891 Maple Street<br>Austin, TX 78701<br>United States</p>
                      </div>
                      <div class="col-md-4">
                        <h6 class="text-secondary text-uppercase fs-7">Order Info</h6>
                        <p class="mb-0 fs-7">Placed: Sep 02, 2026</p>
                        <p class="mb-0 fs-7">Payment: <span class="badge text-bg-success">Paid</span></p>
                        <p class="mb-0 fs-7">Method: Visa •••• 4821</p>
                      </div>
                    </div>

                    <h6 class="text-secondary text-uppercase fs-7">Items — Nova Electronics</h6>
                    <div class="table-responsive mb-3">
                      <table class="table align-middle mb-0" role="table">
                        <thead>
                          <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th class="text-end" scope="col">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="{{ asset('img/prod-1.jpg') }}" alt="" class="rounded me-2" style="width:40px;height:40px;object-fit:cover;">
                                Wireless Earbuds Pro
                              </div>
                            </td>
                            <td>$79.00</td>
                            <td>1</td>
                            <td class="text-end">$79.00</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="{{ asset('img/prod-2.jpg') }}" alt="" class="rounded me-2" style="width:40px;height:40px;object-fit:cover;">
                                Smart Watch Series 5
                              </div>
                            </td>
                            <td>$149.00</td>
                            <td>1</td>
                            <td class="text-end">$149.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row justify-content-end">
                      <div class="col-md-5">
                        <table class="table table-sm mb-0" role="table">
                          <tbody>
                            <tr><td class="text-secondary">Subtotal</td><td class="text-end">$228.00</td></tr>
                            <tr><td class="text-secondary">Shipping</td><td class="text-end">$0.00</td></tr>
                            <tr><td class="text-secondary">Tax</td><td class="text-end">$0.00</td></tr>
                            <tr class="fw-semibold"><td>Total</td><td class="text-end">$228.00</td></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="card card-outline card-primary mb-3">
                  <div class="card-header"><h3 class="card-title">Order Status</h3></div>
                  <div class="card-body">
                    <select class="form-select mb-3" aria-label="Update order status">
                      <option>Processing</option>
                      <option>Shipped</option>
                      <option selected="">Delivered</option>
                      <option>Cancelled</option>
                      <option>Refunded</option>
                    </select>
                    <button type="button" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-lg me-1"></i>Update Status</button>
                    <button type="button" class="btn btn-outline-danger w-100"><i class="bi bi-arrow-counterclockwise me-1"></i>Issue Refund</button>
                  </div>
                </div>

                <div class="card card-outline card-secondary">
                  <div class="card-header"><h3 class="card-title">Timeline</h3></div>
                  <div class="card-body">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex gap-3 mb-3">
                        <div class="flex-shrink-0 rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                          <i class="bi bi-check-lg"></i>
                        </div>
                        <div>
                          <p class="mb-0 fw-medium fs-7">Order delivered</p>
                          <p class="mb-0 text-secondary fs-7">Sep 04, 2026 — 10:12 AM</p>
                        </div>
                      </li>
                      <li class="d-flex gap-3 mb-3">
                        <div class="flex-shrink-0 rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                          <i class="bi bi-truck"></i>
                        </div>
                        <div>
                          <p class="mb-0 fw-medium fs-7">Order shipped</p>
                          <p class="mb-0 text-secondary fs-7">Sep 03, 2026 — 08:40 AM</p>
                        </div>
                      </li>
                      <li class="d-flex gap-3">
                        <div class="flex-shrink-0 rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                          <i class="bi bi-bag-check"></i>
                        </div>
                        <div>
                          <p class="mb-0 fw-medium fs-7">Order placed</p>
                          <p class="mb-0 text-secondary fs-7">Sep 02, 2026 — 03:15 PM</p>
                        </div>
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
