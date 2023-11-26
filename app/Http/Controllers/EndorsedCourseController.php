<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEndorsedCourseRequest;
use App\Http\Requests\UpdateEndorsedCourseRequest;
use App\Models\EndorsedCourse;

class EndorsedCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $endorsed_courses = EndorsedCourse::where('university', 'like', "%{$search}%")
                ->orWhere('course_name', 'like', "%{$search}%")
                ->orWhere('endorsed_course_name', 'like', "%{$search}%")
                ->orWhereHas('department', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            if (strtolower($search) === 'approved') {
                $endorsed_courses = $endorsed_courses->orWhere('status', true);
            } elseif (strtolower($search) === 'disapproved') {
                $endorsed_courses = $endorsed_courses->orWhere('status', false);
            }

            $endorsed_courses = $endorsed_courses->get();
        } else {
            $endorsed_courses = EndorsedCourse::all();
        }

        return view('admin.endorsed-course.index', compact('endorsed_courses'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EndorsedCourse $endorsedCourse)
    {
        //
    }
}
