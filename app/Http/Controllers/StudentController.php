<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (
            auth()
                ->user()
                ->hasRole('student')
        ) {
            return view('student.index', compact('user'));
        } else {
            return view('', compact('user'));
        }
    }
}
