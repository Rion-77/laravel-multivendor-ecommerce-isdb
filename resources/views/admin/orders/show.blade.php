@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="{{ '#ORD-' .$order->order_number }}"></x-admin.content-header>

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
                                    {{-- <div class="col-sm-6">
                                        <h2 class="h4 mb-0 text-primary fw-semibold">Nova Electronics</h2>
                                        <p class="text-secondary mb-0 small">
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            billing@example.com
                                        </p>
                                    </div> --}}
                                    <div class="col-sm-6 text-sm-start">
                                        <h1 class="h2 mb-1">Order</h1>
                                        <p class="text-secondary mb-0">
                                            <span class="fw-semibold">#</span>ORD-{{ $order->order_number }}
                                        </p>
                                        <span class="badge text-bg-success mt-1">Delivered</span>
                                    </div>
                                </div>

                                <!-- Customer / shipping / order info -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <p class="text-secondary small mb-1">Customer</p>
                                        <p class="mb-0 fw-semibold">{{ $order->shipping_recipient_name }}</p>
                                        <p class="text-secondary small mb-0">
                                            {{ $order->guest_email }}<br>
                                            {{ $order->shipping_phone }}
                                        </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-secondary small mb-1">Shipping address</p>
                                        <p class="mb-0 fw-semibold">{{ $order->shipping_district }}</p>
                                        <p class="text-secondary small mb-0">{{ $order->shipping_address_line }}</p>
                                    </div>
                                    <div class="col-sm-4 text-sm-end">
                                        <p class="text-secondary small mb-1">Order info</p>
                                        <p class="mb-0">Placed: {{ $order->created_at->format('M d, Y') }}</p>
                                        {{-- <p class="mb-0">Payment: <span class="badge text-bg-success">Paid</span></p> --}}
                                        <p class="mb-0">Method: Cash On Delivery</p>
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
                                            @foreach ($order_items as $order_item)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ $order_item->product->hasMedia('product_image') ? $order_item->product->getFirstMediaUrl('product_image', 'thumbnail') : 'https://placehold.co/400' }}"
                                                                alt="" class="rounded me-2 d-print-none"
                                                                style="width:40px;height:40px;object-fit:cover;">
                                                            <p class="mb-0 fw-semibold">{{ $order_item->product->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">{{ $order_item->quantity }}</td>
                                                    <td class="text-end">{{ $order_item->unit_price }}৳</td>
                                                    <td class="text-end">
                                                        {{ $order_item->quantity * $order_item->unit_price }}৳</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Totals -->
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-4">
                                        <dl class="row mb-0">
                                            <dt class="col-7 text-secondary fw-normal">Subtotal</dt>
                                            <dd class="col-5 text-end mb-2">{{ $order->subtotal_amount }}৳</dd>
                                            <dt class="col-7 text-secondary fw-normal">Shipping</dt>
                                            <dd class="col-5 text-end mb-2">{{ $order->shipping_fee }}৳</dd>

                                            <dt class="col-7 fw-semibold border-top pt-2">Total</dt>
                                            <dd class="col-5 text-end fw-semibold border-top pt-2 mb-0">
                                                {{ $order->total_amount }}৳</dd>
                                        </dl>
                                    </div>
                                </div>

                                <!-- Timeline (kept visible on print as order history) -->
                                {{-- <hr class="my-4">
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
                                </ul> --}}

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
