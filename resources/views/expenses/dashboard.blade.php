<x-layout>

 
  <h2>Dashboard</h2>
  

  <ul class="grid grid-cols-4 gap-2">
    @foreach ($categories as $category)
    <x-stat-card title="{{ $category->name }}" amount="{{ $category->expenses_sum_amount ?? 0 }}"/>
    @endforeach
  </ul>
    





</x-layout>