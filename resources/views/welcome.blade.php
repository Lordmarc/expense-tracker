<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/function.js'])
</head>
<body>
<div class="hero">
<div class="main-container">
<header>
    <nav>
    <h2 class="mr-auto text-2xl text-sky-400 font-bold">Smart<span class="text-sky-700">Track</span></h2>

    <div class="toggle-menu md:hidden">
        <i class="fa-solid fa-bars "></i>
    </div>    
    <div class="user-login-register hidden gap-5 absolute top-12 left-0 w-full md:flex md:static md:w-auto">
        <div class="flex flex-col md:flex-row text-center md:gap-2 bg-sky-100 md:bg-transparent w-full">
            <a href="{{ route('show.login') }}" class="btn-user">
                <p>Login</p>
            </a>
    
                
            <a href="{{ route('show.register') }}" class="btn-user">
                <p>Register</p>
            </a>
        </div>

    </div>
    </nav>
</header>

<main>
    <div class="flex flex-col justify-between items-start gap-1   p-2 mt-10 max-w-[750px] h-full md:justify-start md:gap-3">
        <h1>Welcome to SmartTrack - Your Personal Expense Tracker</h1>
        <p>Spend Smarter, live better</p>
    </div>
    
</main>

</div>
</div>

    
</body>
</html>