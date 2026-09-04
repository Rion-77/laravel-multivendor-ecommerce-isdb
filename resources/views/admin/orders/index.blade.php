@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Orders"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-12">
                <div class="row mb-3 g-3">
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body d-flex align-items-center">
                        <div class="fs-2 text-primary me-3"><i class="bi bi-cart-check"></i></div>
                        <div>
                          <div class="fs-4 fw-semibold">6,540</div>
                          <div class="text-secondary fs-7">Total Orders</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body d-flex align-items-center">
                        <div class="fs-2 text-warning me-3"><i class="bi bi-hourglass-split"></i></div>
                        <div>
                          <div class="fs-4 fw-semibold">148</div>
                          <div class="text-secondary fs-7">Processing</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body d-flex align-items-center">
                        <div class="fs-2 text-info me-3"><i class="bi bi-truck"></i></div>
                        <div>
                          <div class="fs-4 fw-semibold">92</div>
                          <div class="text-secondary fs-7">Shipped</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                    <div class="card">
                      <div class="card-body d-flex align-items-center">
                        <div class="fs-2 text-danger me-3"><i class="bi bi-x-circle"></i></div>
                        <div>
                          <div class="fs-4 fw-semibold">34</div>
                          <div class="text-secondary fs-7">Cancelled</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">All Orders</h3>
                    <div class="card-tools">
                      <div class="d-flex gap-2">
                        <div class="input-group input-group-sm" style="width: 220px;">
                          <input type="search" class="form-control" placeholder="Search order # or customer…" aria-label="Search orders">
                          <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                        <select class="form-select form-select-sm w-auto" aria-label="Filter by status">
                          <option selected="">All statuses</option>
                          <option>Processing</option>
                          <option>Shipped</option>
                          <option>Delivered</option>
                          <option>Cancelled</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0" role="table">
                        <thead>
                          <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Vendor(s)</th>
                            <th scope="col">Items</th>
                            <th scope="col">Total</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th class="text-end" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10234</a></td>
                            <td>Michael Reyes</td>
                            <td>Nova Electronics</td>
                            <td>2</td>
                            <td>$228.00</td>
                            <td><span class="badge text-bg-success">Paid</span></td>
                            <td><span class="badge text-bg-success">Delivered</span></td>
                            <td>Sep 02, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10234"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10233</a></td>
                            <td>Sara Ahmed</td>
                            <td>Aarav Textiles Co.</td>
                            <td>1</td>
                            <td>$42.00</td>
                            <td><span class="badge text-bg-success">Paid</span></td>
                            <td><span class="badge text-bg-info">Shipped</span></td>
                            <td>Sep 02, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10233"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10231</a></td>
                            <td>Daniel Kim</td>
                            <td>Urban Sole Footwear, Nova Electronics</td>
                            <td>3</td>
                            <td>$293.00</td>
                            <td><span class="badge text-bg-success">Paid</span></td>
                            <td><span class="badge text-bg-warning">Processing</span></td>
                            <td>Sep 01, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10231"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10228</a></td>
                            <td>Lena Fischer</td>
                            <td>GreenLeaf Organics</td>
                            <td>5</td>
                            <td>$61.50</td>
                            <td><span class="badge text-bg-warning">Pending</span></td>
                            <td><span class="badge text-bg-warning">Processing</span></td>
                            <td>Sep 01, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10228"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10221</a></td>
                            <td>Priya Nair</td>
                            <td>Pixel Gadgets Store</td>
                            <td>1</td>
                            <td>$95.00</td>
                            <td><span class="badge text-bg-success">Paid</span></td>
                            <td><span class="badge text-bg-danger">Cancelled</span></td>
                            <td>Aug 30, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10221"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10219</a></td>
                            <td>Tom Becker</td>
                            <td>Bloom &amp; Co. Home Decor</td>
                            <td>2</td>
                            <td>$68.00</td>
                            <td><span class="badge text-bg-success">Paid</span></td>
                            <td><span class="badge text-bg-success">Delivered</span></td>
                            <td>Aug 29, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10219"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="./order-details.html" class="fw-medium text-decoration-none">#ORD-10214</a></td>
                            <td>Aisha Rahman</td>
                            <td>Nova Electronics</td>
                            <td>1</td>
                            <td>$149.00</td>
                            <td><span class="badge text-bg-danger">Failed</span></td>
                            <td><span class="badge text-bg-warning">Processing</span></td>
                            <td>Aug 28, 2026</td>
                            <td class="text-end">
                              <a href="./order-details.html" class="btn btn-sm btn-outline-secondary" aria-label="View ORD-10214"><i class="bi bi-eye"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="text-secondary fs-7">Showing 1 to 7 of 6,540 orders</span>
                    <nav aria-label="Orders pagination">
                      <ul class="pagination pagination-sm m-0">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </main>
@endsection
