@props(['expense'])

<td {{ $attributes }} class="flex gap-2 justify-center ">
  <a href="{{ route('expenses.edit', $expense) }}">
      <i class="fa-solid fa-pen-to-square text-green-500"></i>
  </a>
  <form action="{{ route('expenses.delete', $expense->id) }}" method="POST" class="delete-form">
    @csrf
    @method('DELETE')
      <button type="submit"><i class="fa-solid fa-trash text-red-500 cursor-pointer"></i></button>
  </form>
</td> 