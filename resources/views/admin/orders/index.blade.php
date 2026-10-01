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
                                            <input type="search" class="form-control"
                                                placeholder="Search order # or customer…" aria-label="Search orders">
                                            <button class="btn btn-outline-secondary" type="button"><i
                                                    class="bi bi-search"></i></button>
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

                                            {{-- 
                          
                          "id" => 5
          "user_id" => null
          "guest_name" => "Kamal Dillon"
          "guest_email" => "lolacofu@mailinator.com"
          "guest_phone" => "+8801123625993"
          "order_number" => "2026-10-01 05:58:38"
          "shipping_address_id" => null
          "shipping_recipient_name" => "Kamal Dillon"
          "shipping_phone" => "+8801123625993"
          "shipping_address_line" => "Obcaecati sed aute i"
          "shipping_district" => "Aut cupiditate aut f"
          "subtotal_amount" => "747.31"
          "shipping_fee" => "120.00"
          "total_amount" => "867.31"
          "order_status_id" => 1
          "created_at" => "2026-10-01 05:58:38"
          "updated_at" => "2026-10-01 05:58:38"
        ]
                          --}}
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Customer</th>
                                                {{-- <th scope="col">Vendor(s)</th> --}}
                                                {{-- <th scope="col">Items</th> --}}
                                                <th scope="col">Total</th>
                                                {{-- <th scope="col">Payment</th> --}}
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th class="text-end" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td><a href="{{ route('admin.orders.show', $order) }}"
                                                            class="fw-medium text-decoration-none">#ORD-{{ $order->order_number }}</a>
                                                    </td>
                                                    <td>{{ $order->guest_name }}</td>
                                                    {{-- <td>Nova Electronics</td> --}}
                                                    {{-- <td>2</td> --}}
                                                    <td>{{ $order->total_amount }}৳</td>
                                                    {{-- <td><span class="badge text-bg-success">Paid</span></td> --}}
                                                    <td><span
                                                            class="badge text-bg-success">{{ $order->order_status_id }}</span>
                                                    </td>
                                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                    <td class="text-end">
                                                        <a href="./order-details.html"
                                                            class="btn btn-sm btn-outline-secondary"
                                                            aria-label="View ORD-10234"><i class="bi bi-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>No orders found.</p>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <x-admin.pagination :for="$orders" />

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
