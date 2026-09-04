@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Vendors"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3 g-3">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="fs-2 text-primary me-3"><i class="bi bi-shop"></i></div>
                                        <div>
                                            <div class="fs-4 fw-semibold">248</div>
                                            <div class="text-secondary fs-7">Total Vendors</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="fs-2 text-success me-3"><i class="bi bi-check-circle"></i></div>
                                        <div>
                                            <div class="fs-4 fw-semibold">211</div>
                                            <div class="text-secondary fs-7">Approved</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="fs-2 text-warning me-3"><i class="bi bi-hourglass-split"></i></div>
                                        <div>
                                            <div class="fs-4 fw-semibold">27</div>
                                            <div class="text-secondary fs-7">Pending Approval</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="fs-2 text-danger me-3"><i class="bi bi-slash-circle"></i></div>
                                        <div>
                                            <div class="fs-4 fw-semibold">10</div>
                                            <div class="text-secondary fs-7">Suspended</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Vendors</h3>
                                <div class="card-tools">
                                    <div class="d-flex gap-2">
                                        <div class="input-group input-group-sm" style="width: 220px;">
                                            <input type="search" class="form-control" placeholder="Search vendors…"
                                                aria-label="Search vendors">
                                            <button class="btn btn-outline-secondary" type="button"><i
                                                    class="bi bi-search"></i></button>
                                        </div>
                                        <select class="form-select form-select-sm w-auto" aria-label="Filter by status">
                                            <option value="all" selected="">All statuses</option>
                                            <option value="approved">Approved</option>
                                            <option value="pending">Pending</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                        <a href="./vendor-add.html" class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-lg me-1"></i>Add Vendor
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle m-0" role="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Vendor</th>
                                                <th scope="col">Store</th>
                                                <th scope="col">Products</th>
                                                <th scope="col">Orders</th>
                                                <th scope="col">Revenue</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Status</th>
                                                <th class="text-end" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user1-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Aarav Textiles</div>
                                                            <div class="text-secondary fs-7">aarav@textiles.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Aarav Textiles Co.</td>
                                                <td>312</td>
                                                <td>1,204</td>
                                                <td>$48,200</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.8</td>
                                                <td><span class="badge text-bg-success">Approved</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Aarav Textiles"><i class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Aarav Textiles"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Aarav Textiles"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user3-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Nova Electronics</div>
                                                            <div class="text-secondary fs-7">contact@novaelec.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Nova Electronics</td>
                                                <td>189</td>
                                                <td>980</td>
                                                <td>$92,410</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.6</td>
                                                <td><span class="badge text-bg-success">Approved</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Nova Electronics"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Nova Electronics"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Nova Electronics"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user4-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Bloom &amp; Co.</div>
                                                            <div class="text-secondary fs-7">hello@bloomco.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Bloom &amp; Co. Home Decor</td>
                                                <td>76</td>
                                                <td>312</td>
                                                <td>$14,900</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.3</td>
                                                <td><span class="badge text-bg-warning">Pending</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Bloom &amp; Co."><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Bloom &amp; Co."><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Bloom &amp; Co."><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user5-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Urban Sole</div>
                                                            <div class="text-secondary fs-7">support@urbansole.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Urban Sole Footwear</td>
                                                <td>134</td>
                                                <td>740</td>
                                                <td>$31,050</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.5</td>
                                                <td><span class="badge text-bg-success">Approved</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Urban Sole"><i class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Urban Sole"><i class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Urban Sole"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user6-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">GreenLeaf Organics</div>
                                                            <div class="text-secondary fs-7">info@greenleaf.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>GreenLeaf Organics</td>
                                                <td>58</td>
                                                <td>199</td>
                                                <td>$6,720</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.1</td>
                                                <td><span class="badge text-bg-danger">Suspended</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View GreenLeaf Organics"><i
                                                                class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit GreenLeaf Organics"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend GreenLeaf Organics"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user7-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Pixel Gadgets</div>
                                                            <div class="text-secondary fs-7">team@pixelgadgets.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Pixel Gadgets Store</td>
                                                <td>221</td>
                                                <td>1,530</td>
                                                <td>$120,880</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>4.9</td>
                                                <td><span class="badge text-bg-success">Approved</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Pixel Gadgets"><i class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Pixel Gadgets"><i
                                                                class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Pixel Gadgets"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('img/user8-128x128.jpg') }}" alt=""
                                                            class="img-size-32 rounded-circle me-2">
                                                        <div>
                                                            <div class="fw-medium">Luxe Living</div>
                                                            <div class="text-secondary fs-7">sales@luxeliving.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Luxe Living Furniture</td>
                                                <td>45</td>
                                                <td>88</td>
                                                <td>$9,150</td>
                                                <td><i class="bi bi-star-fill text-warning me-1"></i>3.9</td>
                                                <td><span class="badge text-bg-warning">Pending</span></td>
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="./vendor-profile.html" class="btn btn-outline-secondary"
                                                            aria-label="View Luxe Living"><i class="bi bi-eye"></i></a>
                                                        <a href="./vendor-add.html" class="btn btn-outline-secondary"
                                                            aria-label="Edit Luxe Living"><i class="bi bi-pencil"></i></a>
                                                        <button type="button" class="btn btn-outline-danger"
                                                            aria-label="Suspend Luxe Living"><i
                                                                class="bi bi-slash-circle"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="text-secondary fs-7">Showing 1 to 7 of 248 vendors</span>
                                <nav aria-label="Vendors pagination">
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
