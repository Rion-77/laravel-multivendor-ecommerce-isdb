@extends('admin.layouts.app')

@section('title', 'Add / Edit Vendor')

@section('scripts')
    @vite(['resources/js/filepond.js'])
@endsection

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Vendors"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <form action="{{ route('admin.vendors.update', ['vendor' => $vendor->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Store Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">

                                        <!-- Shop Name -->
                                        <x-admin.form.input label="Shop name" type="text"
                                            placeholder="e.g. Nova Electronics" name="shop_name"
                                            value="{{ $vendor->shop_name }}" />

                                        <!-- Commission Rate -->
                                        <x-admin.form.input label="Commission rate (%)" type="number" placeholder="e.g. 12"
                                            name="commission_rate"
                                            value="{{ old('commission_rate', $vendor->commission_rate) }}" />

                                        <!-- Description -->
                                        <x-admin.form.textarea class="col-12" label="Shop Description"
                                            placeholder="Describe the shop and its products" name="description"
                                            value="{{ $vendor->description }}" />


                                        <!-- Store Owner -->
                                        <x-admin.form.select label="Owner" name="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" @selected($vendor->user_id == $user->id)>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Status -->
                                        <x-admin.form.select label="Status" name="status">
                                            <option value="active" @selected($vendor->status->value == 'active')>Active</option>
                                            <option value="inactive" @selected($vendor->status->value == 'inactive')>Inactive</option>
                                            <option value="suspended" @selected($vendor->status->value == 'suspended')>Suspended</option>
                                            <option value="pending" @selected($vendor->status->value == 'pending')>Pending</option>
                                            <option value="rejected" @selected($vendor->status->value == 'rejected')>Rejected</option>
                                        </x-admin.form.select>

                                    </div>
                                </div>
                            </div>





                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Update
                                    Vendor</button>
                                <a href="./vendors-list.html" class="btn btn-outline-secondary">Cancel</a>
                            </div>

                        </div>


                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="card card-outline card-primary mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Store Logo</h3>
                                    @if ($vendor->hasMedia('shop_logo'))
                                        <div class="p-3 w-100 border overflow-hidden rounded bg-light d-flex justify-content-center align-items-center">
                                            <img src="{{ $vendor->getFirstMediaUrl('shop_logo', 'logo') }}"
                                                class="w-50 rounded me-2">
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <input type="file" id="shop_logo" class="filepond" accept="image/*" name="shop_logo">
                                    <p class="text-secondary fs-7 mt-2 mb-0">Optional. Image Only, up to 2MB.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
