<x-layout>
<div class="h-full mx-auto w-full flex justify-center items-center">
   <form action="{{ route('expenses.update', $expense) }}" method="POST" class="edit-form">
    @csrf
    
    <h2>Edit Expense</h2>

    <!-- Expense Title -->
    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ $expense->title }}" required>

    <!-- Expense Amount -->
    <label for="amount">Amount:</label>
    <input type="number" step="0.01" name="amount" placeholder="Amount..." value="{{ $expense->amount }}" required>

    <!-- Expense Category -->
    <label for="category">Category:</label>
    <input type="text" name="category" value="{{ $expense->category->name }}" required>

    <!-- Expense Date -->
    <label for="date">Date:</label>
    <input type="date" name="date" required value="{{ $expense->date }}">

    <button type="submit" class="btn-edit">Update Expense</button>
  </form>
</div>
 
</x-layout> 