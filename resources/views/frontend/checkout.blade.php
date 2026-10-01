@extends('frontend.layouts.app')

@section('title', 'Checkout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div id="checkout-wrapper">
                <h1 class="mb-4">Billing details</h1>

                <!-- Checkout Form -->
                <form action="{{ route('frontend.orders.store') }}" method="post" id="checkoutForm">
                    @csrf
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">

                            <div id="guestBlock">
                                <h5 class="mt-3">Contact Details</h5>

                                <div class="form-item">
                                    <label class="form-label my-3">Full Name<sup>*</sup></label>
                                    <input type="text" class="form-control" name="guest_name" id="guest_name" required>
                                    <x-frontend.error-message name="guest_name" />
                                </div>

                                <div class="form-item">
                                    <label class="form-label my-3">Mobile<sup>*</sup></label>
                                    <input type="tel" class="form-control" name="guest_phone" id="guest_phone" required>
                                    <x-frontend.error-message name="guest_phone" />
                                </div>

                                <div class="form-item">
                                    <label class="form-label my-3">Email Address<sup>*</sup></label>
                                    <input type="email" class="form-control" name="guest_email" required>
                                    <x-frontend.error-message name="guest_email" />
                                </div>

                                {{-- <div class="form-check my-3">
                                <input type="checkbox" class="form-check-input" id="Account-1" name="create_account"
                                    value="1">
                                <label class="form-check-label" for="Account-1">Create an account?</label>
                            </div> --}}
                            </div>
                            <hr>

                            <!-- ========== SHIPPING ========== -->
                            <h5 class="mt-3">Shipping Details</h5>


                            <div class="form-item" id="savedAddressBlock" style="display:none;">
                                <label class="form-label my-3">Saved Address</label>
                                <select class="form-control" name="shipping_address_id">
                                    <option value="">-- Enter a new address --</option>
                                    <!-- <option value="12">Home - House 5, Road 3, Dhaka</option> -->
                                </select>
                                <x-frontend.error-message name="shipping_address_id" />
                            </div>

                            {{-- <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" id="Address-1">
                            <label class="form-check-label" for="Address-1">Ship to a different person?</label>
                        </div> --}}


                            {{-- <div id="recipientBlock" style="display:none;">
                            <div class="form-item">
                                <label class="form-label my-3">Recipient Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="shipping_recipient_name"
                                    id="shipping_recipient_name">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Recipient Mobile<sup>*</sup></label>
                                <input type="tel" class="form-control" name="shipping_phone" id="shipping_phone">
                            </div>
                        </div> --}}

                            <div class="form-item">
                                <label class="form-label my-3">Address<sup>*</sup></label>
                                <input type="text" class="form-control" name="shipping_address_line"
                                    placeholder="House Number, Street Name" required>
                                <x-frontend.error-message name="shipping_address_line" />
                            </div>


                            <div class="form-item">
                                <label class="form-label my-3">District <small>(Optional)</small></label>
                                <input type="text" class="form-control" name="shipping_district">
                                <x-frontend.error-message name="shipping_district" />
                            </div>
                        </div>

                        <!-- ========== ORDER SUMMARY ========== -->
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="bg-light rounded">
                                <div class="p-4 pb-0">
                                    <h1 class="h3 mb-4">Order <span class="fw-normal">Summary</span></h1>
                                </div>
                                <div class="table-responsive px-4">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Products</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="checkout-products-table-body">
                                            <!-- Line items are stored in order_items, not in orders -->
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <img src="img/vegetable-item-2.jpg" class="img-fluid rounded-circle"
                                                            style="width:56px;height:56px;" alt="">
                                                    </div>
                                                </th>
                                                <td class="py-2">Awesome Brocoli</td>
                                                <td class="py-2">$69.00</td>
                                                <td class="py-2">2</td>
                                                <td class="py-2 line-total">$138.00</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-4 pt-0">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="mb-0 me-4">Subtotal</h6>
                                        <p class="mb-0" id="checkoutSubtotalText">$414.00</p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h6 class="mb-0 me-4">Shipping</h6>
                                        <div>
                                            {{-- <div class="form-check text-start">
                                            <input type="radio" class="form-check-input bg-primary border-0"
                                                id="Shipping-1" name="shipping_fee" value="0" data-fee="0"
                                                checked>
                                            <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                        </div> --}}
                                            <div class="form-check text-start">
                                                <input type="radio" class="form-check-input bg-primary border-0"
                                                    id="Shipping-2" name="shipping_fee" value="15" data-fee="15"
                                                    checked>
                                                <label class="form-check-label" for="Shipping-2">Flat rate: 120৳</label>
                                            </div>
                                            <x-frontend.error-message name="shipping_fee" />
                                            {{-- <div class="form-check text-start">
                                            <input type="radio" class="form-check-input bg-primary border-0"
                                                id="Shipping-3" name="shipping_fee" value="8" data-fee="8">
                                            <label class="form-check-label" for="Shipping-3">Local Pickup: $8.00</label>
                                        </div> --}}
                                        </div>
                                    </div>
                                    <div class="py-4 border-top border-bottom d-flex justify-content-between">
                                        <h6 class="mb-0">Total</h6>
                                        <p class="mb-0" id="checkoutTotalText">$414.00</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment method: NOT a column in `orders` (see notes). Kept as radios so only one can be chosen. -->
                            {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Transfer-1"
                                        name="payment_method" value="bank_transfer" required>
                                    <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                                </div>
                                <p class="text-start text-dark">Make your payment directly into our bank account. Please
                                    use your Order ID as the payment reference. Your order will not be shipped until the
                                    funds have cleared in our account.</p>
                            </div>
                        </div> --}}
                            {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Payments-1"
                                        name="payment_method" value="check">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div> --}}
                            <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="radio" class="form-check-input bg-primary border-0"
                                            id="Delivery-1" name="payment_method" value="cod" checked>
                                        <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                    </div>
                                    <x-frontend.error-message name="payment_method" />
                                </div>
                            </div>
                            {{-- <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Paypal-1"
                                        name="payment_method" value="paypal">
                                    <label class="form-check-label" for="Paypal-1">Paypal</label>
                                </div>
                            </div>
                        </div> --}}

                            <!-- Hidden totals: convenience only. Recompute on the server before saving. -->
                            <input type="hidden" name="order_items" id="subtotal_amount" value="">
                            <x-frontend.error-message name="order_items" />

                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit"
                                    class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="empty-checkout-message py-5">
                <div class="text-center bg-light rounded p-4 p-md-5 mx-auto" style="max-width: 720px;">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white text-primary shadow-sm mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="fas fa-shopping-basket fa-2x" aria-hidden="true"></i>
                    </span>
                    <h2 class="h3 mb-2">Your cart is waiting</h2>
                    <p class="text-muted mb-3">There are no items in your cart yet. Find something fresh to get started.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill px-4 py-2">
                        <i class="fas fa-arrow-left me-2" aria-hidden="true"></i>Continue shopping
                    </a>
                </div>
            </div>


        </div>
    </div>
    <!-- Checkout Page End -->


