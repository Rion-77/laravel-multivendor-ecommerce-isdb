@props(['product', 'class' => 'col-md-6 col-lg-4 col-xl-3'])

<div class="{{ $class }}">
    <div class="rounded position-relative fruite-item border border-secondary overflow-hidden">
        <a href="{{ route('products.show', $product) }}" class="fruite-img d-block">
            @if ($product->hasMedia('product_image'))
                <img src="{{ $product->getFirstMediaUrl('product_image', 'thumbnail') }}"
                    class="img-fluid w-100 rounded-top" alt="">
            @else
                <img src="https://picsum.photos/300/{{ $product->id + 150 }}" class="img-fluid w-100 rounded-top">
            @endif

        </a>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
            {{ $product->category->name }}</div>
        {{-- <div class="p-4 border border-secondary border-top-0 rounded-bottom"> --}}
        <div class="p-4 rounded-bottom">
            <a href="{{ route('products.show', $product) }}">
                <h4 class="product-name">{{ $product->name }}</h4>
            </a>
            <div class="sold-by"><i class="fas fa-store me-1"></i>Sold by <a
                    href="vendor-detail.html">{{ $product->vendor->shop_name }}</a>
            </div>
            <p>{{ $product->description }}</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">
                    {{ (int) $product->base_price }}tk</p>
                <button type="button"
                    class="add-to-cart-btn btn border border-secondary rounded-pill px-3 text-primary"
                    data-product="{{ json_encode([
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->base_price,
                    ]) }}"><i
                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                    cart</button>
            </div>
        </div>
    </div>
</div>
