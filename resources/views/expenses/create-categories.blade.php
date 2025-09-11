<x-layout>
  <div class="h-full mx-auto w-full flex justify-center items-center">
  <form action="{{ route('expenses.insertCategory') }}" method="POST" class="create-form">
  @csrf
  <h2>Create Category</h2>

  <!-- Expense Category -->
  <label for="name">Category Name:</label>
  <input type="text" name="name">

  <button type="submit" class="btn-create mt-auto w-full ">Create Expense</button>

  </form>

</div>
</x-layout>