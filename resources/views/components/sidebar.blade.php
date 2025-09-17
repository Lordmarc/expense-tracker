

    <ul class="flex flex-col gap-4 ">
    <div class="flex items-center w-full gap-3 px-1 py-3 border-b border-b-gray-300">
        <i class="fa-solid fa-user text-2xl"></i>
         <p class="font-bold">{{ Auth::user()->name }}</p>
    </div>
   
      <li class="hover:bg-sky-100 px-3 py-2 shadow-md">
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

      <form action="{{ route('logout') }}" method="POST" class="flex items-center gap-3 group rounded px-3 py-2 cursor-pointer">
      @csrf
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
      <button type="submit" class="group-hover:text-blue-700 cursor-pointer" >
      Logout
      </button>
    </form>
    </ul>

