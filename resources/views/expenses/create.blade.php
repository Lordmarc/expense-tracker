<x-layout>
<div class="h-full mx-auto w-full flex justify-center items-center">
  <form action="{{ route('expenses.store') }}" method="POST" class="create-form">
  @csrf
  <h2>Create Expense</h2>

  <!-- Expense Title -->
  <label for="title">Title:</label>
  <input type="text" name="title" value="{{ old('title') }}" required>

  <!-- Expense Amount -->
  <label for="amount">Amount:</label>
  <input type="number" step="0.01" name="amount" placeholder="Amount..." value="{{ old('amount') }}" required>

  <!-- Expense Category -->
  <label for="category_id">Category:</label>
  <select name="category_id" id="category_id">
    
    <option value="" disabled selected>Select category</option>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>

 
  <!-- Expense Date -->
  <label for="date">Date:</label>
  <input type="date" name="date" required>

  <button type="submit" class="btn-create mt-auto w-full ">Create Expense</button>

  </form>

</div>

</x-layout> 