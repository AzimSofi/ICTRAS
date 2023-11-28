<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\PreviousInstitution;
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

    public function createPreviousInstitution(Request $request)
    {
        $previousInstitution = new PreviousInstitution($request->all());
        $previousInstitution->matric_no = Auth::user()->matric_no;
        $previousInstitution->save();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Previous institution has been added.');
    }
}
