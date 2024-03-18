<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
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
        if (auth()->user()->hasRole('student')) {
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

        return redirect()->route('applications.index')->with('success', 'Previous institution has been added.');
    }

    public function editPreviousInstitution(Request $request)
    {
        $previousInstitution = PreviousInstitution::where('matric_no', Auth::user()->matric_no)->firstOrFail();
        $previousInstitution->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Previous institution has been updated.');
    }

    public function print()
    {
        // Query user's application
        $user = Auth::user();
        $applications = Application::all();
        $userMatricNo = $user->matric_no;
        $applications = Application::whereHas('user', function ($query) use ($userMatricNo) {
            $query->where('matric_no', $userMatricNo);
        })->get();

        $data = ['user' => $user, 'applications' => $applications];
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'portrait');

        // Margins
        /*$pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
        ]);*/

        // Render
        $view = view('student.print', $data)->render();
        $pdf->loadHTML($view);
        return $pdf->stream('student_print_form.pdf');
    }
}
