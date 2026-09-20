@extends('admin.layouts.app')

@section('title', 'Product List')

@section('styles')
<style>
  .product-gallery-thumb {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 0.25rem;
    border: 1px solid #dee2e6;
  }
</style>
@endsection


@section('content')
    <main class="app-main">


        <div class="app-content mt-5">
            <div class="container-fluid">
                <!--begin::Title row with quick actions-->
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                    <div>
                        <h2 class="fs-4 mb-1">{{$product->name}}</h2>
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            {{-- <span class="badge text-bg-success">Published</span> --}}
                            <span class="text-secondary fs-7">Category: {{$product->category->name}}</span>
                            <span class="text-secondary fs-7">•</span>
                            <span class="text-secondary fs-7">Brand: {{$product->brand->name}}</span>
                            <span class="text-secondary fs-7">•</span>
                            <span class="text-secondary fs-7">Product ID: #{{ $product->id }}</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Back to list
                        </a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square me-1"></i>Edit Product
                        </a>
                    </div>
                </div>
                <!--end::Title row-->

                <div class="row">
                    <!--begin::Left column-->
                    <div class="col-lg-8">
                        <!--begin::Gallery card-->
                        <div class="card card-primary card-outline mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Image</h3>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    
                                    <div class="col-12">
                                      {{-- Images --}}
                                        <div class="row g-2">
                                            @if ($product->hasMedia('product_image'))
                                                @foreach ($product->getMedia('product_image') as $media)
                                                    <div class="col-4 overflow-hidden">
                                                        <img src="{{ $media->getUrl('thumbnail') }}"
                                                            alt="Wireless Earbuds Pro thumbnail 1"
                                                            class="product-gallery-thumb"
                                                        >
                                                    </div>
                                                @endforeach
                                              @else
                                              <p>No images available.</p>  
                                            @endif
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Gallery card-->

                        <!--begin::General information card-->
                        <div class="card card-primary card-outline mb-3">
                            <div class="card-header">
                                <h3 class="card-title">General Information</h3>
                            </div>
                            <div class="card-body">
                                <dl class="mb-0">
                                    <div class="detail-row">
                                        <dt>Product name</dt>
                                        <dd>{{ $product->name }}</dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Vendor</dt>
                                        <dd>Nova Electronics</dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Category</dt>
                                        <dd><span class="badge text-bg-secondary">{{$product->category->name}}</span></dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Brand</dt>
                                        <dd><span class="badge text-bg-secondary">{{$product->brand->name}}</span></dd>
                                    </div>
                                </dl>
                                <hr>
                                <h4 class="fs-6 mb-2">Description</h4>
                                <p class="mb-0 text-body">
                                    {{$product->description}}
                                </p>
                            </div>
                        </div>
                        <!--end::General information card-->
                    </div>
                    <!--end::Left column-->

                    <!--begin::Right column-->
                    <div class="col-lg-4">
                        <!--begin::Pricing card-->
                        <div class="card card-outline card-success mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Pricing &amp; Inventory</h3>
                            </div>
                            <div class="card-body">   
                                <dl class="mb-0">
                                    <div class="detail-row">
                                        <dt>Base price</dt>
                                        <dd>${{$product->base_price}}</dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Offer price</dt>
                                        <dd>${{$product->offer_price}}</dd>
                                    </div>
                                    {{-- <div class="detail-row">
                                        <dt>Stock quantity</dt>
                                        <dd>142 units</dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Weight</dt>
                                        <dd>0.25 kg</dd>
                                    </div> --}}
                                </dl>
                            </div>
                        </div>
                        <!--end::Pricing card-->

                        <!--begin::Status card-->
                        <div class="card card-outline card-secondary mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Status</h3>
                            </div>
                            <div class="card-body">
                                <dl class="mb-0">
                                    <div class="detail-row">
                                        <dt>Visibility</dt>
                                        <dd><span class="badge text-bg-success">Published</span></dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Featured</dt>
                                        <dd><span class="badge text-bg-info">No Feature</span></dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Created</dt>
                                        <dd>{{ $product->created_at->format('M j, Y') }}</dd>
                                    </div>
                                    <div class="detail-row">
                                        <dt>Last updated</dt>
                                        <dd>{{ $product->updated_at->format('M j, Y') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <!--end::Status card-->

                       
                    </div>
                    <!--end::Right column-->
                </div>
            </div>
        </div>
 
    </main>
@endsection
