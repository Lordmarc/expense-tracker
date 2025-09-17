<x-layout>

 
  <h2>Dashboard</h2>
  
 <!-- Summary -->
    <div class="bg-white shadow p-4 mb-6 rounded">
        <h3 class="text-lg font-bold mb-2">Summary</h3>
        @if($totalExpenses > 0)
            <p>
                This month you spent 
                <span class="font-semibold text-sky-600">₱{{ number_format($totalExpenses, 2) }}</span>,
                mostly on 
                <span class="font-semibold text-sky-600">{{ $topCategory->name ?? 'N/A' }}</span>.
            </p>
        @else
            <p>No expenses recorded this month.</p>
        @endif
    </div>
  <ul class="grid grid-cols-4 gap-2">
    @foreach ($categories as $category)
    <x-stat-card title="{{ $category->name }}" amount="{{ $category->expenses_sum_amount ?? 0 }}"/>
    @endforeach
  </ul>
    





</x-layout>