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
                required>
        </div>
        
        <a href="" class="forgot">Forgot password</a>

        <button type="submit" class="btn">Login</button>
        <div class="flex">
            <p>Don`t have an account?</p>
            <a href="{{ route('show.register') }}">register</a>
        </div>
    </form>
</div>

{{-- SweetAlert2 --}}


{{-- Success message --}}
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
        })
    </script>
@endif

{{-- All validation errors --}}
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#d33',
        })
    </script>
@endif

</x-landing-layout>
