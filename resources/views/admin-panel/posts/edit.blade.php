@extends('admin-panel.layouts.admin')
@section('page-level-styles')
    {{-- select2 for better options in select field with search --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- trix editor which gives us text editor features like bold italic --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endsection
@section('admin-content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Post</h1>
                    </div>
                    <div class="card-body">
                        {{-- if u want to upload files in a form u need to add enctype --}}
                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $post->title) }}">
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea type="text" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">  {{ old('excerpt', $post->excerpt) }}</textarea>
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('excerpt')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="select2 form-control" id="category_id" name="category_id">
                                    <option value="select..." selected disabled>Select....</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id === old('category_id', $post->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input type="hidden" class="form-control @error('body') is-invalid @enderror"
                                    id="body" name="body" value="{{ old('body', $post->body) }}">
                                <trix-editor input="body"></trix-editor>
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('body')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    accept=".jpg,.gif,.png">
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="published_at" class="form-label">Published At</label>
                                <input type="datetime-local" name="published_at" id="published_at" class="form-control">
                                <div class="nameHelp" class="form-text text-muted">Keep It Blank To Save It As A Draft !
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="nameHelp" class="form-text text-danger">
                                    @error('tags')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-level-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection
