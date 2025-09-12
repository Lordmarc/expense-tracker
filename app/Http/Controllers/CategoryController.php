<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            "name" => ['string',
            'required',
            'max:255',
            Rule::unique('categories')->where(function ($query){
            return $query->where('user_id', auth()->id());
                }),
            ],

            ],[
                'name.unique' => 'This category already exists in your account.',
            ]);

     

        auth()->user()->categories()->create($validated);

        return redirect()->route('expenses.category')->with('success', 'Category created!');
    }
}
