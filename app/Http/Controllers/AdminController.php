<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\EndorsedCourse;
use App\Models\SuperUser;
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
        $superuser = SuperUser::first(); // Get the first (or only) superuser

        // Start the query builder for applications
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

        // Capture the sort order from the request
        $sortOrder = $request->input('sort', 'processing');

        // Adjust the query based on the sort order
        switch ($sortOrder) {
            case 'approved':
                $nextSortOrder = 'disapproved';
                $applicationsQuery->orderByRaw('CASE WHEN status IS NULL THEN 1 ELSE 0 END')->orderBy('status', 'desc');
                break;

            case 'disapproved':
                $nextSortOrder = 'processing';
                $applicationsQuery->orderByRaw('CASE WHEN status IS NULL THEN 1 ELSE 0 END')->orderBy('status', 'asc');
                break;

            case 'processing':
            default:
                $nextSortOrder = 'approved';
                $applicationsQuery->orderByRaw('CASE WHEN status IS NULL THEN 0 ELSE 1 END')->orderBy('status', 'asc');
                break;
        }

        // Execute the query
        $applications = $applicationsQuery->get();

        // Pass $nextSortOrder to the view
        return view('admin.student-application.index', compact('applications', 'departments', 'nextSortOrder', 'superuser'));
    }

    public function applicationUpdate(Request $request, Application $application)
    {
        $application->department_id = $request->department_id;
        $application->save();

        return back()->with('success', 'Department updated successfully.');
    }
}