@endsection

@section('scripts')
    <script>
        /*   (function() {
                                        const form = document.getElementById('checkoutForm');
                                        const diffCheck = document.getElementById('Address-1');
                                        const recipientBlock = document.getElementById('recipientBlock');
                                        const rName = document.getElementById('shipping_recipient_name');
                                        const rPhone = document.getElementById('shipping_phone');
                                        const gName = document.getElementById('guest_name');
                                        const gPhone = document.getElementById('guest_phone');

                                        // Recipient defaults to the buyer unless "ship to a different person" is checked
                                        function syncRecipient() {
                                            const different = diffCheck.checked;
                                            recipientBlock.style.display = different ? 'block' : 'none';
                                            rName.required = rPhone.required = different;
                                            if (!different) {
                                                rName.value = gName ? gName.value : '';
                                                rPhone.value = gPhone ? gPhone.value : '';
                                            }
                                        }
                                        diffCheck.addEventListener('change', syncRecipient);
                                        form.addEventListener('submit', syncRecipient);

                                        // Totals: total = subtotal + shipping_fee - discount + tax
                                        const money = n => '$' + n.toFixed(2);

                                        function updateTotals() {
                                            const subtotal = parseFloat(document.getElementById('subtotal_amount').value) || 0;
                                            const discount = parseFloat(document.getElementById('discount_amount').value) || 0;
                                            const tax = parseFloat(document.getElementById('tax_amount').value) || 0;
                                            const fee = parseFloat(form.querySelector('input[name="shipping_fee"]:checked').dataset.fee) || 0;
                                            const total = subtotal + fee - discount + tax;
                                            document.getElementById('total_amount').value = total.toFixed(2);
                                            document.getElementById('totalText').textContent = money(total);
                                        }
                                        form.querySelectorAll('input[name="shipping_fee"]').forEach(r => r.addEventListener('change',
                                            updateTotals));
                                        updateTotals();
                                    })(); */
    </script>

@endsection
