<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Menampilkan dashboard admin dengan daftar pengguna
    public function index()
    {
        // Mengambil data pengguna
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|string|in:Admin,User',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan pengguna baru ke dalam database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  // Pastikan password di-hash
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'User added successfully!');
    }
}
