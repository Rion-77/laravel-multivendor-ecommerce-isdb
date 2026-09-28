@props(['product'])

<div class="col-lg-6 col-xl-4">
    <div class="p-4 rounded bg-light">
        <div class="row align-items-center">
            <div class="col-6">
                @if ($product->hasMedia('product_image'))
                    <img src="{{ $product->getFirstMediaUrl('product_image', 'thumbnail') }}"
                        class="img-fluid rounded-circle w-100" alt="{{ $product->name }}">
                @else
                    <img src="https://picsum.photos/{{ $product->id + 150 }}/{{ $product->id + 150 }}"
                        class="img-fluid rounded-circle w-100" alt="{{ $product->name }}">
                @endif

            </div>
            <div class="col-6">
                <a href="#" class="h5">{{ $product->name }}</a>
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
