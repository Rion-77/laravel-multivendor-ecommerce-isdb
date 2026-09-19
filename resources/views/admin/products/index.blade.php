@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
    <main class="app-main">

        <x-admin.content-header title="Products"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">
                <!-- Flash Message -->
                <x-admin.success-flash-message />

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Products</h3>
                                <div class="card-tools">
                                    <div class="d-flex gap-2">
                                        <div class="input-group input-group-sm" style="width: 220px;">
                                            <input type="search" class="form-control" placeholder="Search products…"
                                                aria-label="Search products" />
                                            <button class="btn btn-outline-secondary" type="button"><i
                                                    class="bi bi-search"></i></button>
                                        </div>
                                        <select class="form-select form-select-sm w-auto" aria-label="Filter by vendor">
                                            <option selected>All vendors</option>
                                            <option>Nova Electronics</option>
                                            <option>Aarav Textiles Co.</option>
                                            <option>Urban Sole Footwear</option>
                                        </select>
                                        <select class="form-select form-select-sm w-auto" aria-label="Filter by status">
                                            <option selected>All statuses</option>
                                            <option>Published</option>
                                            <option>Draft</option>
                                            <option>Out of stock</option>
                                        </select>
                                        <!-- Add Button -->
                                        <x-admin.buttons.add href="{{ route('admin.products.create') }}"
                                            label="Add Product" />

                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle m-0">
                                        <thead>
                                            <tr>
                                                {{-- <th><input class="form-check-input" type="checkbox"
                                                        aria-label="Select all" /></th> --}}
                                                <th>Product</th>
                                                <th>Vendor</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Price</th>
                                                {{-- <th>Stock</th> --}}
                                                {{-- <th>Status</th> --}}
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    {{-- <td><input class="form-check-input" type="checkbox"
                                                            aria-label="Select Wireless Earbuds Pro" /></td> --}}
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            @if ($product->hasMedia('product_image'))
                                                                @foreach ($product->getMedia('product_image') as $media)
                                                                    <img src="{{ $media->getUrl('thumbnail') }}"
                                                                        alt="" class="rounded me-2"
                                                                        style="width:40px;height:40px;object-fit:cover;" />
                                                                    {{-- <img src="{{ $product->getFirstMediaUrl('product_image', 'thumbnail') }}"
                                                                    alt="" class="rounded me-2"
                                                                    style="width:40px;height:40px;object-fit:cover;" /> --}}
                                                                @endforeach
                                                            @else
                                                                <img src="{{ asset('img/prod-1.jpg') }}" alt=""
                                                                    class="rounded me-2"
                                                                    style="width:40px;height:40px;object-fit:cover;" />
                                                            @endif

                                                            <div>
                                                                <div class="fw-medium">{{ $product->name }}</div>
                                                                {{-- <div class="text-secondary fs-7">SKU: WEP-2201</div> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->vendor->shop_name }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->brand->name }}</td>
                                                    <td>{{ $product->base_price }}</td>
                                                    {{-- <td>142</td> --}}
                                                    {{-- <td><span class="badge text-bg-success">Published</span></td> --}}
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm">
                                                            <x-admin.buttons.view href="{{ route('admin.products.show', ['product' => $product->id]) }}" />        
                                                            <x-admin.buttons.edit
                                                                href="{{ route('admin.products.edit', ['product' => $product->id]) }}" />
                                                            <x-admin.buttons.delete item-name="{{ $product->name }}"
                                                                item-delete-url="{{ route('admin.products.destroy', ['product' => $product->id]) }}" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <x-admin.pagination :for="$products" />

                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <x-admin.delete-modal />
                
            </div>
        </div>
    </main>
@endsection
