<x-layout>
<a href="{{ route('expenses.create') }}" class="rounded bg-white shadow-md">Create Expense</a>
<ul>
  @foreach ($expenses as $expense)
    <li>
      <h2>{{ $expense->title }}</h2>
      <p>{{ $expense->amount }}</p>
      <a href="{{ route('expenses.edit', $expense) }}">Edit</a>
      <form action="{{ route('expenses.delete', $expense) }}" method="POST">
      @csrf

      <button type="submit">Delete</button>
      </form>
    </li>
  @endforeach
</ul>

</x-layout>