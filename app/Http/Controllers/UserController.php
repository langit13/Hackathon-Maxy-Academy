<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// Pastikan Anda sudah menambahkan use Auth jika belum
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }

}
