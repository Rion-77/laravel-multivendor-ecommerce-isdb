@props(['vendor', 'class' => 'col-md-6 col-lg-3'])

<div class="{{ $class }}">
    <div class="vendor-card">

        <div class="text-center px-3 pb-4">
            @if ($vendor->hasMedia('shop_logo'))
                <img src="{{ $vendor->getFirstMediaUrl('shop_logo', 'logo') }}" class="vendor-logo mb-2"
                    alt="{{ $vendor->shop_name }}">
            @else
                <img src="https://picsum.photos/{{ $vendor->id + 100 }}/{{ $vendor->id + 100 }}" class="vendor-logo mb-2"
                    alt="{{ $vendor->shop_name }}">
            @endif
            <h5 class="mb-0">{{ $vendor->shop_name }}<i class="fas fa-check-circle vendor-badge-verified"></i></h5>
            <div class="rating d-flex justify-content-center my-2">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                <span class="rating-count">(4.5)</span>
            </div>
            <p class="vendor-stats mb-3">{{ $vendor->products_count }} Products</p>
            <a href="vendor-detail.html" class="btn border border-secondary rounded-pill px-4 py-1 text-primary">Visit
                Store</a>
        </div>
    </div>
</div>
