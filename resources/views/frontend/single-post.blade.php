@extends('frontend.layouts.app')
@section('header')
    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
        data-image-src="{{ asset('frontend/assets/img/bg/img-bg-17.jpg') }}" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                            Blog Post
                            <small class="color-light alpha7">{{ $post->title }} &hearts;</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>
@endsection
@section('main-content')
    <section id="blog" class="pt75 pb50">
        <div class="col-md-9">
            <div class="blog-three-mini">
                <h2 class="color-dark"><a href="#">{{ $post->title }}</a></h2>
                <div class="blog-three-attrib">
                    <div><i class="fa fa-calendar"></i>{{ $post->published_at->diffForHumans() }}</div> |
                    <div><i class="fa fa-pencil"></i><a href="#">{{ $post->author->name }}</a></div> |
                    <div><i class="fa fa-comment-o"></i><a href="#">90 Comments</a></div> |
                    <div><a href="#"><i class="fa fa-thumbs-o-up"></i></a>150 Likes</div> |
                    <div>
                        Share: <a href="#"><i class="fa fa-facebook-official"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>

                <img src="{{ asset($post->image) }}" alt="Blog Image" class="img-responsive">
                <p class="lead mt25">
                    {!! $post->body !!}
                </p>

                <div class="blog-post-read-tag mt50">
                    <i class="fa fa-tags"></i> Tags:
                    @foreach ($post->tags as $tag)
                        <a href="#">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="blog-post-author mb50 pt30 bt-solid-1">
                <img src="{{ asset('frontend/assets/img/other/photo-1.jpg') }}" class="img-circle" alt="image">
                <span class="blog-post-author-name">{{ $post->author->name }}</span> <a
                    href="https://twitter.com/booisme"><i class="fa fa-twitter"></i></a>
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            {{-- MY COMMENTS SECTION --}}
            <div class="blog-post-comment-container">
                <h5><i class="fa fa-comments-o mb25"></i>{{ $post->comments->count() }} Comments</h5>
                @foreach ($comments->where('parent_id', null) as $comment)
                    @if ($comment->status === 'approved')
                        {{-- MAIN COMMENT --}}
                        <div class="blog-post-comment">
                            <span
                                class="blog-post-comment-name">{{ $comment->author->name }}</span>{{ $comment->created_at->diffForHumans() }}
                            <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                            <p style="margin: 5px 0 0 0;">
                                {{ $comment->body }}
                            </p>

                            {{-- Reply FORM --}}
                            <div class="form-floating m-5">
                                <form action={{ route('reply.store', [$comment, $post]) }} method="POST">
                                    @csrf
                                    <textarea type="text" class="blog-leave-comment-textarea form-control @error('body') isinvalid @enderror"
                                        id="body" name="body" placeholder="Reply To This Comment" id="floatingTextarea"></textarea>
                                    <div id="nameHelp" class="form-text text-danger">
                                        @error('body')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button type="submit" class="button button-pasific button-sm center-block mb25">Leave
                                        reply</button>
                                </form>
                            </div>
                        @else
                            <div class="blog-post-comment">
                                <p>Waiting For Approval From The Admin</p>
                            </div>
                    @endif
            </div>


            {{-- COMMENT REPLY --}}
            @foreach ($comments->where('parent_id', $comment->id) as $reply)
                @if ($reply->status === 'approved')
                    <div class="blog-post-comment-reply">

                        <span
                            class="blog-post-comment-name">{{ $reply->author->name }}</span>{{ $reply->created_at->diffForHumans() }}
                        <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                        <p>
                            {{ $reply->body }}
                        </p>


                        {{-- Reply FORM --}}
                        <div class="form-floating m-5">
                            <form action={{ route('reply.store', [$comment, $post]) }} method="POST">
                                @csrf
                                <textarea type="text" class="blog-leave-comment-textarea form-control @error('body') isinvalid @enderror"
                                    id="body" name="body" placeholder="Reply To This Comment" id="floatingTextarea"></textarea>
                                <div id="nameHelp" class="form-text text-danger">
                                    @error('body')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" class="button button-pasific button-sm center-block mb25">Leave
                                    reply</button>
                            </form>
                        </div>
                    @else
                        <div class="blog-post-comment">
                            <p>Waiting For Approval From The Admin</p>
                        </div>
                @endif

        </div>
        @endforeach
        @endforeach


        </div>

        <div class="blog-post-leave-comment">
            <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>

            <form action={{ route('comments.store', $post) }} method="POST">
                @csrf
                <label for="body" class="form-label">Comment Body</label>
                <textarea type="text" name="body"
                    class="blog-leave-comment-textarea @error('body') isinvalid
                                @enderror"
                    id="body" style="border:2px solid black">{{ old('body') }}</textarea>
                <div id="nameHelp" class="form-text text-danger">
                    @error('body')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="button button-pasific button-sm center-block mb25">Leave
                    Comment</button>
            </form>
        </div>
        </div>




    </section>
@endsection
