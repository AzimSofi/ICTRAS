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
            if (auth()->user()->hasRole("admin")) {
            return view("admin.index", compact("user"));
        } else {
            return view("home");
        }
    }

    public function studentApplication()
    {
        $applications = Application::where('status', null)->get();

        return view ("admin.student-application.index", compact("applications"));
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
