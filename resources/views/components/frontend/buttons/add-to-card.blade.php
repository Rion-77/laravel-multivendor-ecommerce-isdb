@props(['product'])

@php
    $product_data = json_encode([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->base_price,
        'image' => $product->hasMedia('product_image')
            ? $product->getFirstMediaUrl('product_image', 'thumbnail')
            : 'https://placehold.net/400x400.png',
    ]);
@endphp

<button type="button" class="add-to-cart-btn btn border border-secondary rounded-pill px-3 text-primary"
    data-product="{{ $product_data }}"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to
    cart
</button>
