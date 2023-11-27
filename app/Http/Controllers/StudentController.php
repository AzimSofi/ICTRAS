<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        $user = Auth::user();
        if (
            auth()
                ->user()
                ->hasRole('student')
        ) {
            return view('student.index', compact('user', 'departments'));
        } else {
            return view('', compact('user', 'departments'));
        }
    }
}
