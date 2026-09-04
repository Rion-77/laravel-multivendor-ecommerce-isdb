@extends('admin.layouts.app')

@section('title', "Product List")

@section('content')
    <main class="app-main">

        <x-admin.content-header title="Products"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

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
                                        <a href="./product-add.html" class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-lg me-1"></i>Add Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle m-0">
                                        <thead>
                                            <tr>
                                                <th><input class="form-check-input" type="checkbox"
                                                        aria-label="Select all" /></th>
                                                <th>Product</th>
                                                <th>Vendor</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Wireless Earbuds Pro" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-1.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Wireless Earbuds Pro</div>
                                                            <div class="text-secondary fs-7">SKU: WEP-2201</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Nova Electronics</td>
                                                <td>Electronics</td>
                                                <td>$79.00</td>
                                                <td>142</td>
                                                <td><span class="badge text-bg-success">Published</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Wireless Earbuds Pro"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Wireless Earbuds Pro"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Smart Watch Series 5" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-2.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Smart Watch Series 5</div>
                                                            <div class="text-secondary fs-7">SKU: SWS-5501</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Nova Electronics</td>
                                                <td>Electronics</td>
                                                <td>$149.00</td>
                                                <td>58</td>
                                                <td><span class="badge text-bg-success">Published</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Smart Watch Series 5"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Smart Watch Series 5"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Handwoven Cotton Saree" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-3.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Handwoven Cotton Saree</div>
                                                            <div class="text-secondary fs-7">SKU: HCS-0912</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Aarav Textiles Co.</td>
                                                <td>Fashion</td>
                                                <td>$42.00</td>
                                                <td>0</td>
                                                <td><span class="badge text-bg-danger">Out of stock</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Handwoven Cotton Saree"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Handwoven Cotton Saree"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Men's Running Sneakers" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-4.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Men's Running Sneakers</div>
                                                            <div class="text-secondary fs-7">SKU: MRS-3310</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Urban Sole Footwear</td>
                                                <td>Footwear</td>
                                                <td>$65.00</td>
                                                <td>210</td>
                                                <td><span class="badge text-bg-success">Published</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Men's Running Sneakers"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Men's Running Sneakers"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Ceramic Table Lamp" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-5.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Ceramic Table Lamp</div>
                                                            <div class="text-secondary fs-7">SKU: CTL-7788</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Bloom & Co. Home Decor</td>
                                                <td>Home & Living</td>
                                                <td>$34.00</td>
                                                <td>27</td>
                                                <td><span class="badge text-bg-secondary">Draft</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Ceramic Table Lamp"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Ceramic Table Lamp"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Portable SSD 1TB" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-1.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Portable SSD 1TB</div>
                                                            <div class="text-secondary fs-7">SKU: PSD-1002</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Pixel Gadgets Store</td>
                                                <td>Electronics</td>
                                                <td>$95.00</td>
                                                <td>76</td>
                                                <td><span class="badge text-bg-success">Published</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Portable SSD 1TB"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Portable SSD 1TB"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input" type="checkbox"
                                                        aria-label="Select Organic Green Tea 250g" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/prod-2.jpg') }}" alt=""
                                                            class="rounded me-2"
                                                            style="width:40px;height:40px;object-fit:cover;" />
                                                        <div>
                                                            <div class="fw-medium">Organic Green Tea 250g</div>
                                                            <div class="text-secondary fs-7">SKU: OGT-4456</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>GreenLeaf Organics</td>
                                                <td>Groceries</td>
                                                <td>$12.00</td>
                                                <td>5</td>
                                                <td><span class="badge text-bg-success">Published</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./product-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Organic Green Tea 250g"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Delete Organic Green Tea 250g"><i
                                                                class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="text-secondary fs-7">Showing 1 to 7 of 4,312 products</span>
                                <nav aria-label="Products pagination">
                                    <ul class="pagination pagination-sm m-0">
                                        <li class="page-item disabled"><a class="page-link" href="#"
                                                tabindex="-1">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
