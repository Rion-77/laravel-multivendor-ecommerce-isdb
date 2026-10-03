@props(['product'])

<div class="col-lg-6 col-xl-4">
    <div class="p-4 rounded bg-light">
        <div class="row align-items-center">
            <a href="{{ route('frontend.products.show', $product) }}" class="col-6">   
                    <img src="{{ productImage($product) }}" 
                        class="img-fluid rounded-circle" alt="{{ $product->name }}"
                        style="width: 150px; height: 150px; object-fit: cover; object-position: center">
            </a>
            <div class="col-6">
                <a href="{{ route('frontend.products.show', $product) }}" class="h5">{{ $product->name }}</a>
                <div class="d-flex my-3">
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4 class="mb-3">{{ $product->base_price }} $</h4>
                <x-frontend.buttons.add-to-card :product="$product" />
            </div>
        </div>
    </div>
</div>
