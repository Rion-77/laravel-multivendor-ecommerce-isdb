@props(['product'])

<div class="col-md-6 col-lg-6 col-xl-3">
    <div class="text-center">

        @if ($product->hasMedia('product_image'))
            <img src="{{ $user->getFirstMediaUrl('product_image', 'thumbnail') }}" class="img-fluid rounded"
                alt="{{ $product->name }}">
        @else
            <img src="https://picsum.photos/300/{{ $product->id + 180 }}" class="img-fluid rounded"
                alt="{{ $product->name }}">
        @endif
        <div class="py-4">
            <a href="#" class="h5">{{ $product->name }}</a>
            <div class="d-flex my-3 justify-content-center">
                <i class="fas fa-star text-primary"></i>
                <i class="fas fa-star text-primary"></i>
                <i class="fas fa-star text-primary"></i>
                <i class="fas fa-star text-primary"></i>
                <i class="fas fa-star"></i>
            </div>
            <h4 class="mb-3">{{ $product->base_price }} $</h4>
            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
        </div>
    </div>
</div>
