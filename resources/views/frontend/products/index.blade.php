@extends('frontend.layouts.app')

@section('styles')
    <style>
        .range-slider {
            position: relative;
            height: 24px;
        }

        .range-track,
        .range-fill {
            position: absolute;
            top: 50%;
            height: 6px;
            transform: translateY(-50%);
            border-radius: 3px;
        }

        .range-track {
            width: 100%;
            background: #dee2e6;
        }

        .range-fill {
            background: #4f46e5;
            /* change to your brand color */
        }

        .range-slider input[type=range] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 24px;
            margin: 0;
            background: transparent;
            pointer-events: none;
            /* only the thumbs are clickable */
            -webkit-appearance: none;
            appearance: none;
        }

        .range-slider input[type=range]::-webkit-slider-runnable-track {
            background: transparent;
        }

        .range-slider input[type=range]::-moz-range-track {
            background: transparent;
        }

        .range-slider input[type=range]::-webkit-slider-thumb {
            pointer-events: auto;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid #4f46e5;
            cursor: pointer;
        }

        .range-slider input[type=range]::-moz-range-thumb {
            pointer-events: auto;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #fff;
            border: 4px solid #4f46e5;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Search</h4>
                                        <form method="GET" action="{{ route('frontend.products.index') }}">
                                            <div class="input-group w-100 mx-auto d-flex">
                                                <input type="search" class="form-control p-3" placeholder="keywords"
                                                    aria-describedby="search-icon-1" name="filter[name]">
                                                <button type="submit" id="search-icon-1" class="input-group-text p-3"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @forelse ($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a
                                                            href="{{ route('frontend.products.index', ['filter' => ['category_id' => $category->id]]) }}"><i
                                                                class="fas fa-apple-alt me-2"></i>{{ $category->name }}</a>
                                                        <span>({{ $category->products_count }})</span>
                                                    </div>
                                                </li>
                                            @empty
                                            @endforelse


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        @php
                                            $minPrice = request('filter.min_price', 0);
                                            $maxPrice = request('filter.max_price', 5000);
                                        @endphp

                                        <form method="GET" id="priceForm" action="{{ route('frontend.products.index') }}">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-8">
                                                    <div class="range-slider mb-3">
                                                        <div class="range-track"></div>
                                                        <div class="range-fill" id="rangeFill"></div>
                                                        <input type="range" id="minRange" min="0" max="5000"
                                                            step="10" value="{{ $minPrice }}">
                                                        <input type="range" id="maxRange" min="0" max="5000"
                                                            step="10" value="{{ $maxPrice }}">
                                                    </div>

                                                    <div class="d-flex justify-content-between gap-3">
                                                        <input type="number"
                                                            class="form-control form-control-sm text-center" id="minInput"
                                                            name="filter[min_price]" min="0" max="5000"
                                                            step="10" value="{{ $minPrice }}">
                                                        <input type="number"
                                                            class="form-control form-control-sm text-center" id="maxInput"
                                                            name="filter[max_price]" min="0" max="5000"
                                                            step="10" value="{{ $maxPrice }}">
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-primary">Apply</button>
                                                </div>
                                            </div>

                                            {{-- keep other active filters when applying the price range --}}
                                            @if (request('filter.category_id'))
                                                <input type="hidden" name="filter[category_id]"
                                                    value="{{ request('filter.category_id') }}">
                                            @endif
                                            @if (request('filter.name'))
                                                <input type="hidden" name="filter[name]"
                                                    value="{{ request('filter.name') }}">
                                            @endif
                                            @if (request('sort'))
                                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                                            @endif
                                        </form>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-start">
                                @forelse ($products as $product)
                                    <x-frontend.products.card :product="$product" class="col-md-6 col-lg-6 col-xl-4" />
                                @empty
                                    <x-frontend.no-data text="No products found..." />
                                @endforelse
                                <x-frontend.pagination :for="$products" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection

@section('scripts')
    <script>
        const minRange = document.getElementById('minRange');
        const maxRange = document.getElementById('maxRange');
        const minInput = document.getElementById('minInput');
        const maxInput = document.getElementById('maxInput');
        const fill = document.getElementById('rangeFill');
        const LIMIT = parseInt(maxRange.max);

        function updateFill() {
            const min = parseInt(minRange.value);
            const max = parseInt(maxRange.value);
            fill.style.left = (min / LIMIT * 100) + '%';
            fill.style.width = ((max - min) / LIMIT * 100) + '%';
        }

        function fromSliders(changed) {
            let min = parseInt(minRange.value);
            let max = parseInt(maxRange.value);

            if (min > max) {
                if (changed === 'min') {
                    min = max;
                    minRange.value = min;
                } else {
                    max = min;
                    maxRange.value = max;
                }
            }

            minInput.value = min;
            maxInput.value = max;
            updateFill();
        }

        function fromInputs() {
            let min = Math.max(0, parseInt(minInput.value) || 0);
            let max = Math.min(LIMIT, parseInt(maxInput.value) || LIMIT);
            if (min > max) min = max;

            minRange.value = min;
            maxRange.value = max;
            updateFill();
        }

        minRange.addEventListener('input', () => fromSliders('min'));
        maxRange.addEventListener('input', () => fromSliders('max'));
        minInput.addEventListener('change', fromInputs);
        maxInput.addEventListener('change', fromInputs);

        document.getElementById('priceForm').addEventListener('submit', function() {
            if (parseInt(minInput.value) <= 0) minInput.disabled = true;
            if (parseInt(maxInput.value) >= LIMIT) maxInput.disabled = true;
        });

        // Re-enable inputs if the user presses the browser Back button
        window.addEventListener('pageshow', function() {
            minInput.disabled = false;
            maxInput.disabled = false;
        });

        updateFill();
    </script>
@endsection
