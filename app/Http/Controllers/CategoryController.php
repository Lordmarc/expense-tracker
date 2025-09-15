<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    // GET /categories
    public function index()
    {
        $categories = auth()->user()->categories;
        return view('categories.all-categories', compact('categories'));
    }

    // GET /categories/create
    public function create()
    {
        return view('categories.create-categories');
    }

    // POST /categories
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => [
                'string',
                'required',
                'max:255',
                Rule::unique('categories')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
        ], [
            'name.unique' => 'This category already exists in your account.',
        ]);

        auth()->user()->categories()->create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category created!');
    }

    // GET /categories/{category}/edit
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('categories.edit-category', compact('category'));
    }

    // PUT /categories/{category}
    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('categories')->where(function ($query) use ($category) {
                    return $query->where('user_id', auth()->id())
                                 ->where('id', '!=', $category->id);
                }),
            ],
        ], [
            'name.unique' => 'This category already exists in your account.',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    // DELETE /categories/{category}
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
