<x-layout>
<h2 class="text-2xl text-gray-500 font-bold">Expenses</h2>

<div class="flex flex-col w-full h-full border border-gray-300 rounded">

<div class="flex justify-end mb-2 md:mb-0 w-full">
  <form method="GET" class="flex flex-col md:flex-row gap-2 mb-0 md:mb-4 md:w-auto w-full">
    <div class="flex gap-2 w-full md:w-auto">
      <input 
          type="date" 
          name="start_date" 
          value="{{ $start_date }}" 
          class="border rounded p-1 flex-1 md:flex-none min-w-20"
      >
      <span class="self-center">-</span>
      <input 
          type="date" 
          name="end_date" 
          value="{{ $end_date }}" 
          class="border rounded p-1 flex-1 md:flex-none min-w-20"
      >
    </div>

    <button class="bg-sky-500 text-white px-3 py-1 rounded md:w-auto w-full">
      Filter
    </button>
  </form>
</div>

<div class="overflow-x-auto h-full">
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
  
@if (session('success'))
 <script>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{ session('success') }}"
    confirmButtonColor: '#0e62e8',
  })
 </script>
@endif

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
});
</script>
</div>


</x-layout>