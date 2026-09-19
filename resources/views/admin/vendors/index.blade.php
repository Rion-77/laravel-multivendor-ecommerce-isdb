@php
    $status_colors = [
        'active' => 'text-bg-success',
        'inactive' => 'text-bg-secondary',
        'suspended' => 'text-bg-danger',
        'pending' => 'text-bg-warning',
        'rejected' => 'text-bg-info',
    ];
    //    'text-bg-primary',
    // dd($status_colors['active'])
@endphp

@extends('admin.layouts.app')

@section('title', 'Vendors')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Vendors"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">
                <!-- Flash Message -->
                <x-admin.success-flash-message />

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
                                                <th scope="col">Owner</th>
                                                {{-- <th scope="col">Store</th> --}}
                                                <th scope="col">Products</th>
                                                {{-- <th scope="col">Orders</th> --}}
                                                {{-- <th scope="col">Revenue</th> --}}
                                                {{-- <th scope="col">Rating</th> --}}
                                                <th scope="col">Status</th>
                                                <th class="text-end" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendors as $vendor)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            @if ($vendor->hasMedia('shop_logo'))
                                                                <img src="{{ $vendor->getFirstMediaUrl('shop_logo', 'logo') }}"
                                                                    class="img-size-32 rounded-circle me-2">
                                                            @else
                                                                <img src="https://picsum.photos/300/{{ $vendor->id + 300 }}"
                                                                    alt="" class="img-size-32 rounded-circle me-2">
                                                            @endif
                                                            <div>
                                                                <div class="fw-medium">{{ $vendor->shop_name }}</div>
                                                                {{-- <div class="text-secondary fs-7">{{$vendor->email}}</div> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $vendor->user->name }}</td>
                                                    {{-- <td>312</td> --}}
                                                    <td>{{ random_int(5, 20) }}</td>
                                                    {{-- <td>$48,200</td> --}}
                                                    {{-- <td><i class="bi bi-star-fill text-warning me-1"></i>4.8</td> --}}
                                                    <td><span
                                                            class="badge {{ $status_colors[$vendor->status->value] }} ">{{ $vendor->status->value }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm">
                                                            
                                                            <x-admin.buttons.view href="{{ route('admin.vendors.show', ['vendor' => $vendor->id]) }}" />        
                                                            <x-admin.buttons.edit
                                                                href="{{ route('admin.vendors.edit', ['vendor' => $vendor->id]) }}" />
                                                            <x-admin.buttons.delete item-name="{{ $vendor->shop_name }}"
                                                                item-delete-url="{{ route('admin.vendors.destroy', ['vendor' => $vendor->id]) }}" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <x-admin.pagination :for="$vendors" />

                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <x-admin.delete-modal />
            </div>
        </div>
    </main>
@endsection
