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

}
