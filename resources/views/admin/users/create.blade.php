@extends('admin.layouts.app')

@section('title', 'Add User')

@section('scripts')
    @vite(['resources/js/filepond.js'])
@endsection

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Add User"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">
                {{-- {{ $errors }} --}}
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 order-2 order-lg-1">

                            <div class="card card-primary card-outline mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">User Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="e.g. John Doe" name="name" value="{{ old('name') }}">
                                            <x-admin.error-message name="name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="role_id">Role</label>
                                            <select class="form-select" id="role_id" name="role_id">
                                                <option selected disabled>Select role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-admin.error-message name="role_id" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="e.g. john@example.com" name="email"
                                                value="{{ old('email') }}">
                                            <x-admin.error-message name="email" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="phone">Phone</label>
                                            <input type="tel" class="form-control" id="phone"
                                                placeholder="e.g. +880 1XXXXXXXXX" name="phone"
                                                value="{{ old('phone') }}">
                                            <x-admin.error-message name="phone" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password" name="password" value="{{ old('password') }}">
                                            <x-admin.error-message name="password" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="password-confirm">Confirm Password</label>
                                            <input type="password" class="form-control" id="password-confirm"
                                                placeholder="Re-enter password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}">
                                            <x-admin.error-message name="password_confirmation" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Save
                                    User</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>

                        </div>

                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="card card-outline card-primary mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Profile Image</h3>
                                </div>
                                <div class="card-body">
                                    {{-- <div class="row g-2 mb-3">
                                        <div class="col-4">
                                            <img src="" class="img-fluid rounded" alt="Profile image preview">
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center border rounded"
                                            style="min-height:64px;">
                                            <i class="bi bi-plus-lg fs-4 text-secondary"></i>
                                        </div>
                                    </div> --}}
                                    {{-- <label for="profile_image" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="bi bi-upload me-1"></i>Upload image
                                    </label> --}}
                                    {{-- <input type="file" id="profile_image" class="d-none" accept="image/*"
                                        name="profile_image"> --}}
                                    <input type="file" id="profile_image" class="filepond" accept="image/*"
                                        name="profile_image" value="{{ old('profile_image') }}">
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
