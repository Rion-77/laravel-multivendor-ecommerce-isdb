@php
    use App\Enums\ProductStatus;
@endphp

@extends('admin.layouts.app')

@section('title', 'Edit Product')

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

        <x-admin.content-header title="Edit Product"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">

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
                                        @if (auth()->user()->role_id == 3)
                                            <x-admin.form.select class="col-md-6" label="Vendor" name="vendor_id">
                                                @foreach ($vendors as $vendor)
                                                    @if ($vendor->id == session('user_vendor_id'))
                                                        <option value="{{ $vendor->id }}" selected>
                                                            {{ $vendor->shop_name }}</option>
                                                    @endif
                                                @endforeach
                                            </x-admin.form.select>
                                        @else
                                            <x-admin.form.select class="col-md-6" label="Vendor" name="vendor_id">
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}" @selected($product->vendor_id == $vendor->id)>
                                                        {{ $vendor->shop_name }}</option>
                                                @endforeach
                                            </x-admin.form.select>
                                        @endif

                                        <!-- Status -->

                                        @if (auth()->user()->role_id == 3)
                                            <x-admin.form.select class="col-md-6" label="Status" name="status">
                                                <option value="pending_review" selected>Pending Review</option>
                                            </x-admin.form.select>
                                        @else
                                            <x-admin.form.select class="col-md-6" label="Status" name="status">

                                                @foreach (ProductStatus::cases() as $status)
                                                    <option value="{{ $status->value }}"
                                                        {{ old('status', $product->status->value ?? '') === $status->value ? 'selected' : '' }}>
                                                        {{ $status->label() }}
                                                    </option>
                                                @endforeach
                                            </x-admin.form.select>
                                        @endif

                                        <!-- Categoy -->
                                        <x-admin.form.select class="col-md-6" label="Category" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Brand -->
                                        <x-admin.form.select class="col-md-6" label="Brand" name="brand_id">
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
                                <x-admin.buttons.submit label="Update
                                    Product" />
                                <x-admin.buttons.cancel href="{{ route('admin.products.index') }}" />
                            </div>

                        </div>

                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="card card-outline card-primary mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Product Image</h3>
                                    @if ($product->hasMedia('product_image'))

                                        <div
                                            class="p-3 w-100 border overflow-hidden rounded bg-light d-flex justify-content-start align-items-center flex-wrap gap-0">
                                            @foreach ($product->getMedia('product_image') as $media)
                                                <img src="{{ $media->getUrl('thumbnail') }}" class="w-50 m-0 rounded p-1">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <input type="file" id="product_image" class="filepond" accept="image/*"
                                        name="product_image[]" multiple>
                                    <p class="text-secondary fs-7 mt-2 mb-0">Optional. Image Only, up to 2MB.</p>
                                    <x-admin.error-message name="product_image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
