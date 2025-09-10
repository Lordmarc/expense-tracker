<x-layout>
<h2>Expenses</h2>
{{-- <ul>
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
</ul> --}}


<table>
  <thead>
    <tr class="bg-sky-300">
      <th>Title</th>
      <th>Category</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $expenses as $expense)
    <tr class="text-center">

        <td>{{ $expense->title }}</td>
        <td>{{ $expense->category }}</td>
        <td>{{ $expense->amount }}</td>
        <td>{{ $expense->date }}</td>
        <x-action-button :expense='$expense'/>
     
    </tr>
     @endforeach
  </tbody>
</table>

</x-layout>