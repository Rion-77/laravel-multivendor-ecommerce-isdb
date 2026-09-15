@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('styles')
    <style>
        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }

        /* Enable a 2-column horizontal layout on medium screens/tablets */
        @media (min-width: 30em) and (max-width: 50em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }
    </style>
@endsection

@section('scripts')
    @vite(['resources/js/filepond.js'])
@endsection

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Add / Edit Product"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 order-2 order-lg-1">

                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">General Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Product Name -->
                                        <x-admin.form.input class="col-12" label="Product name" type="text"
                                            placeholder="e.g. Wireless Earbuds Pro" name="name"
                                            value="{{ old('name') }}" />


                                        <!-- Vendor -->
                                        <x-admin.form.select class="col-md-4" label="Vendor" name="vendor_id">
                                            <option value="1">Nova Electronics</option>
                                            <option value="2">Aarav Textiles Co.</option>
                                            <option value="3">Urban Sole Footwear</option>
                                        </x-admin.form.select>

                                        <!-- Categoy -->
                                        <x-admin.form.select class="col-md-4" label="Category" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('role_id') == $category->id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Brand -->
                                        <x-admin.form.select class="col-md-4" label="Brand" name="brand_id">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @selected(old('role_id') == $brand->id)>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>


                                        <!-- Textarea -->
                                        <x-admin.form.textarea class="col-12" label="Description"
                                            placeholder="Describe the product features and benefits" name="description"
                                            value="{{ old('description') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Pricing &amp; Inventory</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">

                                        <!-- Price -->
                                        <x-admin.form.input class="col-md-6" label="Price" type="number" name="base_price"
                                            value="{{ old('base_price') }}">$</x-admin.form.input>

                                        <!-- Offer Price -->
                                        <x-admin.form.input class="col-md-6" label="Offer Price" type="number"
                                            name="offer_price" value="{{ old('offer_price') }}">$</x-admin.form.input>




                                        {{-- <div class="col-md-4">
                                            <label class="form-label" for="p-sku">SKU</label>
                                            <input type="text" class="form-control" id="p-sku" value="WEP-2201">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="p-stock">Stock quantity</label>
                                            <input type="number" class="form-control" id="p-stock" value="142">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="p-weight">Weight (kg)</label>
                                            <input type="number" step="0.01" class="form-control" id="p-weight"
                                                value="0.25">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check form-switch mt-4 pt-1">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="p-track-inventory" checked="">
                                                <label class="form-check-label" for="p-track-inventory">Track
                                                    inventory</label>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Variants</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-outline-primary"><i
                                                class="bi bi-plus-lg me-1"></i>Add variant</button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-sm align-middle m-0" role="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Variant</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Color: Black</td>
                                                    <td>WEP-2201-BLK</td>
                                                    <td><input type="number" class="form-control form-control-sm"
                                                            value="79.00"></td>
                                                    <td><input type="number" class="form-control form-control-sm"
                                                            value="90"></td>
                                                    <td><button type="button" class="btn btn-sm btn-outline-danger"
                                                            aria-label="Remove variant"><i
                                                                class="bi bi-x-lg"></i></button></td>
                                                </tr>
                                                <tr>
                                                    <td>Color: White</td>
                                                    <td>WEP-2201-WHT</td>
                                                    <td><input type="number" class="form-control form-control-sm"
                                                            value="79.00"></td>
                                                    <td><input type="number" class="form-control form-control-sm"
                                                            value="52"></td>
                                                    <td><button type="button" class="btn btn-sm btn-outline-danger"
                                                            aria-label="Remove variant"><i
                                                                class="bi bi-x-lg"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="d-flex gap-2">
                                <x-admin.buttons.submit label="Save
                                    Product" />
                                <x-admin.buttons.cancel href="{{ route('admin.products.index') }}" />
                            </div>

                        </div>

                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="card card-outline card-primary mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Product Image</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" id="product_image" class="filepond" accept="image/*"
                                        name="product_image[]" multiple>
                                    <p class="text-secondary fs-7 mt-2 mb-0">Optional. Image Only, up to 2MB.</p>
                                    <x-admin.error-message name="product_image" />
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-4">
                        <div class="card card-outline card-primary mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Images</h3>
                            </div>
                            <div class="card-body">
                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <img src="{{ asset('img/prod-1.jpg') }}" class="img-fluid rounded"
                                            alt="Product image 1">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('img/prod-2.jpg') }}" class="img-fluid rounded"
                                            alt="Product image 2">
                                    </div>
                                    <div class="col-4 d-flex align-items-center justify-content-center border rounded"
                                        style="min-height:64px;">
                                        <i class="bi bi-plus-lg fs-4 text-secondary"></i>
                                    </div>
                                </div>
                                <label for="p-image-upload" class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-upload me-1"></i>Upload images
                                </label>
                                <input type="file" id="p-image-upload" class="d-none" accept="image/*" multiple="">
                                <p class="text-secondary fs-7 mt-2 mb-0">First image is used as the thumbnail. JPG or PNG,
                                    up to 5MB each.</p>
                            </div>
                        </div>

                        <div class="card card-outline card-secondary mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Publishing</h3>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="p-status">Status</label>
                                <select class="form-select" id="p-status">
                                    <option selected="">Published</option>
                                    <option>Draft</option>
                                    <option>Scheduled</option>
                                </select>
                                <div class="form-check form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="p-featured">
                                    <label class="form-check-label" for="p-featured">Feature on homepage</label>
                                </div>
                            </div>
                        </div>

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">SEO</h3>
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="p-meta-title">Meta title</label>
                                <input type="text" class="form-control mb-3" id="p-meta-title"
                                    placeholder="Wireless Earbuds Pro | MartHub">
                                <label class="form-label" for="p-meta-desc">Meta description</label>
                                <textarea class="form-control" id="p-meta-desc" rows="3" placeholder="Short SEO description"></textarea>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
