<x-layout>
<h2>Categories</h2>
<div class="h-full overflow-y-auto  border-gray-400 rounded ">
  <table>
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td class="text-center">{{ $category->name }}</td>
          <td class="flex justify-center">
            <a href="{{ route('categories.edit', $category) }}"><i class="fa-solid fa-pen text-green-500"></i></a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
            @csrf
            @method('DELETE')
              <button><i class="fa-solid fa-trash text-red-500"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</x-layout>