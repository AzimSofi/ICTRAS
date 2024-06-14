<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\PreviousInstitution;
use App\Models\User;
use App\Models\EndorsedCourse;
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
        $lecturers = User::role('lecturer')
            ->where('department_id', auth()->user()->department_id)
            ->get();
        $currentDepartmentId = auth()->user()->department_id;
        $applicationsQuery = Application::where('status', null)->where('department_id', $currentDepartmentId);

        $search = $request->input('search');
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

        $applications = $applicationsQuery->get();

        return view('hod.student-application.index', compact('applications', 'departments', 'lecturers'));
    }

    public function applicationApprove(Application $application)
    {
        $data = [
            'university' => $application->relatedUser->previousInstitution->name,
            'course_code' => $application->course_code,
            'course_name' => $application->course_name,
            'status' => 1,
            'department_id' => $application->department_id,
            'endorsed_course_code' => $application->endorsed_course_code,
            'endorsed_course_name' => $application->endorsed_course_name,
        ];
        // dd($data);
        $endorsedCourse = EndorsedCourse::create($data);

        $application->status = 1;
        $application->save();

        $this->evaluateAllCourses();

        return redirect()->route('hod.student-application.index')->with('success', 'Application approved successfully.');
    }

    public function applicationDisapprove(Application $application)
    {
        $data = [
            'university' => $application->relatedUser->previousInstitution->name,
            'course_code' => $application->course_code,
            'course_name' => $application->course_name,
            'status' => 0,
            'department_id' => $application->department_id,
            'endorsed_course_code' => $application->endorsed_course_code,
            'endorsed_course_name' => $application->endorsed_course_name,
        ];
        $endorsedCourse = EndorsedCourse::create($data);

        $application->status = 0;
        $application->save();

        $this->evaluateAllCourses();

        return redirect()->route('hod.student-application.index')->with('success', 'Application disapproved successfully.');
    }

    public function evaluateAllCourses()
    {
        $applications = Application::all();

        foreach ($applications as $application) {
            ApplicationController::evaluateCourse($application);
        }
    }

    public function recommendToLecturer(Request $request, Application $application)
    {
        if ($request->lecturer_id) {
            $lecturer = User::findOrFail($request->lecturer_id);
            $application->recommendation_from = $lecturer->matric_no;
        } else {
            $application->recommendation_from = null;
        }

        $application->save();

        return redirect()->route('hod.student-application.index')->with('success', 'Application recommendation updated successfully.');
    }
}
