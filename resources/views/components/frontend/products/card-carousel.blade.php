@props(['product'])

<div class="border border-primary rounded position-relative vesitable-item overflow-hidden">
    <a href="{{ route('frontend.products.show', $product->id) }}" class="vesitable-img overflow-hidden d-block">
        <img src="{{ productImage($product) }}" class="img-fluid w-100 rounded-top" alt="">
    </a>
    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
        {{ $product->category->name }}</div>
    <div class="p-4 rounded-bottom">
        <a href="{{ route('frontend.products.show', $product) }}">
            <h4 class="product-name-carousel">{{ $product->name }}</h4>
        </a>
        <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                href="{{ route('frontend.vendors.show', $product->vendor->id) }}">{{ $product->vendor->shop_name }}.</a>
        </div>
        <p>{{ $product->description }}</p>
        <div class="d-flex justify-content-between flex-lg-wrap">
            <p class="text-dark fs-5 fw-bold mb-0">{{ (int) $product->base_price }}tk</p>
            <x-frontend.buttons.add-to-card :product="$product" />
        </div>
    </div>
</div>
