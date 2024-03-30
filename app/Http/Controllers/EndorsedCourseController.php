<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEndorsedCourseRequest;
use App\Http\Requests\UpdateEndorsedCourseRequest;
use App\Models\EndorsedCourse;
use App\Models\Department;

class EndorsedCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $departments = Department::all();
    $search = $request->input('search');
    $endorsed_courses = EndorsedCourse::query();

    if ($search) {
        // Check if the search is specifically for 'approved' or 'disapproved' status
        $searchLower = strtolower($search);

        if (!(in_array($searchLower, ['approved', 'disapproved']))) {
            // Apply search conditions only if not a status search
            $endorsed_courses->where(function ($query) use ($search) {
                $query
                    ->where('university', 'like', "%{$search}%")
                    ->orWhere('course_code', 'like', "%{$search}%")
                    ->orWhere('course_name', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_code', 'like', "%{$search}%")
                    ->orWhere('endorsed_course_name', 'like', "%{$search}%")
                    ->orWhereHas('department', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Separately handle the status search to ensure it's applied to the whole query
        if ($searchLower === 'approved') {
            $endorsed_courses->where('status', true);
        } elseif ($searchLower === 'disapproved') {
            $endorsed_courses->where('status', false);
        }
    }

    $endorsed_courses = $endorsed_courses->get();

    return view('admin.endorsed-course.index', compact('endorsed_courses', 'departments'));
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
    public function store(StoreEndorsedCourseRequest $request)
    {
        $input = $request->all();
        $endorsedCourse = EndorsedCourse::create($input);
        // $endorsedCourse->save();

        return redirect()->route('endorsed_courses.index')->with('success', 'Endorsed Course has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EndorsedCourse $endorsedCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EndorsedCourse $endorsedCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEndorsedCourseRequest $request, EndorsedCourse $endorsedCourse)
    {
        $input = $request->all();
        $endorsedCourse->update($input);

        return redirect()->back()->with('success', 'Endorsed Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EndorsedCourse $endorsedCourse)
    {
        //
    }
}
