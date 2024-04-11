{{-- diffForHumans is a method of Carbon Class(date and time)  that's why we are having feature x minutes/seconds ago --}}

@extends('frontend.layouts.app')
@section('header')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
        data-image-src="{{ asset('frontend/assets/img/bg/img-bg-17.jpg') }}" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                            Pen-It
                            <small class="color-light alpha7">Heaven for Bloggers!</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>
@endsection
@section('main-content')
    <div class="col-md-9 mt25">
        <div class="row">
            @if (request('search'))
                <h3>Search For: {{ request('search') }}</h3>
            @endif
            @if ($posts->count() === 0)
                <h4>No Posts Found !</h4>
            @endif
            @foreach ($posts as $post)
                <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                    <h4 class="blog-title"><a href="{{ route('blogs.show', $post) }}">{{ Str::limit($post->title, 20) }}</a>
                    </h4>
                    <div class="blog-three-attrib">
                        <span class="icon-calendar"></span> {{ $post->published_at->diffForHumans() }}|
                        <span class=" icon-pencil"></span><a href="#"> {{ Str::limit($post->author->name, 10) }}</a>
                    </div>
                    <img src="{{ asset($post->image_path) }}" class="img-responsive" alt="image blog">
                    <p class="mt25">
                        {{ Str::limit($post->excerpt, 50) }}
                    </p>
                    <a href="#" class="button button-gray button-xs">Read More <i
                            class="fa fa-long-arrow-right"></i></a>
                </div>
            @endforeach
        </div>
        {{ $posts->appends(['search' => request('search')])->links('vendor.pagination.simple-default') }}
        {{-- appends the search parameter in the url  --}}
    </div>
@endsection
</div>
{{-- Paging will be added in simple-default.blade.php file so that our buttons work for pagination --}}
