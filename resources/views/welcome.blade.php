<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTracker</title>
    
    @vite('resources/css/app.css')
</head>
<body>
<div class="hero">
<div class="main-container">
<header>
    <nav>
    <h1>SmartTrack</h1>

    <div class="flex gap-5">
        
            <a href="{{ route('show.login') }}" class="btn">
                <p>Login</p>
            </a>
    
   
            <a href="" class="btn">
                <p>Register</p>
            </a>
   
       
    </div>
        
    </nav>
</header>

<main>
    <div class="flex flex-col justify-center items-start  gap-5 p-2 mt-10 max-w-[750px] ">
        <h1>Welcome to SmartTrack - Your Personal Expense Tracker</h1>
        <p>Spend Smarter, live better</p>
    </div>
    
</main>

</div>
</div>

    
</body>
</html>