<x-layout>
<form action="{{ route('register') }}" method="POST">
  @csrf

  <label for="name">Name: </label>
  <input type="text" name="name" required>

  <label for="email">Email:</label>
  <input type="email" name="email" required>

  <label for="password">Password:</label>
  <input type="password" name="password" required>

  <label for="password_confirmation">Confirm Password:</label>
  <input type="password" name="password_confirmation" required>

  <button type="submit">Register</button>

    @if ($errors->any())
    <ul class="px-4 py-2 bg-red-200">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach   
    </ul>
  @endif
</form>
</x-layout>