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



        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!-- Flash Message -->
                <x-admin.success-flash-message />

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
                                                <option value="0" selected="">All roles</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        @if (isset($role_id)) @selected($role_id == $role->id) @endif>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <!-- Add Button -->
                                            <x-admin.buttons.add href="{{ route('admin.users.create') }}"
                                                label="New user" />
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
                                                                <img src="{{ $user->getFirstMediaUrl('profile_image', 'avatar') }}"
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

                                                    <td>{{ $user->created_at }}</td>
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm">
                                                            <x-admin.buttons.edit
                                                                href="{{ route('admin.users.edit', ['user' => $user->id]) }}" />
                                                            <x-admin.buttons.delete item-name="{{ $user->name }}"
                                                                item-delete-url="{{ route('admin.users.destroy', ['user' => $user->id]) }}" />
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
                <x-admin.delete-modal />
                <!--end::Delete User Modal-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection

<form method="POST" class="d-none role-change-form">
    @csrf
    <input type="hidden" name="role_id">
    <button type="submit">submit</button>
</form>
{{-- <form method="GET" class="d-none role-change-form">
    @csrf
    <input type="hidden" name="role_id">
    <button type="submit">submit</button>
</form> --}}

@section('scripts')
    <script>
        const roleSelector = document.querySelector('#user-role-filter');
        const roleChangeForm = document.querySelector('.role-change-form');
        console.log(roleSelector);
        roleSelector.addEventListener('change', () => {
            console.log(roleSelector.value);
            // const route = `{{ route('admin.users.index') }}`;
            const route = (`{{ route('admin.users.roleIndex', ['role' => 0]) }}`.replace('0', roleSelector.value));
            roleChangeForm.action = route;
            console.log(roleChangeForm);
            roleChangeForm.submit();
        })
    </script>
@endsection
