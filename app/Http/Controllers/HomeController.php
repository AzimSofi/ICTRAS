<?php

namespace App\Http\Controllers;

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
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.index');
        } elseif (auth()->user()->hasRole('student')) {
            return redirect()->route('student.index');
        } else {
            return view('home');
            // return redirect()->route('home');
        }
    }
}
