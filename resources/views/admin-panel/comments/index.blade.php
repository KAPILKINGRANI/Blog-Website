@extends('admin-panel.layouts.admin')
@section('admin-content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="d-inline-block">Comments</h1>
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
                                            <th>UserId</th>
                                            <th>PostId</th>
                                            <th>Body</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->user_id }}</td>
                                                <td>{{ $comment->post_id }}</td>
                                                <td>{{ $comment->body }}</td>
                                                <td>{{ $comment->status }}</td>
                                                <td>
                                                    @if ($comment->status === 'not_approved')
                                                        <button
                                                            data-approvecomment-route="{{ route('post.approveComment', $comment) }}"
                                                            class="approveComment btn btn-primary" title="approveComment">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </button>
                                                    @endif

                                                    <button
                                                        data-deletecomment-route="{{ route('post.deleteComment', $comment) }}"
                                                        class="deleteComment btn btn-warning" title="deleteComment">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="datatable-bottom">
                                    {{ $comments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- approve comment Modal --}}
        <div class="modal fade" id="approveCommentModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveCommentModalLabel">Approve This Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure You Want To Approve This Comment Right Now?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" class="d-inline-block" id="approveCommentForm" method="POST">
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
                        <h5 class="modal-title" id="deleteModalLabel">Delete Comment?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Comment?</p>
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
        <script src="{{ asset('admin/js/page-level/comments/index.js') }}"></script>
    @endsection
@endsection
