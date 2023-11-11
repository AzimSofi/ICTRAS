<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $users = User::where('name', 'like', "%{$search}%")
                                    ->orWhere('matric_no', 'like', "%{$search}%")
                                    ->orWhere('email', 'like', "%{$search}%")
                                    ->orWhereHas('department', function ($query) use ($search) {
                                        $query->where('department_name', 'like', "%{$search}%");
                                    })
                                    ->orWhere('phone_number', 'like', "%{$search}%");
            $users = $users->get();
        } else {
            $users = User::all();
        }

        return view("admin.user_assignments", compact("users"));
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
    public function show(UserAssignment $userAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAssignment $userAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAssignment $userAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAssignment $userAssignment)
    {
        //
    }
}
