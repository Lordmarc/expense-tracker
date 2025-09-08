<x-layout>

<form action="{{ route('expenses.store') }}" method="POST">
@csrf
<h2>Create Expense</h2>

<!-- Expense Title -->
<label for="title">Title:</label>
<input type="text" name="title" value="{{ old('title') }}" required>

<!-- Expense Amount -->
<label for="amount">Amount:</label>
<input type="number" step="0.01" name="amount" placeholder="Amount..." value="{{ old('amount') }}" required>

<!-- Expense Category -->
<label for="category">Category:</label>
<input type="text" name="category" value="{{ old('category') }}" required>

<!-- Expense Date -->
<label for="date">Date:</label>
<input type="date" name="date" required>

<button type="submit">Create Expense</button>

</form>

</x-layout>