<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{
    use AuthorizesRequests;  
    public function show ()
    {
        $userData = auth()->user();
        return view('profile.profile', compact('userData'));
    }
 
    public function update(Request $request)
{
    $user = auth()->user(); // ✅ ensure correct user

    $this->authorize('update', $user);

    $validated = $request->validate([
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . $user->id,
        'prevPass' => 'nullable|string|min:8',
        'newPass' => 'nullable|string|min:8|confirmed'
    ]);

    // ✅ Update name
    if ($request->filled('name')) {
        $user->name = $request->name;
    }

    // ✅ Update email
    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    // ✅ Handle password change
    if ($request->filled('prevPass') && $request->filled('newPass')) {
        if (! Hash::check($request->prevPass, $user->password)) {
            return back()->withErrors([
                'prevPass' => 'The previous password is incorrect.',
            ]);
        }

        $user->password = Hash::make($request->newPass);
    }

    $user->save();

    return redirect()->route('expenses.dashboard')
                     ->with('success', 'Account updated successfully!');
}

}
