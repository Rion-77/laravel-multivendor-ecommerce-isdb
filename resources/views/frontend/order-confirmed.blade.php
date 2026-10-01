@extends('frontend.layouts.app')

@section('title', 'Order Confirmed')

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.clearCart();
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Order Confirmed</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Order Confirmed</li>
        </ol>
    </div>

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 text-center">
                    <div class="text-success mb-4" aria-hidden="true">
                        <i class="fas fa-check-circle" style="font-size: 72px;"></i>
                    </div>
                    <h2 class="display-6 mb-3">Thank you for your order!</h2>
                    <p class="text-muted mb-4">Your order has been confirmed. We're getting it ready and will share updates
                        as it makes its way to you.</p>
                    <a class="btn btn-primary rounded-pill px-5 py-3" href="{{ route('homepage') }}">Continue shopping</a>
                </div>
            </div>
        </div>
    </div>
@endsection
