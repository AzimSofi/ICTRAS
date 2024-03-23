<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;
use App\Models\EndorsedCourse;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $applications = Application::all();

        // Filter by user's matric no
        $userMatricNo = $user->matric_no;
        $applications = Application::whereHas('user', function ($query) use ($userMatricNo) {
            $query->where('matric_no', $userMatricNo);
        });

        // Filter by user's search bar
        $search = $request->input('search');
        if ($search) {
            $applications = Application::where('code', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('credit_hours', 'like', "%{$search}%")
                ->orWhereHas('grade_obtained', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            if (strtolower($search) === 'approved') {
                $applications = $applications->orWhere('status', true);
            } elseif (strtolower($search) === 'disapproved') {
                $applications = $applications->orWhere('status', false);
            }
        }

        $applications = $applications->get();

        if (auth()->user()->hasRole('student')) {
            return view('student.applications.index', compact('user', 'applications'));
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['status'] = null;
        $input['user'] = Auth()->user()->matric_no;
        $application = Application::create($input);

        $this->evaluateCourse($application);
        return redirect()->route('applications.index')
                 ->with('success', 'Course has been added.')
                 ->with('activeTab', 'applications');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $application->update($request->all());
        $this->evaluateCourse($application);

        return redirect()->route('applications.index')
                 ->with('success', 'Course has been updated.')
                 ->with('activeTab', 'applications');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')
                 ->with('success', 'Course has been deleted.')
                 ->with('activeTab', 'applications');
    }

    public function evaluateCourse(Application $application)
{
        $courseFullName = strtolower($application->course_code . ' - ' . $application->course_name);
        $isEndorsed = EndorsedCourse::where(DB::raw('LOWER(course_name)'), $courseFullName)->exists(); // Check if the concatenated courseFullName exists in the endorsed_courses

        if ($isEndorsed) {
            $application->status = true;
            $application->save();
        } else {
            $application->status = null;
            $application->save();
        }
    }
}
