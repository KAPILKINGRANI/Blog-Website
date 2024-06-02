<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin-panel.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::create(['name' => $request->get('name')]);
        if (!$category) {
            return redirect(route('categories.index'))->with('error', 'Issue while creating category !');
        }
        return redirect(route('categories.index'))->with('success', 'Category Created Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin-panel.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        if ($category->isClean()) {
            return redirect(route('categories.index'))->with('error', 'You didn\'t change any field!');
        }
        $category->save();
        return redirect(route('categories.index'))->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if ($category->posts->first()) {
            return redirect(route('categories.index'))->with('error', 'Category Cannot be Deleted because some posts are associated with it!');
        }
        $category->delete();
        return redirect(route('categories.index'))->with('success', 'Category Deleted Successfully!');
    }
}
