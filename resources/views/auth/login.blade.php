<x-landing-layout>
<div class="form-container">
    <form action="{{ route('login') }}" method="POST">
  @csrf

  <h2>Login to your account</h2>
  <div>
    <label for="email">Email:</label>
    <input 
    type="email"
    name="email"
    required>
  </div>
  
  <div>
    <label for="password">Password:</label>
    <input 
      type="password"
      name="password"
      required  >
  </div>
  
  
  <a href="" class="forgot">Forgot password</a>

  <button type="submit" class="btn">Login</button>
  <div class="flex">
  <p class="">Don`t have an account? </p>
  <a href="{{ route('show.register') }}" >register</a>
  </div>
  
  </form>
</div>

</x-landing-layout>