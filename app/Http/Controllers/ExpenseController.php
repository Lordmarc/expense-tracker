<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExpenseController extends Controller
{
    use AuthorizesRequests;
    /** 
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $query = $user->expenses()->latest();

        if ($request->filled('start_date') && $request->filled('end_date'))
        {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $expenses = $query->get();

        return view('expenses.index', [
            'expenses' => $expenses,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }

    

    public function dashboard() 
{   
    $user = auth()->user();

    $totalExpense = $user->expenses()
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->sum('amount');

    $topCategoryExpenses = $user->categories()
    ->withSum(['expenses as total' => function ($query){
        $query->whereMonth('date', now()->month)
              ->whereYear('date', now()->year);
    }], 'amount')
    ->orderByDesc('total')
    ->first();

    $categories = $user->categories()
        ->withSum(['expenses' => function ($query) {
            $query->whereMonth('date', now()->month)
                  ->whereYear('date', now()->year);
        }], 'amount')
        ->get();

    return view('expenses.dashboard', [
        'totalExpenses' => $totalExpense,
        "topCategory"   => $topCategoryExpenses,
        "categories"    => $categories
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()->categories;
        return view('expenses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'amount'   => 'required|numeric|min:0',
            'date'     => 'date|required'
        ]);

        $request->user()->expenses()->create($validated);

        return redirect()->route('expenses.list')->with('success', 'Expense Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        
        return view('expenses.show', compact('expenses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $this->authorize('update', $expense);
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $this->authorize('update', $expense);

         $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'amount'   => 'required|numeric|min:0',
            'date'     => 'date|required'
        ]);

      $expense->update($validated);

      return redirect()->route('expenses.list')->with('success', 'Expense updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return redirect()->route('expenses.list')->with('success', 'Expense Deleted!');
    }
}
