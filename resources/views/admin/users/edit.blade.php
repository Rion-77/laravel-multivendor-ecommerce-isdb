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
                                        <!-- Name -->
                                        <x-admin.form.input label="Name" type="text" placeholder="e.g. John Doe"
                                            name="name" value="{{ $user->name }}" />

                                        <!-- Role -->
                                        <x-admin.form.select label="Role" name="role_id">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" @selected($user->role_id == $role->id)>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </x-admin.form.select>

                                        <!-- Email -->
                                        <x-admin.form.input label="Email" type="email"
                                            placeholder="e.g. john@example.com" name="email"
                                            value="{{ $user->email }}" />

                                        <!-- Phone -->
                                        <x-admin.form.input label="Phone" type="tel" placeholder="e.g. +880 1XXXXXXXXX"
                                            name="phone" value="{{ $user->phone }}" />

                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <x-admin.buttons.submit label="Update User" />
                                <x-admin.buttons.cancel href="{{ route('admin.users.index') }}" />

                            </div>

                        </div>


                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection
