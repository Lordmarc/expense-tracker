<x-landing-layout>
<div class="form-container">
<form action="{{ route('register') }}" method="POST">
  @csrf
  <h2>Create an account</h2>
  <div>
  <label for="name">Name: </label>
  <input type="text" name="name" required>
  </div>
  
  <div>
  <label for="email">Email:</label>
  <input type="email" name="email" required>
  </div>
  
  <div>
  <label for="password">Password:</label>
  <input type="password" name="password" required>
  </div>
  
  <div class="">
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" required>
  </div>


  <button type="submit" class="btn">Register</button>
  <div class="flex">
  <p class="">Already have an account? </p>
  <a href="{{ route('show.login') }}" >login</a>
  </div>

    @if ($errors->any())
    <ul class="px-4 py-2 bg-red-200">
        @foreach ($errors->all() as $error)
          <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach   
    </ul>
  @endif
</form>

</div>

</x-landing-layout>