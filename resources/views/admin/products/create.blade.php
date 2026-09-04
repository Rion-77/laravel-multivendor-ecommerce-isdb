@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Add / Edit Product"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8">
                        <form>
                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">General Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label" for="p-name">Product name</label>
                                            <input type="text" class="form-control" id="p-name"
                                                placeholder="e.g. Wireless Earbuds Pro">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="p-vendor">Vendor</label>
                                            <select class="form-select" id="p-vendor">
                                                <option selected="">Nova Electronics</option>
                                                <option>Aarav Textiles Co.</option>
                                                <option>Urban Sole Footwear</option>
                                                <option>Bloom &amp; Co. Home Decor</option>
                                                <option>Pixel Gadgets Store</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="p-category">Category</label>
                                            <select class="form-select" id="p-category">
                                                <option selected="">Electronics</option>
                                                <option>Fashion &amp; Apparel</option>
                                                <option>Footwear</option>
                                                <option>Home &amp; Living</option>
                                                <option>Groceries</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="p-desc">Description</label>
                                            <textarea class="form-control" id="p-desc" rows="4" placeholder="Describe the product features and benefits"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Pricing &amp; Inventory</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="p-price">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="p-price" value="79.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="p-compare-price">Compare-at price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="p-compare-price"
                                                    value="99.00">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary card-outline mb-3">
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
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Save
                                    Product</button>
                                <button type="button" class="btn btn-outline-secondary">Save as Draft</button>
                                <a href="./products-list.html" class="btn btn-outline-secondary">Cancel</a>
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
                                <input type="file" id="p-image-upload" class="d-none" accept="image/*"
                                    multiple="">
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
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
