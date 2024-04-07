@extends('admin-panel.layouts.admin')

@section('admin-content')
    <div class="container px-4 mt-4">
        @include('admin-panel.layouts._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
                                    </path>
                                </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                                <h1 class="d-inline-block">Tag<h1>
                            </div>
                            <div>
                                <a href="{{ route('tags.create') }}" class="btn btn-outline-primary">Add Tag</a>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-warning">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="datatable-bottom">
                                    {{ $tags->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
