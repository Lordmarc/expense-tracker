<x-layout>
  <form action="{{ route('expenses.update', $expense) }}" method="POST">
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
    <input type="text" name="category" value="{{ $expense->category }}" required>

    <!-- Expense Date -->
    <label for="date">Date:</label>
    <input type="date" name="date" required>

    <button type="submit">Update Expense</button>
  </form>
</x-layout>