<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function category() 
    {
       $categories = auth()->user()->categories;
       return view('expenses.all-categories', compact('categories'));
    }

    public function showCreate()
    {
        return view('expenses.create-categories');
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            "name" => 'string|required|max:255'
        ]);

        auth()->user()->categories()->create([
            'name' => $request->name
        ]);

        return redirect()->route('expenses.category')->with('success', 'Category created!');
    }
}
