@extends('admin.layouts.app')

@section('title', 'Product Categories')

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Product Brands"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Add Brand</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="c-name">Brand name</label>
                                        <input type="text" class="form-control" id="c-name"
                                            placeholder="e.g. Home Appliances">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="c-parent">Parent Brand</label>
                                        <select class="form-select" id="c-parent">
                                            <option selected="">None (top-level)</option>
                                            <option>Electronics</option>
                                            <option>Fashion &amp; Apparel</option>
                                            <option>Home &amp; Living</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="c-desc">Description</label>
                                        <textarea class="form-control" id="c-desc" rows="3" placeholder="Optional short description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="c-icon">Icon</label>
                                        <input type="text" class="form-control" id="c-icon"
                                            placeholder="bi-tv (Bootstrap Icon class)">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100"><i
                                            class="bi bi-plus-lg me-1"></i>Add Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Brands</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 200px;">
                                        <input type="search" class="form-control" placeholder="Search brands…"
                                            aria-label="Search brands">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle m-0" role="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Brand</th>
                                                
                                                <th scope="col">Products</th>
                                                
                                                <th class="text-end" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-tag fs-5 text-primary me-2"></i>
                                                            <span class="fw-medium">{{$brand->name}}</span>
                                                        </div>
                                                    </td>
                                                    {{-- <td>—</td> --}}
                                                    <td>{{ $brand->products_count }}</td>
                                                    {{-- <td><span class="badge text/-bg-success">Active</span></td> --}}
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                aria-label="Edit Electronics"><i
                                                                    class="bi bi-pencil"></i></button>
                                                            <button type="button" class="btn btn-outline-danger"
                                                                aria-label="Delete Electronics"><i
                                                                    class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
