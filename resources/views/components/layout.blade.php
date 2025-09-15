<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartTrack</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite(['resources/css/app.css', 'resources/js/sidebar.js'])
</head>
<body>
<div class="content-container">
  <header>
  <nav class="bg-white shadow-md flex items-center justify-end gap-2 p-3">
 
  @auth
    <h2 class="mr-auto text-2xl text-sky-400 font-bold">Smart<span class="text-sky-700">Track</span></h2>
    <p>{{ Auth::user()->name }}</p>

    <form action="{{ route('logout') }}" method="POST" class="group rounded px-3 py-2 cursor-pointer bg-sky-200 hover:bg-sky-100">
    @csrf
    
      <button type="submit" class="group-hover:text-blue-700 cursor-pointer" >
      Logout
      </button>
    </form>
    @endauth
  </nav>
</header>

<div class="my-container">
  <div class="flex gap-12 flex-grow">
    <div class="sidebar">
    <ul class="flex flex-col gap-4">
      <li class=" hover:bg-sky-100 px-3 py-2 shadow-md flex">
        <a href="{{ route('expenses.dashboard') }}" class="w-full">Dashboard</a>
      </li>
      <x-nav-item title="Expenses">
        <a href="{{ route('expenses.list')}}" class="link-tag">All Expenses</a>
        <a href="{{ route('expenses.create') }}" class="link-tag">Add New Expense</a>
      </x-nav-item>
      <x-nav-item title="Categories">
        <a href="{{ route('categories.index') }}" class="link-tag">View Categories</a>
        <a href="{{ route('categories.create') }}" class="link-tag">Add Category</a>
      </x-nav-item>
      <x-nav-item title="Settings">
        <a href="{{ route('profile.show') }}" class="link-tag">Profile</a>
      </x-nav-item>
    </ul>
    </div>
    <div class="dashboard p-2 flex-grow bg-white rounded-md shadow flex flex-col gap-5">
    {{ $slot }}
    </div>
  </div>
</div>
  
</div>



</body>
</html>