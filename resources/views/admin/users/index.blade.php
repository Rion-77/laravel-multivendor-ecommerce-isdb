@php
    $role_badge_colors = ['text-bg-danger', 'text-bg-primary', 'text-bg-info', 'text-bg-secondary'];
    // dd($role_badge_colors[0+1])
@endphp
@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')



    <main class="app-main" id="main" tabindex="-1">
        <!--begin::App Content Header-->
        <x-admin.content-header title="Users"></x-admin.content-header>
        <!--end::App Content Header-->

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <!--begin::Card-->
                        <div class="card mb-4">
                            <!--begin::Card Header-->
                            <div class="card-header">
                                <div class="row g-2 align-items-center">
                                    <div class="col-12 col-md-4">
                                        <h3 class="card-title">User Directory</h3>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                            <div class="input-group input-group-sm w-auto">
                                                <span class="input-group-text">
                                                    <i class="bi bi-search" aria-hidden="true"></i>
                                                </span>
                                                <input type="search" id="user-search" class="form-control"
                                                    placeholder="Search users" aria-label="Search users"
                                                    style="width: 180px">
                                            </div>
                                            <select id="user-role-filter" class="form-select form-select-sm w-auto"
                                                aria-label="Filter by role">
                                                <option value="all" selected="">All roles</option>
                                                <option value="administrator">Administrator</option>
                                                <option value="editor">Editor</option>
                                                <option value="author">Author</option>
                                                <option value="subscriber">Subscriber</option>
                                            </select>
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                                                New user
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card Header-->
                            <!--begin::Card Body-->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle m-0" role="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">User</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Role</th>
                                                {{-- <th scope="col">Status</th> --}}
                                                <th scope="col">Created</th>
                                                <th class="text-end" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            @if ($user->hasMedia('profile_image'))
                                                                <img src="{{ $user->getFirstMediaUrl('profile_image') }}"
                                                                    class="img-size-32 rounded-circle me-2">
                                                            @else
                                                                <img src="https://i.pravatar.cc/150?img={{ $user->id }}"
                                                                    alt="" class="img-size-32 rounded-circle me-2">
                                                            @endif
                                                            <span class="fw-medium">{{ $user->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        <span class="badge {{ $role_badge_colors[$user->role_id - 1] }}">
                                                            {{ $user->role->name }} </span>
                                                    </td>
                                                    {{-- <td>
                                                        <span class="badge text-bg-success">Active</span>
                                                    </td> --}}
                                                    <td>{{ $user->created_at }}</td>
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                                                class="btn btn-outline-secondary"
                                                                aria-label="Edit Alexander Pierce">
                                                                <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                            </a>
                                                            <button type="button" class="delete-btn btn btn-outline-danger"
                                                                data-bs-toggle="modal" data-bs-target="#modal-delete-item"
                                                                aria-label="Delete Alexander Pierce"
                                                                data-user="{{ json_encode(['id' => $user->id, 'name' => $user->name]) }}">
                                                                <i class="bi bi-trash" aria-hidden="true"> </i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!--end::Card Body-->
                            <!--begin::Card Footer-->
                            <div class="card-footer clearfix">
                                {{ $users->links() }}
                            </div>
                            <!--end::Card Footer-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->



                <!--begin::Delete User Modal-->
                <div class="modal fade" id="modal-delete-item" tabindex="-1" aria-labelledby="modal-delete-item-label"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-delete-item-label">Delete user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0" id="modal-delete-item-text">
                                    Are you sure you want to delete this user? All content owned by the account
                                    will be reassigned to the site administrator. This action cannot be undone.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    Delete user
                                </button> --}}
                                <form action="{{ route('admin.users.destroy', ['user' => 0]) }}" method="POST"
                                    id="modal-delete-item-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-secondary me-1"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Delete User Modal-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection

{{-- My modal script --}}
@section('scripts')
    <script>
        const table = document.querySelector('.table-responsive');
        const deleteForm = document.querySelector('#modal-delete-item-form');
        const modalLabel = document.querySelector('#modal-delete-item-label');
        const modalText = document.querySelector('#modal-delete-item-text');
        console.log(deleteForm);

        table.addEventListener('click', (e) => {
            const deleteBtn = e.target.closest('.delete-btn')
            if (!deleteBtn) return;
            const userData = JSON.parse(deleteBtn.dataset.user);
            const deleteRoute = deleteForm.getAttribute("action").replace("0", userData.id);
            console.log(deleteRoute);
            console.log(userData);
            deleteForm.setAttribute("action", deleteRoute);
            modalLabel.innerText = `Delete User ${userData.name}`;
            modalText.innerText = `Are you sure you want to delete this user?`;

        })
    </script>

    {{-- <script>
        document.querySelectorAll('.delete').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.dataset.id;
                let name = this.dataset.name;
                // alert(id);
                document.querySelector('#modalDelete .name').innerText = name;
                // document.querySelector('#modalDelete form').setAttribute("action",  )
                // document.querySelector('#modalDelete form').action = `users/${id}`;
                document.querySelector('#modalDelete form').action =
                    "{{ route('admin.users.destroy', ['user' => ':id']) }}".replace(':id', id);
            })
        })
    </script> --}}
@endsection
