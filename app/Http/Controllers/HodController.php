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

class HodController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        $user = Auth::user();
        if (auth()->user()->hasRole('hod')) {
            return view('hod.index', compact('user', 'departments'));
        } else {
            return view('home', compact('user', 'departments'));
        }
    }

    public function studentApplication(Request $request)
    {
        $departments = Department::all();

        // Assuming you can access the current user's department_id like this
        $currentDepartmentId = auth()->user()->department_id; // or use any method to get the logged-in user's department id

        // Start the query builder for applications with a default condition
        // Filter by current user's department_id
        $applicationsQuery = Application::where('status', null)->where('department_id', $currentDepartmentId);

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

        return view('hod.student-application.index', compact('applications', 'departments'));
    }
}
