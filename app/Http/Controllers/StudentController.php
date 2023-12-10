<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\PreviousInstitution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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

    public function print()
    {
        $data = [

        ];

        $pdf = App::make('dompdf.wrapper');
        $view = view('student.print', $data)->render();
        $pdf->loadHTML($view);
        return $pdf->stream('student_print_form.pdf');
    }
}
