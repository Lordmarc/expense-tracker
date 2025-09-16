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