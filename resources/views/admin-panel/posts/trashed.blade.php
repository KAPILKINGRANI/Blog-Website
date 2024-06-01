@extends('admin-panel.layouts.admin')
@section('admin-content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{-- <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
                                    </path>
                                </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com --> --}}
                                <h1 class="d-inline-block">Trashed Posts</h1>
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
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Excerpt</th>
                                            <th>Body</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Author Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                                        style="max-width: 100px">
                                                </td>
                                                <td>{{ Str::limit($post->title, 10) }}</td>
                                                <td>{{ Str::limit($post->excerpt, 10) }}</td>
                                                <td>{!! Str::limit($post->body, 10) !!}</td>
                                                <td>{!! $post->status !!}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ $post->author->name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning restore-post"
                                                        data-publish-route="{{ route('posts.restore', $post) }}"
                                                        title="Restore Now">
                                                        <i class="fa-solid fa-recycle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger delete-post"
                                                        data-delete-route="{{ route('posts.forceDelete', $post) }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="datatable-bottom">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the post permanently?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="POST" id="deleteForm">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Confirm Restore Modal --}}
    <div class="modal fade" id="restoreModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Restore Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to restore this post?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="" method="POST" id="restoreForm">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-level-scripts')
    <script src="{{ asset('admin/js/page-level/posts/trashed.js') }}"></script>
@endsection
