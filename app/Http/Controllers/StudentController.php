<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\PreviousInstitution;
use App\Models\User;
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

    public function print(User $user = null)
    {
        if ($user == null && Auth::user()->hasRole('student')) {
            $user = Auth::user();
        }

        /* DEBUG
        if (Auth::user()->hasRole("admin")) {
            dd($user);
        }*/

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

    // Previous study plan pdf
    public function showUploadForm()
    {
        return view('pdf.upload');
    }

    public function storePreviousStudyPlan(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:2048', // 2MB Max
        ]);

        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to perform this action.');
        }

        // Retrieve authenticated user's matric_no
        $matricNo = Auth::user()->matric_no;

        // Finding existing PreviousInstitution entry for the current user
        $previousInstitution = PreviousInstitution::where('matric_no', $matricNo)->first();

        if ($previousInstitution) {
            $pdf = $request->file('pdf');
            $pdfContent = file_get_contents($pdf->getRealPath());

            $previousInstitution->pdf_name = $pdf->getClientOriginalName();
            $previousInstitution->pdf_content = $pdfContent;
            // dd($previousInstitution);
            $previousInstitution->save();

            return redirect()->route('pdf.upload')->with('success', 'PDF uploaded successfully.');
        } else {
            //
            return redirect()->back()->with('warning', 'No matching record found.');
        }
    }

    public function showPreviousStudyPlan(PreviousInstitution $previousInstitution)
    {
        return response()->make($previousInstitution->pdf_content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $previousInstitution->pdf_name . '"',
        ]);
    }
}
