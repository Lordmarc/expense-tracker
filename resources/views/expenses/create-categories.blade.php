<x-layout>
  <div class="h-full mx-auto w-full flex justify-center items-center">
  <form action="{{ route('expenses.insertCategory') }}" method="POST" class="create-form">
  @csrf
  <h2>Create Category</h2>

  <!-- Expense Category -->
  <label for="name">Category Name:</label>
  <input type="text" name="name">

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mt-3">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    </div>
  @endif

  <button type="submit" class="btn-create mt-auto w-full ">Create Category</button>

 
  </form>
 
</div>
</x-layout>