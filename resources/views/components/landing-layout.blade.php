<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartTrack</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   @vite(['resources/css/app.css', 'resources/js/function.js'])
</head>
<body>

<div class="hero">
  <header>
  <nav>
 
 
  </nav>
</header>

<div class="container">
  {{ $slot }}
</div>
  
</div>

</body>
</html>