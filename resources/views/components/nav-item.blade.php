<li class="flex flex-col hover:bg-sky-100 px-3 py-2 shadow-md">
    <div class="nav-toggle flex justify-between cursor-pointer">
        <span>{{ $title }}</span>
        <span>+</span>
    </div>
    <div class="nav-menu hidden flex p-1 flex-col gap-3">
    {{ $slot }}
    </div>
    
</li>