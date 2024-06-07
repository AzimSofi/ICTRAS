<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = ['user', 'course_code', 'course_name', 'department_id', 'credit_hours', 'endorsed_course_code', 'endorsed_course_name', 'grade_obtained', 'status', 'pdf_name', 'pdf_content', 'course_description', 'recommendation', 'recommendation_from'];

    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'user', 'matric_no');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /* public function getEndorsedCourseName()
    {
        // Concatenate course_code and course_name from the application
        // and match it against course_name in endorsed_courses table
        $courseFullName = strtolower($this->course_code . ' - ' . $this->course_name);

        // Fetch the endorsed course based on the concatenated name
        $endorsedCourse = EndorsedCourse::whereRaw('LOWER(course_name) = ?', [$courseFullName])->first();

        // Return the endorsed course name, or null if not found
        return $endorsedCourse ? $endorsedCourse->endorsed_course_name : null;
    } */

    /* public function getEndorsedCourseCode()
    {
        // Fetch the endorsed course based on the concatenated name of course_code and course_name
        $courseFullName = strtolower($this->course_code . ' - ' . $this->course_name);
        $endorsedCourse = EndorsedCourse::whereRaw('LOWER(course_name) = ?', [$courseFullName])->first();

        if ($endorsedCourse) {
            // If the endorsed_course_name exists, split it to extract the code part
            $parts = explode(' - ', $endorsedCourse->endorsed_course_name, 2);
            return trim($parts[0]); // Return only the course code part
        }

        return null; // Return null if no match is found
    }*/
}
