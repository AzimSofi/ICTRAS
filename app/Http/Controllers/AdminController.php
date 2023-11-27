<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
            if (auth()->user()->hasRole("admin")) {
            return view("admin.index", compact("user"));
        } else {
            return view("home");
        }
    }
}
