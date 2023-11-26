<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentManagementController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();

        $search = $request->input('search');
        if ($search) {
            $users = User::where('name', 'like', "%{$search}%")
                ->orWhere('matric_no', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('department', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhere('phone_number', 'like', "%{$search}%");
            $users = $users->get();
        } else {
            $users = User::all();
        }

        return view('admin.student-management.index', compact('users', 'departments'));
    }
}
