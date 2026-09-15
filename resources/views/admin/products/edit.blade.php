@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Add / Edit Product"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">General Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Product Name -->
                                        <x-admin.form.input class="col-12" label="Product name" type="text"
                                            placeholder="e.g. Wireless Earbuds Pro" name="name"
                                            value="{{ $product->name }}" />

                                        <!-- Vendor -->
                                        <x-admin.form.select class="col-md-4" label="Vendor" name="vendor_id">
                                            <option value="1">Nova Electronics</option>
                                            <option value="2">Aarav Textiles Co.</option>
                                            <option value="3">Urban Sole Footwear</option>
                                        </x-admin.form.select>

                                        <!-- Categoy -->
                                        <x-admin.form.select class="col-md-4" label="Category" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Brand -->
                                        <x-admin.form.select class="col-md-4" label="Brand" name="brand_id">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @selected($product->brand_id == $brand->id)>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Textarea -->
                                        <x-admin.form.textarea class="col-12" label="Description"
                                            placeholder="Describe the product features and benefits" name="description"
                                            value="{{ $product->description }}" />
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
                                            value="{{ $product->base_price }}">$</x-admin.form.input>

                                        <!-- Offer Price -->
                                        <x-admin.form.input class="col-md-6" label="Offer Price" type="number"
                                            name="offer_price" value="{{ $product->offer_price }}">$</x-admin.form.input>

                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <x-admin.buttons.submit label="Save
                                    Product" />
                                <x-admin.buttons.cancel href="{{ route('admin.products.index') }}" />
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
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

                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
