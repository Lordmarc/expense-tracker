<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>

  @vite('resources/css/app.css')
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

<div class="container">
  {{ $slot }}
</div>
  
</div>

</body>
</html>