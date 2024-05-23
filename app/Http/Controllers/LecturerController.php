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

class LecturerController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        $user = Auth::user();
        if (auth()->user()->hasRole('lecturer')) {
            return view('lecturer.index', compact('user', 'departments'));
        } else {
            return view('home', compact('user', 'departments'));
        }
    }

    public function dashboard(Application $application)
    {
        $applications = Application::where('recommendation_from', Auth::user()->matric_no)->get();
        // dd(Auth::user()->matric_no);
        /*
        $applications = Application::where('recommendation_from', Auth::user()->matric_no)
                           ->whereNull('recommended')
                           ->get();
        */
        return view('lecturer.dashboard', compact('applications'));
    }

    public function applicationRecommend(Application $application)
    {
        $application->recommendation = true;
        // $application->recommendation_from = Auth::user()->matric_no;
        $application->save();

        return redirect()->route('lecturer.dashboard')->with('success', 'Application recommended successfully.');
    }

    public function applicationNotRecommend(Application $application)
    {
        $application->recommendation = false;
        // $application->recommendation_from = Auth::user()->matric_no;
        $application->save();

        return redirect()->route('lecturer.dashboard')->with('success', 'Application not recommended successfully.');
    }

}
