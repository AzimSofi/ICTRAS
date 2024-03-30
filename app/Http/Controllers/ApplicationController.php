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

        // Start the query
        $applicationsQuery = Application::query();

        // Assuming 'user' column stores 'matric_no' or a similar identifier
        // Filter by user's identifier
        $applicationsQuery->where('user', $user->matric_no);

        // Filter by user's search bar input
        $search = $request->input('search');
        if ($search) {
            $applicationsQuery->where(function ($query) use ($search) {
                $query
                    ->where('course_name', 'like', "%{$search}%")
                    ->orWhere('course_code', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_name', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_code', 'like', "%{$search}%")
                    ->orWhere('credit_hours', 'like', "%{$search}%")
                    ->orWhere('grade_obtained', 'like', "%{$search}%");

                if (strtolower($search) === 'approved') {
                    $query->orWhere('status', true);
                } elseif (strtolower($search) === 'disapproved') {
                    $query->orWhere('status', false);
                }
            });
        }

        $applications = $applicationsQuery->get();

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
        return redirect()->route('applications.index')->with('success', 'Course has been added.')->with('activeTab', 'applications');
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

        return redirect()->route('applications.index')->with('success', 'Course has been updated.')->with('activeTab', 'applications');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Course has been deleted.')->with('activeTab', 'applications');
    }

    public function evaluateCourse(Application $application)
    {
        // Compare values in lowercase for case-insensitive comparison
        $courseCode = strtolower($application->course_code);
        $courseName = strtolower($application->course_name);
        $endorsedCourseCode = strtolower($application->endorsed_course_code);
        $endorsedCourseName = strtolower($application->endorsed_course_name);

        // Find a matching EndorsedCourse record
        $endorsedCourse = EndorsedCourse::where(DB::raw('LOWER(course_code)'), $courseCode)
            ->where(DB::raw('LOWER(course_name)'), $courseName)
            ->where(DB::raw('LOWER(endorsed_course_code)'), $endorsedCourseCode)
            ->where(DB::raw('LOWER(endorsed_course_name)'), $endorsedCourseName)
            ->first(); // Use first() to get the actual model instance if it exists

        if ($endorsedCourse) {
            $application->status = $endorsedCourse->status;
        } else {
            $application->status = null;
        }

        $application->save();
    }
}
