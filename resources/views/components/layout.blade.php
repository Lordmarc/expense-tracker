<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>

  @vite('resources/css/app.css')
</head>
<body>

<header>
  <nav>
  @guest
    <a href="{{ route('show.login') }}">Login</a>
    <a href="{{ route('show.register') }}">Register</a>
  @endguest


  @auth
    <p>{{ Auth::user()->name }}</p>

    <form action="{{ route('logout') }}" method="POST">
    @csrf
    
      <button type="submit" >Logout</button>
    </form>
    @endauth
  </nav>
</header>

<div class="container">
  {{ $slot }}
</div>
  
</body>
</html>