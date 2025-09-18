<x-layout>
<div class="h-auto mx-auto w-full flex justify-center items-center">
   <form action="{{ route('profile.update', $userData->id) }}" method="POST" class="edit-form">
    @csrf
    
    
    <h2>Edit Profile</h2>

    <!-- User Name -->
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $userData->name ) }}" required>

    <!-- User Email -->
    <label for="email">Email:</label>
    <input type="email" name="email"  value="{{ old('email', $userData->email ) }}" required>
 <!-- Password Section -->
    <div class="border-t pt-4">
        <h3 class="font-semibold mb-2">Change Password (optional)</h3>

        <label class="block font-medium">Current Password</label>
        <input type="password" name="prevPass" class="w-full border rounded p-2">

        <label class="block font-medium mt-3">New Password</label>
        <input type="password" name="newPass" class="w-full border rounded p-2">

        <label class="block font-medium mt-3">Confirm New Password</label>
        <input type="password" name="newPass_confirmation" class="w-full border rounded p-2">
    </div>
    <button type="submit" class="btn-edit">Update Profile</button>

      @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mt-3">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    </div>
  @endif
  </form>
</div>

@if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: "{{ session('success') }}",
      confirmButtonColor: '#0e62e8'
    })
  </script>
@endif

</x-layout>