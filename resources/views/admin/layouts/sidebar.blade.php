<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light fs-6">Multivendor Ecommerce</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->

    <!-- Admin Sidebar -->

    @if (auth()->user()->role_id == 1)
        <div class="sidebar-wrapper" data-overlayscrollbars-viewport="scrollbarHidden overflowXHidden overflowYScroll"
            tabindex="-1"
            style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px;">
            <nav class="mt-2" aria-label="Main navigation">
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false"
                    id="navigation" tabindex="-1">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ activeLink('admin.dashboard') }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">CATALOG</li>
                    {{-- <li class="nav-item menu-open"> --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ activeLink('admin.products*') }}" aria-expanded="true">
                            <i class="nav-icon bi bi-box-seam"></i>
                            <p>
                                Products
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}"
                                    class="nav-link {{ activeLink('admin.products.index') }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>All Products</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}"
                                    class="nav-link {{ activeLink('admin.products.create') }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.brands.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Brands</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">MARKETPLACE</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ activeLink('admin.vendors*') }}" aria-expanded="false">
                            <i class="nav-icon bi bi-shop"></i>
                            <p>
                                Vendors
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.vendors.index') }}"
                                    class="nav-link {{ activeLink('admin.vendors.index') }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>All Vendors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.vendors.create') }}"
                                    class="nav-link {{ activeLink('admin.vendors.create') }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Add Vendor</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{ route('admin.vendors.show') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Vendor Profile</p>
                            </a>
                        </li> --}}
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" aria-expanded="false">
                            <i class="nav-icon bi bi-cart-check"></i>
                            <p>
                                Orders
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>All Orders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.show') }}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Order Details</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-item">
                    <a href="./payouts.html" class="nav-link">
                        <i class="nav-icon bi bi-cash-coin"></i>
                        <p>Payouts</p>
                    </a>
                </li> --}}

                    {{-- <li class="nav-item">
                    <a href="./coupons-list.html" class="nav-link">
                        <i class="nav-icon bi bi-ticket-perforated"></i>
                        <p>Coupons</p>
                    </a>
                </li> --}}

                    {{-- <li class="nav-item">
                    <a href="./reviews.html" class="nav-link">
                        <i class="nav-icon bi bi-star-half"></i>
                        <p>Reviews</p>
                    </a>
                </li> --}}

                    <li class="nav-header">PEOPLE</li>
                    {{-- <li class="nav-item">
                    <a href="#" class="nav-link" aria-expanded="false">
                        <i class="nav-icon bi bi-people"></i>
                        <p>
                            Customers
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./customers-list.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./customer-profile.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Customer Profile</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-badge"></i>
                            <p>Users</p>
                        </a>
                    </li>

                </ul>
                <!--end::Sidebar Menu-->


            </nav>
        </div>
    @endif

    <!-- Vendor Sidebar -->
    @if (auth()->user()->role_id == 3)
        <div class="sidebar-wrapper" data-overlayscrollbars-viewport="scrollbarHidden overflowXHidden overflowYScroll"
            tabindex="-1"
            style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px;">
            <nav class="mt-2" aria-label="Main navigation">
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false"
                    id="navigation" tabindex="-1">


                    <li class="nav-item">
                        <a href="{{ route('admin.vendors.show', ['vendor' => session('user_vendor_id')]) }}"
                            class="nav-link {{ activeLink('admin.dashboard') }}">
                            <i class="nav-icon bi bi-person-bounding-box"></i>
                            <p>My Vendor Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link {{ activeLink('admin.products.index') }}">
                            <i class="nav-icon bi bi-box-seam"></i>
                            <p>My Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.create') }}"
                            class="nav-link {{ activeLink('admin.products.create') }}">
                            <i class="nav-icon  bi bi-cart-plus"></i>
                            <p>Add Product</p>
                        </a>
                    </li>

                </ul>
                <!--end::Sidebar Menu-->


            </nav>
        </div>
    @endif
</aside>
