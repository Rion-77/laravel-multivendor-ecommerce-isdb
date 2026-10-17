@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('scripts')
    @vite(['resources/js/filepond.js'])
@endsection

@section('content')
    <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Product Categories"></x-admin.content-header>

        <div class="app-content">
            <div class="container-fluid">

                <x-admin.success-flash-message />

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <x-admin.form.input class="col-12" label="Category name" type="text"
                                        placeholder="e.g. Home Appliances" name="name"
                                        value="{{ old('name', $category->name) }}" />

                                    <div class="mb-3">
                                        <label class="form-label" for="category_icon">Category Icon</label>
                                        @if ($category->hasMedia('category_icon'))
                                            <div class="mb-2">
                                                <img src="{{ $category->getFirstMediaUrl('category_icon') }}"
                                                    alt="{{ $category->name }} icon" style="width: 50px; height: auto;">
                                            </div>
                                        @endif
                                        <input type="file" id="category_icon" class="filepond"
                                            name="category_icon">
                                        <p class="text-secondary fs-7 mt-2 mb-0">Optional. Image Only, up to 2MB.</p>
                                        <x-admin.error-message name="category_icon" />
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-lg me-1"></i>Update Category
                                        </button>
                                        <a href="{{ route('admin.categories.index') }}"
                                            class="btn btn-outline-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
