@props(['product'])

<div class="border border-primary rounded position-relative vesitable-item overflow-hidden">
    <div class="vesitable-img">
        @if ($product->hasMedia('product_image'))
            <img src="{{ $product->getFirstMediaUrl('product_image', 'thumbnail') }}" class="img-fluid w-100 rounded-top"
                alt="">
        @else
            <img src="https://picsum.photos/300/{{ $product->id + 150 }}" class="img-fluid w-100 rounded-top">
        @endif
    </div>
    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
        {{ $product->category->name }}</div>
    <div class="p-4 rounded-bottom">
        <h4>{{ $product->name }}</h4>
        <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                href="vendor-detail.html">{{ $product->vendor->shop_name }}.</a></div>
        <p>{{ $product->description }}</p>
        <div class="d-flex justify-content-between flex-lg-wrap">
            <p class="text-dark fs-5 fw-bold mb-0">{{ (int) $product->base_price }}tk</p>
            <x-frontend.buttons.add-to-card :product="$product" />
        </div>
    </div>
</div>
