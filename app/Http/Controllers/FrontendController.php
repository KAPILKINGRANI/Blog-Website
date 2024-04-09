<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::limit(5)->get();
        $tags = Tag::limit(7)->get();

        $posts = Post::published()
            ->search()
            ->latest()
            ->simplePaginate(9);

        return view('welcome', compact(['categories', 'tags', 'posts']));
    }

    public function category(Request $request, Category $category)
    {
        $posts = $category->posts()
            ->search()
            ->published()
            ->latest()
            ->simplePaginate(9);

        $categories = Category::limit(5)->get();
        $tags = Tag::limit(7)->get();

        return view('welcome', compact(['categories', 'tags', 'posts']));
    }
    public function tag(Request $request, Tag $tag)
    {
        $posts = $tag->posts()
            ->search()
            ->published()
            ->latest()
            ->simplePaginate(9);

        $categories = Category::limit(5)->get();
        $tags = Tag::limit(7)->get();

        return view('welcome', compact(['categories', 'tags', 'posts']));
    }

    public function show(Request $request, Post $post)
    {
        $categories = Category::limit(5)->get();
        $tags = Tag::limit(7)->get();

        return view('frontend.single-post', compact(['categories', 'tags', 'post']));
    }
}
