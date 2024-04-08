<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(5);
        return view('admin-panel.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        $tag = Tag::create(['name' => $request->get('name')]);
        if (!$tag) {
            return redirect(route('tags.index'))->with('error', 'Issue while creating tag !');
        }
        return redirect(route('tags.index'))->with('success', 'Tag Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin-panel.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->name;
        if ($tag->isClean()) {
            return redirect(route('tags.index'))->with('error', 'You didn\'t change any field!');
        }
        $tag->save();
        return redirect(route('tags.index'))->with('success', 'Tag Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
