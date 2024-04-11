<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest('updated_at')->paginate(10);

        return view('admin-panel.posts.index', compact(['posts']));
    }
}
