<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest('updated_at')->paginate(10);

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
        $post->deleteImage();
        $post->delete();
        session()->flash('success', 'Post Deleted Successfully!');
        return (redirect(route('posts.index')));
    }
}
