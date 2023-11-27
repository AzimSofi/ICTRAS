<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $applications = Application::all();

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

            $applications = $applications->get();
        } else {
            $applications = Application::all();
        }

        if (
            auth()
                ->user()
                ->hasRole('student')
        ) {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
