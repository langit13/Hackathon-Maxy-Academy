<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reportCount = Report::count();

        return view('user.index', compact('reportCount'));
    }
    
    public function admin()
    {
        return view('admin.index');
    }


}
