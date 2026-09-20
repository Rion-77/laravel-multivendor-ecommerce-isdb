@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    {{-- <main class="app-main" id="main" tabindex="-1">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Invoice</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <!-- Action bar (hidden on print) -->
            <div class="d-flex justify-content-end gap-2 mb-3 d-print-none">
              <button class="btn btn-outline-secondary" onclick="window.print()" type="button">
                <i class="bi bi-printer me-1" aria-hidden="true"></i>Print
              </button>
              <a href="#" class="btn btn-outline-secondary">
                <i class="bi bi-download me-1" aria-hidden="true"></i>PDF
              </a>
              <a href="#" class="btn btn-primary">
                <i class="bi bi-send me-1" aria-hidden="true"></i>Send invoice
              </a>
            </div>

            <div class="card">
              <div class="card-body p-4 p-md-5">
                <!-- Header -->
                <div class="row mb-4">
                  <div class="col-sm-6">
                    <h2 class="h4 mb-0 text-primary fw-semibold">AdminLTE, Inc.</h2>
                    <p class="text-secondary mb-0 small">
                      795 Folsom Ave, Suite 600<br>
                      San Francisco, CA 94107<br>
                      billing@example.com
                    </p>
                  </div>
                  <div class="col-sm-6 text-sm-end">
                    <h1 class="h2 mb-1">Invoice</h1>
                    <p class="text-secondary mb-0">
                      <span class="fw-semibold">#</span>INV-2026-00428
                    </p>
                    <span class="badge text-bg-success mt-1">Paid</span>
                  </div>
                </div>

                <!-- Billing details -->
                <div class="row mb-4">
                  <div class="col-sm-6">
                    <p class="text-secondary small mb-1">Billed to</p>
                    <p class="mb-0 fw-semibold">Acme Corporation</p>
                    <p class="text-secondary small mb-0">
                      Attn: Jane Doe<br>
                      1234 Market Street<br>
                      San Francisco, CA 94103
                    </p>
                  </div>
                  <div class="col-sm-6 text-sm-end">
                    <p class="text-secondary small mb-1">Issue date</p>
                    <p class="mb-2">May 18, 2026</p>
                    <p class="text-secondary small mb-1">Due date</p>
                    <p class="mb-0">June 1, 2026</p>
                  </div>
                </div>

                <!-- Items -->
                <div class="table-responsive mb-3">
                  <table class="table align-middle mb-0" role="table">
                    <thead>
                      <tr>
                        <th class="border-top-0" scope="col">Description</th>
                        <th class="border-top-0 text-end" style="width: 6rem" scope="col">Qty</th>
                        <th class="border-top-0 text-end" style="width: 9rem" scope="col">Unit price</th>
                        <th class="border-top-0 text-end" style="width: 9rem" scope="col">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">Pro plan subscription</p>
                          <small class="text-secondary">May 18 - Jun 18, 2026</small>
                        </td>
                        <td class="text-end">1</td>
                        <td class="text-end">$29.00</td>
                        <td class="text-end">$29.00</td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">Additional seats</p>
                          <small class="text-secondary">Pro-rated for current period</small>
                        </td>
                        <td class="text-end">3</td>
                        <td class="text-end">$12.50</td>
                        <td class="text-end">$37.50</td>
                      </tr>
                      <tr>
                        <td>
                          <p class="mb-0 fw-semibold">SMS notifications add-on</p>
                          <small class="text-secondary">1,000 messages</small>
                        </td>
                        <td class="text-end">1</td>
                        <td class="text-end">$5.00</td>
                        <td class="text-end">$5.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Totals -->
                <div class="row justify-content-end">
                  <div class="col-md-5 col-lg-4">
                    <dl class="row mb-0">
                      <dt class="col-7 text-secondary fw-normal">Subtotal</dt>
                      <dd class="col-5 text-end mb-2">$71.50</dd>
                      <dt class="col-7 text-secondary fw-normal">Tax (8.25%)</dt>
                      <dd class="col-5 text-end mb-2">$5.90</dd>
                      <dt class="col-7 fw-semibold border-top pt-2">Total due</dt>
                      <dd class="col-5 text-end fw-semibold border-top pt-2 mb-0">$77.40 USD</dd>
                    </dl>
                  </div>
                </div>

                <!-- Footer note -->
                <hr class="my-4">
                <p class="text-secondary small mb-0">
                  Thanks for your business. Payment is due within 14 days. If you have any questions
                  about this invoice, please contact
                  <a href="mailto:billing@example.com">billing@example.com</a>.
                </p>
              </div>
            </div>
          </div>
        </div>
      </main>
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
    </main> --}}
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Order #ORD-10234"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <!-- Action bar (hidden on print) -->
                <div class="d-flex justify-content-end gap-2 mb-3 d-print-none">
                    <button class="btn btn-outline-secondary" onclick="window.print()" type="button">
                        <i class="bi bi-printer me-1" aria-hidden="true"></i>Print
                    </button>
                    <a href="#" class="btn btn-outline-secondary">
                        <i class="bi bi-download me-1" aria-hidden="true"></i>PDF
                    </a>
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-send me-1" aria-hidden="true"></i>Send order
                    </a>
                </div>

                <div class="row">
                    <!-- Printable order card -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body p-4 p-md-5">

                                <!-- Header -->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <h2 class="h4 mb-0 text-primary fw-semibold">Nova Electronics</h2>
                                        <p class="text-secondary mb-0 small">
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            billing@example.com
                                        </p>
                                    </div>
                                    <div class="col-sm-6 text-sm-end">
                                        <h1 class="h2 mb-1">Order</h1>
                                        <p class="text-secondary mb-0">
                                            <span class="fw-semibold">#</span>ORD-10234
                                        </p>
                                        <span class="badge text-bg-success mt-1">Delivered</span>
                                    </div>
                                </div>

                                <!-- Customer / shipping / order info -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <p class="text-secondary small mb-1">Customer</p>
                                        <p class="mb-0 fw-semibold">Michael Reyes</p>
                                        <p class="text-secondary small mb-0">
                                            michael.reyes@example.com<br>
                                            +1 (555) 320-7743
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-secondary small mb-1">Shipping address</p>
                                        <p class="mb-0 fw-semibold">2891 Maple Street</p>
                                        <p class="text-secondary small mb-0">
                                            Austin, TX 78701<br>
                                            United States
                                        </p>
                                    </div>
                                    <div class="col-sm-4 text-sm-end">
                                        <p class="text-secondary small mb-1">Order info</p>
                                        <p class="mb-0">Placed: Sep 02, 2026</p>
                                        <p class="mb-0">Payment: <span class="badge text-bg-success">Paid</span></p>
                                        <p class="mb-0">Method: Visa •••• 4821</p>
                                    </div>
                                </div>

                                <!-- Items -->
                                <div class="table-responsive mb-3">
                                    <table class="table align-middle mb-0" role="table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" scope="col">Product</th>
                                                <th class="border-top-0 text-end" style="width: 6rem" scope="col">Qty
                                                </th>
                                                <th class="border-top-0 text-end" style="width: 9rem" scope="col">Unit
                                                    price</th>
                                                <th class="border-top-0 text-end" style="width: 9rem" scope="col">Amount
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-1.jpg') }}" alt=""
                                                            class="rounded me-2 d-print-none"
                                                            style="width:40px;height:40px;object-fit:cover;">
                                                        <p class="mb-0 fw-semibold">Wireless Earbuds Pro</p>
                                                    </div>
                                                </td>
                                                <td class="text-end">1</td>
                                                <td class="text-end">$79.00</td>
                                                <td class="text-end">$79.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-2.jpg') }}" alt=""
                                                            class="rounded me-2 d-print-none"
                                                            style="width:40px;height:40px;object-fit:cover;">
                                                        <p class="mb-0 fw-semibold">Smart Watch Series 5</p>
                                                    </div>
                                                </td>
                                                <td class="text-end">1</td>
                                                <td class="text-end">$149.00</td>
                                                <td class="text-end">$149.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Totals -->
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-4">
                                        <dl class="row mb-0">
                                            <dt class="col-7 text-secondary fw-normal">Subtotal</dt>
                                            <dd class="col-5 text-end mb-2">$228.00</dd>
                                            <dt class="col-7 text-secondary fw-normal">Shipping</dt>
                                            <dd class="col-5 text-end mb-2">$0.00</dd>
                                            <dt class="col-7 text-secondary fw-normal">Tax</dt>
                                            <dd class="col-5 text-end mb-2">$0.00</dd>
                                            <dt class="col-7 fw-semibold border-top pt-2">Total</dt>
                                            <dd class="col-5 text-end fw-semibold border-top pt-2 mb-0">$228.00</dd>
                                        </dl>
                                    </div>
                                </div>

                                <!-- Timeline (kept visible on print as order history) -->
                                <hr class="my-4">
                                <p class="text-secondary small mb-2">Order timeline</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex gap-3 mb-3">
                                        <div class="flex-shrink-0 rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center d-print-none"
                                            style="width:32px;height:32px;">
                                            <i class="bi bi-check-lg"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium fs-7">Order delivered</p>
                                            <p class="mb-0 text-secondary fs-7">Sep 04, 2026 — 10:12 AM</p>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 mb-3">
                                        <div class="flex-shrink-0 rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center d-print-none"
                                            style="width:32px;height:32px;">
                                            <i class="bi bi-truck"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium fs-7">Order shipped</p>
                                            <p class="mb-0 text-secondary fs-7">Sep 03, 2026 — 08:40 AM</p>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3">
                                        <div class="flex-shrink-0 rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center d-print-none"
                                            style="width:32px;height:32px;">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-medium fs-7">Order placed</p>
                                            <p class="mb-0 text-secondary fs-7">Sep 02, 2026 — 03:15 PM</p>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Footer note -->
                                <hr class="my-4">
                                <p class="text-secondary small mb-0">
                                    Thanks for your business. If you have any questions about this order, please contact
                                    <a href="mailto:billing@example.com">billing@example.com</a>.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- Sidebar controls (hidden on print) -->
                    <div class="col-lg-4 d-print-none">
                        <div class="card card-outline card-primary mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Order Status</h3>
                            </div>
                            <div class="card-body">
                                <select class="form-select mb-3" aria-label="Update order status">
                                    <option>Processing</option>
                                    <option>Shipped</option>
                                    <option selected="">Delivered</option>
                                    <option>Cancelled</option>
                                    <option>Refunded</option>
                                </select>
                                <button type="button" class="btn btn-primary w-100 mb-2"><i
                                        class="bi bi-check-lg me-1"></i>Update Status</button>
                                <button type="button" class="btn btn-outline-danger w-100"><i
                                        class="bi bi-arrow-counterclockwise me-1"></i>Issue Refund</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
