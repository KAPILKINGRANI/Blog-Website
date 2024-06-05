<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostsController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('verifyUserForEditAndDelete', only: ['edit', 'update', 'destroy', 'publish', 'forceDelete', 'restore']),
            new Middleware('verifyCategoryBeforeCreatingPost', only: ['create'])
        ];
    }
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $posts = Post::latest('updated_at')->paginate(10);
        } else {
            $posts = Post::where('user_id', auth()->id())
                ->latest('updated_at')
                ->paginate(10);
        }
        return view('admin-panel.posts.index', compact(['posts']));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin-panel.posts.create', compact(['categories', 'tags']));
    }

    public function store(CreatePostRequest $request)
    {
        $image = $request->file('image')->store('images/posts');
        $post = Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
            'image_path' => $image,
            'user_id' => 1
        ]);

        $post->tags()->attach($request->tags);

        return redirect(route('posts.index'))
            ->with('success', 'Post Created Successfully!');
    }

    public function edit(Request $request, Post $post)
    {
        $categories = Category::all();;
        $tags = Tag::all();
        return view('admin-panel.posts.edit', compact(['post', 'categories', 'tags']));
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'excerpt', 'body', 'published_at', 'category_id']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images/posts');
            $post->deleteImage();
        }
        $post->update($data);
        $post->tags()->sync($request->tags);

        session()->flash('Success', 'Post Updated Successfully!');
        return (redirect(route('posts.index')));
    }
    public function publish(Request $request, Post $post)
    {
        $post->published_at = now();
        $post->save();
        session()->flash('success', 'Post Published Successfully!');
        return redirect(route('posts.index'));
    }
    public function destroy(Post $post)
    {
        $post->delete(); //This is soft deleting the post
        session()->flash('success', 'Post Deleted Successfully!');
        return (redirect(route('posts.index')));
    }
    public function trashed()
    {
        if (auth()->user()->isAdmin()) {
            $posts = Post::onlyTrashed()->paginate(10);
        } else {
            $posts = Post::onlyTrashed()->where('user_id', auth()->id())->paginate(10);
        }
        return view('admin-panel.posts.trashed', compact(['posts']));
    }

    public function restore(int $postId)
    {
        //yaha parameter mai int hai that means route model binding is not working since post is deleted so...
        $post = Post::onlyTrashed()->find($postId);
        $post->restore();
        session()->flash("Success", "Post Restored Successfully!");
        return (redirect(route('posts.trashed')));
    }
    public function forceDelete(int $postId)
    {
        $post = Post::onlyTrashed()->find($postId);
        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success', 'Post Has Been Permanently Deleted Successfully!');
        return (redirect(route('posts.trashed')));
    }
}
