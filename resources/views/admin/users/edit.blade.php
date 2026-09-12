@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('scripts')
    @vite(['resources/js/filepond.js'])
@endsection

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Edit User"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">
                {{-- {{ $errors }} --}}
                <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                placeholder="e.g. John Doe" name="name" value="{{ $user->name }}">
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
                                                value="{{ $user->email }}">
                                            <x-admin.error-message name="email" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="phone">Phone</label>
                                            <input type="tel" class="form-control" id="phone"
                                                placeholder="e.g. +880 1XXXXXXXXX" name="phone"
                                                value="{{ $user->phone }}">
                                            <x-admin.error-message name="phone" />
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

                        {{-- <div class="col-lg-4 order-1 order-lg-2">
                            <div class="card card-outline card-primary mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Profile Image</h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" id="profile_image" class="filepond" accept="image/*"
                                        name="profile_image" value="{{ old('profile_image') }}">
                                    <p class="text-secondary fs-7 mt-2 mb-0">Optional. Image Only, up to 2MB.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection
