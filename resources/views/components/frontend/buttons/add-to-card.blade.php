<button type="button" class="btn border border-secondary rounded-pill px-3 text-primary"
data-product="({id:{{ $product->id }}, name: '{{ $product->name }}', price: {{ $product->base_price }}})"
><i
        class="fa fa-shopping-bag me-2 text-primary"></i> Add to
    cart</button>
{{-- 
 <button type="button" class="btn btn-block btn-outline-primary"
						onClick="cartLS.add({id: 1, name: 'Nike Air', price: 100})">Add to
						Cart</button>
 --}}
