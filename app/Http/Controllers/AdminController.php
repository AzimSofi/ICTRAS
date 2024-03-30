<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
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

        return view('admin.student-application.index', compact('applications'));
    }

    public function applicationApprove(Application $application)
    {
        $application->status = 1;
        $application->save();

        return redirect()->route('admin.student-application.index')->with('success', 'Application approved successfully.');
    }

    public function applicationDisapprove(Application $application)
    {
        $application->status = 0;
        $application->save();

        return redirect()->route('admin.student-application.index')->with('success', 'Application disapproved successfully.');
    }
}
