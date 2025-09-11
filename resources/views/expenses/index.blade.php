<x-layout>
<h2 class="text-2xl text-gray-500 font-bold">Expenses</h2>

<div class="h-full overflow-y-auto border border-gray-300 rounded">
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

        <td class="text-start">{{ $expense->title }}</td>
        <td class="text-start">{{ $expense->category->name }}</td>
        <td class="text-end"><span class="text-md mr-1">₱</span>{{ $expense->amount }}</td>
        <td class="text-end">{{ $expense->date }}</td>
        <x-action-button :expense='$expense'/>
     
    </tr>
     @endforeach
  </tbody>
</table>
</div>


</x-layout>