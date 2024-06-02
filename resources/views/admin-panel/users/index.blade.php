@extends('admin-panel.layouts.admin')
@section('admin-content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="d-inline-block">Users</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                            <div class="datatable-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-primary font-bold fs-300 rounded-pill">{{ $user->role }}</span>
                                                </td>
                                                <td>
                                                    {{-- SuperAdmin Actions --}}
                                                    @if (auth()->user()->isSuperAdmin())
                                                        @if ($user->role === 'author')
                                                            <button
                                                                data-makeAdmin-route="{{ route('users.makeAdmin', $user) }}"
                                                                class="makeAdmin btn btn-info" title="makeAdmin">
                                                                <i class="fa-solid fa-user"></i>
                                                            </button>

                                                            {{-- <button type="button" class="btn btn-danger delete-user"
                                                                title="Delete User" data-user-id={{ $user->id }}>
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button> --}}
                                                        @endif
                                                        @if ($user->role === 'admin')
                                                            <button
                                                                data-revokeAdmin-route="{{ route('users.revokeAdmin', $user) }}"
                                                                class="revokeAdmin btn btn-warning" title="revokeAdmin">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        @endif
                                                    @endif

                                                    {{-- Admin Actions --}}
                                                    @if (auth()->user()->isAdmin())
                                                        @if ($user->role === 'author')
                                                            <button
                                                                data-makeAdmin-route="{{ route('users.makeAdmin', $user) }}"
                                                                class="makeAdmin btn btn-info" title="makeAdmin">
                                                                <i class="fa-solid fa-user"></i>
                                                            </button>

                                                            {{-- <button type="button" class="btn btn-danger delete-user"
                                                                title="Delete User" data-user-id={{ $user->id }}>
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button> --}}
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="datatable-bottom">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Make Admin Modal --}}
        <div class="modal fade" id="makeAdminModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="makeAdminModalLabel">Make Admin The User?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure You Want To Make Admin This User Right Now?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" class="d-inline-block" id="makeAdminForm" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Revoke Admin Modal --}}
        <div class="modal fade" id="revokeAdminModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="revokeAdminModalLabel">Revoke Admin User?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to Revoke Admin this User right now?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" class="d-inline-block" id="revokeAdminForm" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this User?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" class="d-inline-block" id="deleteForm" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @section('page-level-scripts')
        <script src="{{ asset('admin/js/page-level/users/index.js') }}"></script>
    @endsection
@endsection
