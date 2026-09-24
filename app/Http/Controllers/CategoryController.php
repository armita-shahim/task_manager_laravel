<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Category::class);

        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        Gate::authorize('create', Category::class);

        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Gate::authorize('create', Category::class);

        Category::create($request->validated());

        return redirect('/categories')->with('message', 'category created successfully');
    }

    public function edit(Category $category)
    {
        Gate::authorize('update', $category);

        return view('categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        Gate::authorize('update', $category);

        $category->update($request->validated());

        return redirect('/categories')->with('message', 'category updated successfully');
    }

    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);

        $category->delete();

        return redirect('/categories')->with('message', 'category deleted successfully');
    }
}
