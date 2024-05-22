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
        // $applicationsQuery = Application::where('status', null);

        $applicationsQuery = Application::query();

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

    public function applicationUpdate(Request $request, Application $application) {
        $application->department_id = $request->department_id;
        $application->save();

        return back()->with('success', 'Department updated successfully.');
    }
}
