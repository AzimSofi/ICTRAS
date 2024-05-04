<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\EndorsedCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (auth()->user()->hasRole('admin')) {
            return view('admin.index', compact('user'));
        } else {
            return view('home');
        }
    }

    public function studentApplication(Request $request)
    {
        $departments = Department::all();

        // Start the query builder for applications with a default condition
        $applicationsQuery = Application::where('status', null);

        // Capture the search query from the request
        $search = $request->input('search');

        // Check if there's a search query
        if (!empty($search)) {
        $applicationsQuery->where(function ($query) use ($search) {
                $query
                    ->where('course_code', 'like', "%{$search}%")
                    ->orWhere('course_name', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_code', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_name', 'like', "%{$search}%")
                    ->orWhere('user', 'like', "%{$search}%");
            });
        }

        // Execute the query
        $applications = $applicationsQuery->get();

        return view('admin.student-application.index', compact('applications', 'departments'));
    }

    public function applicationApprove(Application $application)
    {
        $data = [
            "university" => $application->relatedUser->previousInstitution->name,
            "course_code" => $application->course_code,
            "course_name" => $application->course_name,
            "status" => 1,
            "department_id" => $application->department_id,
            "endorsed_course_code" => $application->endorsed_course_code,
            "endorsed_course_name" => $application->endorsed_course_name,
        ];
        // dd($data);
        $endorsedCourse = EndorsedCourse::create($data);

        $application->status = 1;
        $application->save();

        $this->evaluateAllCourses();

        return redirect()->route('admin.student-application.index')->with('success', 'Application approved successfully.');
    }

    public function applicationDisapprove(Application $application)
    {
        $data = [
            "university" => $application->relatedUser->previousInstitution->name,
            "course_code" => $application->course_code,
            "course_name" => $application->course_name,
            "status" => 0,
            "department_id" => $application->department_id,
            "endorsed_course_code" => $application->endorsed_course_code,
            "endorsed_course_name" => $application->endorsed_course_name,
        ];
        $endorsedCourse = EndorsedCourse::create($data);

        $application->status = 0;
        $application->save();

        $this->evaluateAllCourses();

        return redirect()->route('admin.student-application.index')->with('success', 'Application disapproved successfully.');
    }

    public function evaluateAllCourses()
    {
        $applications = Application::all();

        foreach ($applications as $application) {
            ApplicationController::evaluateCourse($application);
        }
    }

    public function applicationUpdate(Request $request, Application $application) {
        $application->department_id = $request->department_id;
        $application->save();

        return back()->with('success', 'Department updated successfully.');
    }
}
