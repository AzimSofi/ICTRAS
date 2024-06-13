<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'matric_no' => ['required', 'string', 'digits:7', Rule::unique('users')->ignore($user->id)],
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'department_id' => 'nullable|integer|exists:departments,id',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->update($validatedData);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                $oldPicturePath = public_path('storage/' . $user->profile_picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }

            $file = $request->file('profile_picture');
            $filename = $user->matric_no . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/profile_images'), $filename);
            $user->profile_picture = 'profile_images/' . $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect()->route('student_management.index')->with('success', 'User has been deleted.');
    }
}
