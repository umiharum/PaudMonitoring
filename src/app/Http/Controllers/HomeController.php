<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home')->with([
            'user' => Auth::user()
        ]);
    }

    public function teacherHome()
    {
        return view('teacher-home')->with([
            'user' => Auth::user()
        ]);
    }

    public function adminHome()
    {
        return view('admin-home')->with([
            'user' => Auth::user()
        ]);
    }
}
